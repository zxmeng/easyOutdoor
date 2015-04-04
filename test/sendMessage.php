<?php
	require_once('DBClass.php');
	header("Content-type: text/html; charset=utf-8");
	
	if(empty($_POST['userID'])){ exit(); }
	$userID = $_POST['userID'];
	$roomID = $_POST['roomID'];
	$content = $_POST['content'];
	// $userID = 4;
	// $roomID = 2;
	// $content = 'Hello2222';


	// Create connection
	$db = new DataBase();

	$sql = "INSERT INTO message (rid, uid, content, time)
			VALUES ('{$roomID}', '{$userID}', '{$content}', now())";

	// $res = mysql_query($sql, $link);
	$res = $db->query($sql);

	if(!$res){
		die ('Unable to send message.'); //Sending failed
	}
	else{
		date_default_timezone_set("PRC");
		echo date("H:i:s");
	}
	$db->close();
?>
