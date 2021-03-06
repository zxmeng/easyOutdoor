<?php

require_once('DBClass.php');

class User{
    public $db;

    public function __construct(){
        // Create connection
        $this->db = new Database();
    }

    // get the information of this user
	public function getInfo($uid) {
		$sql = "SELECT user.*
				FROM user
				WHERE uid = $uid";
		$res = $this->db->query($sql);
		$infoArray = mysqli_fetch_array($res);;
		return $infoArray;
	}

	// update database
    public function editProfile($uid, $nickname, $phone, $description, $image){
    	if($image!=""){
	    	$sql = "UPDATE user
	    			SET user.nickname = '$nickname', user.phone = $phone, 
	                    user.uProfile = '$description', user.uPhoto = '$image'
	    			WHERE user.uid = $uid";
    	}
    	else {
    		$sql = "UPDATE user
	    			SET user.nickname = '$nickname', user.phone = $phone, 
	                    user.uProfile = '$description'
	    			WHERE user.uid = $uid";
    	}
    	$this->db->query($sql);
    	return;
    }

    // get its nickname only
    public function getUserName($uid) {
		$sql = "SELECT nickname
				FROM user
				WHERE uid = $uid";
		$res = $this->db->query($sql);
		$nameArray = mysqli_fetch_array($res);
		return $nameArray['nickname'];
	}

	// get its friends
	public function getFriends($uid) {
		$sqlB = "SELECT user.*
				 FROM friend, user
				 WHERE friend.uidA = $uid AND user.uid = friend.uidB";
		$sqlA = "SELECT user.*
				 FROM friend, user
				 WHERE friend.uidB = $uid AND user.uid = friend.uidA";

		$resA = $this->db->query($sqlA);
		$resB = $this->db->query($sqlB);

		$arrayA = $resA->fetch_all(MYSQLI_ASSOC);
		$arrayB = $resB->fetch_all(MYSQLI_ASSOC);

		$result = array_merge($arrayA, $arrayB);
		return $result;
	}

    // get the information of this user
	public function getUser($uid) {
		$sql = "SELECT *
				FROM user
				WHERE uid = $uid";
		$res = $this->db->query($sql);
		$Array = mysqli_fetch_array($res);
		return $Array;
	}

    // check whether user A(uid) followed user B(auid)
	public function checkFollow($uid, $auid){
        $sql = "SELECT COUNT(*) AS total
                FROM follow
                WHERE uidA = $uid AND uidB = $auid";
        $result = $this->db->query($sql);
        $data = $result->fetch_assoc();
        $count = $data['total'];
        return $count;
    }

}

?>