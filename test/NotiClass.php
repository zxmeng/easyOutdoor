<?php
	require_once('DBClass.php');

	class Notification{
		public $db;

		public function __construct(){
			// Create connection
			$this->db = new Database();
		}

		// Return all comments ordered by their created time
		public function getCommentNoti($uid){
			$sql = "SELECT event.*, comment.*, user.*, notification.*
					FROM notification, user, comment, event
					WHERE event.eid = comment.eid AND event.uid = $uid AND user.uid = comment.suid
					AND notification.fid = comment.cid AND notification.type = 'comment' AND notification.status = 0
					ORDER BY comment.time DESC
					LIMIT 3";
			$result = $this->db->query($sql);
			// $resultArray = $result->fetch_all(MYSQLI_ASSOC);
			// $update = "UPDATE notification, user, comment, event
			// 		   SET notification.status = 1
			// 		   WHERE event.eid = comment.eid AND event.uid = $uid AND user.uid = comment.suid
			// 		   AND notification.fid = comment.cid AND notification.type = 'comment' AND notification.status = 0";
			// $this->db->query($update);
			return $result;
		}

		public function getMentionNoti($uid){
			$sql = "SELECT event.*, comment.*, user.*, notification.*
					FROM notification, user, comment, event
					WHERE event.eid = comment.eid AND comment.ruid = $uid AND user.uid = comment.suid
					AND notification.fid = comment.cid AND notification.type = 'mention' AND notification.status = 0
					ORDER BY comment.time DESC
					LIMIT 3";
			$result = $this->db->query($sql);
			// $resultArray = $result->fetch_all(MYSQLI_ASSOC);
			// $update = "UPDATE notification, user, comment, event
			// 		   SET notification.status = 1
			// 		   WHERE event.eid = comment.eid AND comment.ruid = $uid AND user.uid = comment.suid
			// 		   AND notification.fid = comment.cid AND notification.type = 'mention' AND notification.status = 0";
			// $this->db->query($update);
			return $result;
		}
		
		public function getFollowNoti($uid){
			$sql = "SELECT follow.*, user.*, notification.*
					FROM notification, user, follow
					WHERE user.uid = follow.uidA AND follow.uidB = $uid AND notification.fid = follow.foid
					AND notification.type = 'follow' AND notification.status = 0
					ORDER BY follow.time DESC
					LIMIT 3";
			$result = $this->db->query($sql);
			// $resultArray = $result->fetch_all(MYSQLI_ASSOC);
			// $update = "UPDATE notification, user, follow
			// 		   SET notification.status = 1
			// 		   WHERE user.uid = follow.uidA AND follow.uidB = $uid AND notification.fid = follow.foid
			// 		   AND notification.type = 'follow' AND notification.status = 0";
			// $this->db->query($update);
			return $result;
		}

		public function getJoinNoti($uid){
			$sql = "SELECT event.*, participation.*, user.*, notification.*
					FROM notification, user, participation, event
					WHERE event.eid = participation.eid AND event.uid = $uid AND participation.uid = user.uid
					AND notification.fid = participation.jid AND notification.type = 'join' AND notification.status = 0
					ORDER BY participation.time DESC
					LIMIT 3";

			$result = $this->db->query($sql);
			// $resultArray = $result->fetch_all(MYSQLI_ASSOC);
			// $update = "UPDATE notification, user, participation, event
			// 		   SET notification.status = 1
			// 		  WHERE event.eid = participation.eid AND event.uid = $uid AND participation.uid = user.uid
			// 		   AND notification.fid = participation.jid AND notification.type = 'join' AND notification.status = 0";
			// $this->db->query($update);
			return $result;
		}

		public function updateNoti($nid){

			$update = "UPDATE notification
					   SET notification.status = 1
					   WHERE notification.nid = $nid";
			$this->db->query($update);
		}


		// public function getChatNoti($uid){
		// 	$sql = "SELECT event.*, message.*, user.*, notification.*
		// 			FROM notification, user, participation, event
		// 			WHERE event.eid = message.eid AND event.uid = $uid AND participation.uid = user.uid
		// 			AND notification.fid = participation.jid AND notification.type = 'join' AND notification.status = 0 
		// 			GROUP BY event.eid";

		// 	$result = $this->db->query($sql);
		// 	$resultArray = $result->fetch_all(MYSQLI_ASSOC);
		// 	return $resultArray;
		// }

		// public function getUserName($uid) {
		// 	$sql = "SELECT nickname
		// 			FROM user
		// 			WHERE uid = $uid";
		// 	$res = $this->db->query($sql);
		// 	$nameArray = mysqli_fetch_array($res);
		// 	return $nameArray['nickname'];
		// }
	}
?>