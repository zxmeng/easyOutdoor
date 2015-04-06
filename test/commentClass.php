<?php
	require_once('DBClass.php');

	class Comment{
		public $db;
		public function __construct(){
			// Create connection
			$this->db = new Database();
		}

		// Return all comments ordered by their created time
		public function getComments($eid){
			$sql = "SELECT comment.content, comment.time, user.nickname, comment.ruid, comment.suid, user.uPhoto
					FROM comment, user
					WHERE comment.eid = $eid AND user.uid = comment.suid
					ORDER BY time";
			$resultArray = $this->db->query($sql);
			return $resultArray;
		}
		
		public function getUserName($uid) {
			$sql = "SELECT nickname
					FROM user
					WHERE uid = $uid";
			$res = $this->db->query($sql);
			$nameArray = mysqli_fetch_array($res);
		return $nameArray['nickname'];
	}
	}
?>