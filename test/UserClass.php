<?php

require_once('DBClass.php');
// DB interface for event
class User{

    public $db;

    public function __construct(){
        // Create connection
        $this->db = new Database();
    }

	public function getInfo($uid) {
		$sql = "SELECT user.*
				FROM user
				WHERE uid = $uid";
		$res = $this->db->query($sql);
		$infoArray = mysqli_fetch_array($res);;
		return $infoArray;
	}

    public function getUserName($uid) {
		$sql = "SELECT nickname
				FROM user
				WHERE uid = $uid";
		$res = $this->db->query($sql);
		$nameArray = mysqli_fetch_array($res);;
		return $nameArray['nickname'];
	}

	public function getFriends($uid) {
		$sqlB = "SELECT user.*
				 FROM friend, user
				 WHERE friend.uidA = $uid AND user.uid = friend.uidA";
		$sqlA = "SELECT user.*
				 FROM friend, user
				 WHERE friend.uidB = $uid AND user.uid = friend.uidB";

		$resA = $this->db->query($sqlA);
		$resB = $this->db->query($sqlB);

		$arrayA = $resA->fetch_all(MYSQLI_ASSOC);
		$arrayB = $resB->fetch_all(MYSQLI_ASSOC);

		$result = array_merge($arrayA, $arrayB);
		return $result;
	}
}

?>