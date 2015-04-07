<?php
	require_once('DBClass.php');
	require_once('EventClass.php');
	
	if(empty($_GET['suid'])){ exit(); }
	$suid = $_GET['suid'];
	$ruid = $_GET['ruid'];
	$eid = $_GET['eid'];
	$content = $_GET['content'];

	// Create connection
	$db = new DataBase();
	$ev = new Event();
	$owner = $ev->getOwner($eid);
	$ownerID = $owner['uid'];

	// if($ruid != 0){
		$sql = "INSERT INTO comment (content, suid, ruid, eid, time)
				VALUES ('{$content}', '{$suid}', '{$ruid}', '{$eid}', now())";
		$res = $db->query($sql);
		if(!$res){
			die; //Sending failed
		}

		$cid = $db->getInsertedID();

		// Insert notification
		if($suid != $ownerID){
			$notifyOwner = "INSERT INTO notification (type, fid)
							VALUES ('comment', '{$cid}')";
			$res = $db->query($notifyOwner);
			if(!res) die;
		}

		if ($ruid != 0){
			$notifyMention = "INSERT INTO notification (type, fid)
							  VALUES ('mention', '{$cid}')";
			$res = $db->query($notifyMention);
			if(!res) die;
		}
		echo "succeed";

	// }
	// else {
	// 	$sql = "INSERT INTO comment (content, suid, eid, time)
	// 			VALUES ('{$content}', '{$suid}', '{$eid}', now())";
	// 	$res = $db->query($sql);
	// 	if(!$res){
	// 		die; //Sending failed
	// 	}
	// 	echo "succeed";
	// }
	$db->close();
?>