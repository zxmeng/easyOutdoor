<?php
require_once('DBClass.php');

class Review{
    public $db;
    
    public function __construct(){
        // Create connection
        $this->db = new Database();
    }

    // // Create an review
    public function createReview($uid, $title, $venue, $district, $time, $description, $image, $parNo){
        $now = date("Y-m-d H:i:s");
        $sql = "INSERT INTO review(uid, title, venue, district, eDate, eDescription, ePhoto, likeNo, parNo, postTime, lastEditTime) 
                VALUES ($uid, '$title', '$venue', '$district', '$time', '$description', '$image', 0, $parNo, '$now', '$now')";
        $this->db->query($sql);
        return $this->db->getInsertedID();
    }

    // Edit an review
    public function editReview($pid, $title, $venue, $district, $time, $description, $image, $parNo) {
        $now = date("Y-m-d H:i:s");
        if($image!=""){
            $sql = "UPDATE review
                    SET review.title = '$title', review.venue = '$venue', review.district = '$district', review.eDate = '$time', 
                    review.eDescription = '$description', review.lastEditTime = '$now', review.parNo = $parNo, review.ePhoto = '$image'
                    WHERE review.pid= $pid";
        }
        else {
            $sql = "UPDATE review
                SET review.title = '$title', review.venue = '$venue', review.district = '$district', review.eDate = '$time', 
                review.eDescription = '$description', review.lastEditTime = '$now', review.parNo = $parNo
                WHERE review.pid= $pid";
        }
        $this->db->query($sql);
        return;
    }

    // get the detail information of a review
    public function getReview($id){
       $sql = "SELECT review.*, user.nickname, user.uPhoto
                FROM review, user 
                WHERE review.uid = user.uid AND review.pid = $id";
                //echo "eid is: ".$id;
        $result = $this->db->query($sql);
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    // Return all reviews ordered by their event dates
    public function getAllReviews(){
       // echo "GET ALL reviews";
        $sql = "SELECT review.*, user.nickname, user.uPhoto
                FROM review, user
                WHERE review.uid = user.uid
                ORDER BY review.lastEditTime ASC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    // Return the reviews created by this user
    public function getReviewsByUser($uid){
        $sql = "SELECT review.*, user.*
                FROM review, user
                WHERE review.uid = user.uid AND user.uid = $uid
                ORDER BY review.lastEditTime ASC";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

    // check whether user has liked this review
    public function checkLike($pid, $uid){
        $sql = "SELECT COUNT(*) AS total
                FROM likeReview
                WHERE likeReview.pid = $pid AND likeReview.uid = $uid";
        $result = $this->db->query($sql);
        $data = $result->fetch_assoc();
        $count = $data['total'];
        return $count;
    }

    // user liked a review
    public function like($pid, $uid){
        $sql = "INSERT INTO likeReview(uid,pid,time)
                VALUES($uid, $pid, now())";
        $this->db->query($sql);
        return;
    }

    // user unliked a review
     public function unlike($pid, $uid){
        $sql = "DELETE FROM likeReview 
                WHERE uid = $uid AND pid = $pid";     
        $this->db->query($sql);
        return;
    }

    // get reviews related to this district
    public function getReviewsByDistrict($district){
        $now = date("Y-m-d H:i:s");
        $sql = "SELECT review.*, user.*
                FROM review, user 
                WHERE review.uid = user.uid AND review.district = '$district'
                ORDER BY review.postTime";
        $result = $this->db->query($sql);
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);
        return $resultArray;
    }

}

