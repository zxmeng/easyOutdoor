<?php
require_once('DBClass.php');
// DB interface for event
class Event{

    public $db;

    public function __construct(){
        // Create connection
        $this->db = new Database();
    }

    // // Create an event, return BOOL
    public function createEvent($uid, $title, $venue, $district, $time, $description, $image, $limit){
        $now = date("Y-m-d H:i:s");
        $sql = "INSERT INTO event(uid, title, venue, district, eDate, eDescription, ePhoto, likeNo, parNo, limitation, postTime, lastEditTime) 
                VALUES ($uid, '$title', '$venue', '$district', '$time', '$description', '$image', 0, 1, $limit, '$now', '$now')";
        $this->db->query($sql);
        //echo $sql;
        return $this->db->getInsertedID();
    }

    // Edit an event, return BOOL
    public function editEvent($eid, $title, $venue, $district, $time, $description, $image, $limit) {
        $now = date("Y-m-d H:i:s");
        if($image!=""){
            $sql = "UPDATE event
                    SET event.title = '$title', event.venue = '$venue', event.district = '$district', event.eDate = '$time', 
                    event.eDescription = '$description', event.lastEditTime = '$now', event.limitation = $limit, event.ePhoto = '$image'
                    WHERE event.eid= $eid";
        }
        else {
            $sql = "UPDATE event
                SET event.title = '$title', event.venue = '$venue', event.district = '$district', event.eDate = '$time', 
                event.eDescription = '$description', event.lastEditTime = '$now', event.limitation = $limit
                WHERE event.eid= $eid";
        }
        $this->db->query($sql);
        return;
    }

    // public function getTotalEvents(){
    //     $sql = "SELECT COUNT(*)
    //             FROM event";
    //     $result =  $this->db->query($sql);
    //     return $result;
    // }

    public function getEvent($id){
       $sql = "SELECT event.*, user.nickname, user.uPhoto
                FROM event, user 
                WHERE event.uid = user.uid AND event.eid = $id";
                //echo "eid is: ".$id;
        $result = $this->db->query($sql);
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    // // Return all ongoing events ordered by their event dates
    public function getAllEvents(){
       // echo "GET ALL EVENTS";
        $now = date("Y-m-d H:i:s");
        $sql = "SELECT event.*, user.nickname, user.uPhoto
                FROM event, user
                WHERE event.uid = user.uid AND event.eDate > '$now'
                ORDER BY event.eDate ASC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    public function getRecommendation(){
       // echo "GET ALL EVENTS";
        $now = date("Y-m-d H:i:s");
        $sql = "SELECT event.*, user.nickname, user.uPhoto
                FROM event, user
                WHERE event.uid = user.uid AND event.likeNo > 10 AND event.eDate > '$now'
                ORDER BY event.likeNo DESC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    public function getParticipants($eid){
        $sql = "SELECT user.uPhoto, user.uid, user.nickname
                FROM participation, user
                WHERE participation.eid = $eid AND participation.uid = user.uid
                ORDER BY participation.time DESC LIMIT 9";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray; 
    }

    public function getOwner($eid){
        $sql = "SELECT user.uPhoto, user.uid, user.nickname
                FROM event, user
                WHERE event.eid = $eid AND event.uid = user.uid";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_array(MYSQLI_ASSOC);
        return $resultArray; 
    }


    public function checkLike($eid, $uid){
        $sql = "SELECT COUNT(*) AS total
                FROM likeEvent
                WHERE likeEvent.eid = $eid AND likeEvent.uid = $uid";
        $result = $this->db->query($sql);
        $data = $result->fetch_assoc();
        $count = $data['total'];
        return $count;
    }

    public function checkJoin($eid, $uid){
        $sql = "SELECT COUNT(*) AS total
                FROM participation
                WHERE participation.eid = $eid AND participation.uid = $uid";
        $result = $this->db->query($sql);
        $data = $result->fetch_assoc();
        $count = $data['total'];
        return $count;
    }

    public function like($eid, $uid){
        $sql = "INSERT INTO LikeEvent(uid,eid,time)
                VALUES($uid, $eid, now())";
        $like = "UPDATE `event`
                 SET likeNo = likeNo + 1
                 WHERE eid = $eid";
        $this->db->query($sql);
        $this->db->query($like);
        return;
    }

     public function unlike($eid, $uid){
        $sql = "DELETE FROM LikeEvent 
                WHERE uid = $uid AND eid = $eid";     
        $this->db->query($sql);
        $unlike = "UPDATE `event`
                 SET likeNo = likeNo - 1
                 WHERE eid = $eid";
        $this->db->query($unlike);
        return;
    }

    public function join($eid, $uid){
        $sql = "INSERT INTO Participation(uid,eid,time)
                VALUES($uid, $eid, now())";
        $this->db->query($sql);
        $join = "UPDATE `event`
                 SET parNo = parNo + 1
                 WHERE eid = $eid";
        $this->db->query($join);
        return;
    }

     public function unjoin($eid, $uid){
        $sql = "DELETE FROM Participation 
                WHERE uid = $uid AND eid = $eid";     
        $this->db->query($sql);
        $unjoin = "UPDATE `event`
                   SET parNo = parNo - 1
                   WHERE eid = $eid";
        $this->db->query($unjoin);
        return;
    }

    // // Return the ongoing events in which a user creates or currently participates
    public function getEventsCreatedByUser($uid){
        $sql = "SELECT event.*
                FROM event
                WHERE event.uid = $uid
                ORDER BY event.postTime DESC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    public function getEventsJoinedByUser($uid){
        $sql = "SELECT event.*
                FROM event, participation
                WHERE event.eid = participation.eid AND participation.uid = $uid
                ORDER BY participation.time DESC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    //     public function getEventsByUser($uid){
    //     $sql = "SELECT event.*, user.nickname, user.uPhoto
    //             FROM event, user, participation 
    //             WHERE event.uid = user.uid
    //             OR ( event.eid = participation.eid AND participation.uid = $uid ) 
    //             ORDER BY event.eDate ASC";
    //     $result = $this->db->query($sql);
    //     $resultArray = $result->fetch_all(MYSQLI_ASSOC);
    //     return $resultArray;
    // }

    // // Return the events history of a user
    // public function getUserHistory($userID){
    //     $sql = "SELECT event.*, user.username, user.profilePhoto
    //             FROM event, user, participation  
    //             WHERE event.ownerID = user.ID AND event.status = false
    //             AND ( event.ID = participation.eventID AND participation.userID =$userID ) 
    //             ORDER BY eventDate DESC";
    //     $result = $this->db->query($sql);
    //     $resultArray = $result->fetch_all(MYSQLI_ASSOC);
    //     return $resultArray;
    // }

    // // Return the ongoing events related to a district
    public function getEventsByDistrict($district){
        $now = date("Y-m-d H:i:s");
        $sql = "SELECT event.*, user.*
                FROM event, user 
                WHERE event.uid = user.uid AND event.district = '$district' AND event.eDate > '$now'
                ORDER BY event.eDate ASC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    //  // Return the events historty related to a district
    // public function getDistrictHistory($district){
    //     $sql = "SELECT event.*, user.username, user.profilePhoto
    //             FROM event, user 
    //             WHERE event.ownerID = user.ID AND event.distrcit = '$district' AND event.status = false
    //             ORDER BY event.eventDate DESC";
    //     $result = $this->db->query($sql);
    //     $resultArray = $result->fetch_all(MYSQLI_ASSOC);
    //     return $resultArray;
    // }

    // Return the events on that day
    public function getEventsByDate($date){
        $start = $date . " 00:00:00";
        $end = $date . " 23:59:59";
        $sql = "SELECT event.*, user.*
                FROM event, user 
                WHERE event.uid = user.uid AND event.eDate > '$start' AND event.eDate < '$end'
                ORDER BY event.lastEditTime DESC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

}





