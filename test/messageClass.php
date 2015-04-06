<?php
	require_once('DBClass.php');

	class Message {
		public $db;
		
		public function __construct(){
			// Create connection
			$this->db = new Database();
		}

		// Return all comments ordered by their sent time
		public function getAllMessages($eid){
			$sql = "SELECT user.nickname, message.time, message.content, message.mid, user.uid, user.uPhoto
					FROM message, user
					WHERE user.uid = message.uid AND message.eid = '{$eid}' 
					ORDER BY message.time";
			$resultArray = $this->db->query($sql);
			return $resultArray;
		}
	}
?>