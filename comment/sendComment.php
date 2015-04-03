<?php
	require_once('DBClass.php');
	header("Content-type: text/html; charset=utf-8");
	
	if(empty($_POST['senderID'])){ exit(); }
	$senderID = $_POST['senderID'];
	$receiverID = $_POST['receiverID'];
	$eventID = $_POST['eventID'];
	$content = $_POST['content'];

	// $senderID = 3;
	// $receiverID;
	// $eventID = 1;
	// $content = 'HELLO';

	// Create connection
	$db = new DataBase();
	if(!empty($receiverID)){
		$sql = "INSERT INTO comment (content, senderID, receiverID, eventID, time)
				VALUES ('{$content}', '{$senderID}', '{$receiverID}', '{$eventID}', now())";

		// $res = mysql_query($sql, $link);
		$res = $db->query($sql);
		if(!$res){
			die; //Sending failed
		}
		echo "succeed";
	}
	else {
		$sql = "INSERT INTO comment (content, senderID, eventID, time)
				VALUES ('{$content}', '{$senderID}', '{$eventID}', now())";

		// $res = mysql_query($sql, $link);
		$res = $db->query($sql);

		if(!$res){
			die; //Sending failed
		}
		echo "succeed";
	}
	$db->close();
?>