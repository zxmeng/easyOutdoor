<?php

class Event{

    private $db;
    
    // Init DB Variable
    public function __construct(){
        $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "blog_test";

    // Create connection
        $this->db = new mysqli($servername, $username, $password, $dbname) or die("unable to connect");
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
        $sql = "SELECT SUM(*)
                FROM event";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getEvent($id){
       $sql = "SELECT event.*, user.username, user.profilePhoto
                FROM event, user 
                WHERE event.ownerID = user.ID AND event.ID = $id";
        $result = $this->db->query($sql);
        return $result;
    }

    // Return all ongoing events ordered by their event dates
    public function getAllEvents(){
        $sql = "SELECT event.*, user.username, user.profilePhoto
                FROM event, user 
                WHERE event.ownerID = user.ID AND event.status = true
                ORDER BY eventDate";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    // Return the ongoing events in which a user creates or currently participates
    public function getByUser($userID){
        $sql = "SELECT event.*, user.username, user.profilePhoto
                FROM event, user, participation 
                WHERE event.ownerID = user.ID AND event.status = true
                AND ( event.ID = participation.eventID AND participation.userID = $userID ) 
                ORDER BY eventDate";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    // Return the events history of a user
    public function getUserHistory($userID){
        $sql = "SELECT event.*, user.username, user.profilePhoto
                FROM event, user, participation  
                WHERE event.ownerID = user.ID AND event.status = false
                AND ( event.ID = participation.eventID AND participation.userID =$userID ) 
                ORDER BY eventDate DESC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    // Return the ongoing events related to a district
    public function getByDistrict($district){
        $sql = "SELECT event.*, user.username, user.profilePhoto
                FROM event, user 
                WHERE event.ownerID = user.ID AND event.distrcit = '$district' AND event.status = true
                ORDER BY eventDate";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

     // Return the events historty related to a district
    public function getDistrictHistory($district){
        $sql = "SELECT event.*, user.username, user.profilePhoto
                FROM event, user 
                WHERE event.ownerID = user.ID AND event.distrcit = '$district' AND event.status = false
                ORDER BY event.eventDate DESC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    // Return the events on that day
    public function getByDate($date){
        $sql = "SELECT event.*, user.username, user.profilePhoto
                FROM event, user 
                WHERE event.ownerID = user.ID AND event.date = '$date'
                ORDER BY event.lastEditTime DESC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }


    // /*/*/**
    //  * Get all the replies and count them
    //  * @param $topic_id
    //  * @return mixed
    //  */
    // public function getTotalReplies($topic_id){
    //     $this->db->query("SELECT * FROM replies WHERE topic_id = '$topic_id'");
    //     $row = $this->db->resultset();
    //     return $this->db->rowCount();
    // }



    // public function getByCategory($category_id){
    //     $query = "SELECT topics.*, users.username, users.avatar, categories.name";
    //     $query .= " From topics INNER JOIN categories";
    //     $query .= " ON topics.category_id = categories.id";
    //     $query .= " INNER JOIN users";
    //     $query .= " ON topics.user_id = users.id";
    //     $query .= " WHERE topics.category_id = :category_id";

    //     $this->db->query($query);
    //     $this->db->bind(':category_id', $category_id);

    //     // Assign the result set
    //     $results = $this->db->resultset();
    //     return $results;

    // }



    // /**
    //  * Get Category by ID
    //  * @param $category_id
    //  * @return mixed
    //  */
    // public function getCategory($category_id){
    //     $this->db->query("SELECT * FROM categories WHERE id = :category_id");
    //     $this->db->bind(':category_id', $category_id);

    //     $row = $this->db->single();
    //     return $row;
    // }*/*/

    // public function getReplies($topic_id){
    //     $query = "SELECT replies.*, users.*";
    //     $query .= " From replies INNER JOIN users";
    //     $query .= " ON replies.user_id = users.id";
    //     $query .= " WHERE replies.topic_id = :topic_id";
    //     $query .= " ORDER BY create_date ASC";

    //     $this->db->query($query);
    //     $this->db->bind(':topic_id', $topic_id);

    //     $row = $this->db->resultset();
    //     return $row;
    // }

    // /**
    //  * Reply to topics
    //  * @param $data
    //  * @return bool
    //  */
    // public function reply($data){
    //     $this->db->query("INSERT INTO replies (topic_id, user_id, body)
    //                                   VALUES (:topic_id, :user_id, :body)");

    //     // Bind values
    //     $this->db->bind(':topic_id', $data['topic_id']);
    //     $this->db->bind(':user_id', $data['user_id']);
    //     $this->db->bind(':body', $data['body']);

    //     if($this->db->execute()){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

}





