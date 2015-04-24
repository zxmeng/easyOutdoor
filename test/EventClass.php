<?php
require_once('DBClass.php');

class Event{

    public $db;

    public function __construct(){
        // Create connection
        $this->db = new Database();
    }

    // Create an event, return the eid
    public function createEvent($uid, $title, $venue, $district, $time, $description, $image, $limit){
        $now = date("Y-m-d H:i:s");
        $sql = "INSERT INTO event(uid, title, venue, district, eDate, eDescription, ePhoto, likeNo, parNo, limitation, postTime, lastEditTime) 
                VALUES ($uid, '$title', '$venue', '$district', '$time', '$description', '$image', 0, 1, $limit, '$now', '$now')";
        $this->db->query($sql);
        return $this->db->getInsertedID();
    }

    // Edit an event
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

    // get the detail information of en event by the eid
    public function getEvent($id){
       $sql = "SELECT event.*, user.nickname, user.uPhoto
                FROM event, user 
                WHERE event.uid = user.uid AND event.eid = $id";
        $result = $this->db->query($sql);
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    // // Return first 8 ongoing events ordered by their event dates
    public function getAllEvents(){
        $now = date("Y-m-d H:i:s");
        $sql = "SELECT event.*, user.nickname, user.uPhoto
                FROM event, user
                WHERE event.uid = user.uid AND event.eDate > '$now'
                ORDER BY event.eDate ASC LIMIT 8";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    // get the events with no. of likes > 10 as recommendation
    public function getRecommendation(){
        $now = date("Y-m-d H:i:s");
        $sql = "SELECT event.*, user.nickname, user.uPhoto
                FROM event, user
                WHERE event.uid = user.uid AND event.likeNo > 10 AND event.eDate > '$now'
                ORDER BY event.likeNo DESC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    // get the first 8 participants of an event
    public function getParticipants($eid){
        $sql = "SELECT user.uPhoto, user.uid, user.nickname
                FROM participation, user
                WHERE participation.eid = $eid AND participation.uid = user.uid
                ORDER BY participation.time DESC LIMIT 8";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray; 
    }

    // get the owner of an event
    public function getOwner($eid){
        $sql = "SELECT user.uPhoto, user.uid, user.nickname
                FROM event, user
                WHERE event.eid = $eid AND event.uid = user.uid";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_array(MYSQLI_ASSOC);
        return $resultArray; 
    }

    // check whether a user has liked an event
    public function checkLike($eid, $uid){
        $sql = "SELECT COUNT(*) AS total
                FROM likeEvent
                WHERE likeEvent.eid = $eid AND likeEvent.uid = $uid";
        $result = $this->db->query($sql);
        $data = $result->fetch_assoc();
        $count = $data['total'];
        return $count;
    }

    // check whether a user has joined an event
    public function checkJoin($eid, $uid){
        $sql = "SELECT COUNT(*) AS total
                FROM participation
                WHERE participation.eid = $eid AND participation.uid = $uid";
        $result = $this->db->query($sql);
        $data = $result->fetch_assoc();
        $count = $data['total'];
        return $count;
    }

    // a user likes an event
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

    // a user unlikes an event
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

    // a user joins an event
    public function join($eid, $uid){
        $sql = "INSERT INTO Participation(uid,eid,time)
                VALUES($uid, $eid, now())";
        $this->db->query($sql);
        $jid = $this->db->getInsertedID();
        $joinNoti = "INSERT INTO notification(type, fid)
                     VALUES ('join', $jid)";
        $this->db->query($joinNoti);
        $join = "UPDATE `event`
                 SET parNo = parNo + 1
                 WHERE eid = $eid";
        $this->db->query($join);
        return;
    }

    // a user unjoins an event
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

    // get the events created by this user
    public function getEventsCreatedByUser($uid){
        $sql = "SELECT event.*
                FROM event
                WHERE event.uid = $uid
                ORDER BY event.postTime DESC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    // get the events joined by this user
    public function getEventsJoinedByUser($uid){
        $sql = "SELECT event.*
                FROM event, participation
                WHERE event.eid = participation.eid AND participation.uid = $uid
                ORDER BY participation.time DESC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    // get the events related to this district
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

    // get the events on that day
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





