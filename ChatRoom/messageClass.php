<?php
	require_once('config/DBClass.php');

	class Message {
		public $db;
		public function __construct(){
			// Create connection
			$this->db = new Database();
		}

		// Return all comments ordered by their sent time
		public function getAllMessages($roomID){
			$sql = "SELECT user.nickname, message.time, message.content, message.mid, user.uid
					FROM message, user
					WHERE user.uid = message.uid AND message.rid = '{$roomID}' 
					ORDER BY message.time";
			$resultArray = $this->db->query($sql);
			return $resultArray;
		}
	}
?>