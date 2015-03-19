<?php

class Event{

    private $db;
    // public $title;
    // public $id;
    // public $ownerID;
    // public $eventDate;
    // public $limitation;
    // public $profilePhoto;
    // Init DB Variable
    // public function __construct($var1,$var2,$var3,$var4,$var5, $var6){
     public function __construct(){
        // $this->title = $var1;
        // $this->id = $var2;
        // $this->ownerID = $var3;
        // $this->eventDate = $var4;
        // $this->limitation = $var5;
        // $this->profilePhoto = $var6;

    // Create connection
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PSW, DB_NAME) or die("unable to connect");
        echo "<p>Event: connencted to database.</p>";
    }

    // // Create an event, return BOOL
    // public function createEvent($data){
    //     $sql = "INSERT INTO event(title, destination, district, eventDate, description, lastEditTime, limitation) 
    //             VALUES ('$data['title']', '$data['destination']', '$data['district']', '$data['eventDate']', '$data['description']', '$data['lastEditTime']', '$data['limitation']')";
    //     return $this->db->query($sql);        
    // }

    // Edit an event, return BOOL
    // public function editEvent($data, $eventID){
    //     $sql = "UPDATE event
    //             SET title = $data['title'], destination = $data['destination'], district = $data['district'], eventDate = $data['eventDate'], description = $data['description'], lastEditTime = $data['lastEditTime'], limitation = $data['limitation']
    //             WHERE ID = $eventID";
    //     return $this->db->query($sql);        
    // }

    public function getTotalEvents(){
        $conn = new mysqli(DB_HOST, DB_USER, DB_PSW, DB_NAME) or die("unable to connect");
        echo "<p>I am getTotalEvent</p>";
        $sql = "SELECT COUNT(*)
                FROM event";
        $result = $conn->query($sql);
        echo "<p>the result is #";
        echo $result;
        echo "#</p>";
        return $result;
    }

    public function getEvent($id){
       $sql = "SELECT event.*, user.username, user.profilePhoto
                FROM event, user 
                WHERE event.ownerID = user.ID AND event.ID = $id";
        $result = $this->db->query($sql);
        return $result;
    }

    // // Return all ongoing events ordered by their event dates
    public function getAllEvents(){
       // echo "GET ALL EVENTS";
        $sql = "SELECT event.*, user.username, user.profilePhoto
                FROM event, user 
                WHERE event.ownerID = user.ID AND event.status = true
                ORDER BY eventDate";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    // // Return the ongoing events in which a user creates or currently participates
    // public function getByUser($userID){
    //     $sql = "SELECT event.*, user.username, user.profilePhoto
    //             FROM event, user, participation 
    //             WHERE event.ownerID = user.ID AND event.status = true
    //             AND ( event.ID = participation.eventID AND participation.userID = $userID ) 
    //             ORDER BY eventDate";
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
    // public function getByDistrict($district){
    //     $sql = "SELECT event.*, user.username, user.profilePhoto
    //             FROM event, user 
    //             WHERE event.ownerID = user.ID AND event.distrcit = '$district' AND event.status = true
    //             ORDER BY eventDate";
    //     $result = $this->db->query($sql);
    //     $resultArray = $result->fetch_all(MYSQLI_ASSOC);
    //     return $resultArray;
    // }

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

    // // Return the events on that day
    // public function getByDate($date){
    //     $sql = "SELECT event.*, user.username, user.profilePhoto
    //             FROM event, user 
    //             WHERE event.ownerID = user.ID AND event.date = '$date'
    //             ORDER BY event.lastEditTime DESC";
    //     $result = $this->db->query($sql);
    //     $resultArray = $result->fetch_all(MYSQLI_ASSOC);
    //     return $resultArray;
    // }

}





