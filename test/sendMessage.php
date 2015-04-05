<?php
	require_once('DBClass.php');
	header("Content-type: text/html; charset=utf-8");
	
	if(empty($_POST['uid'])){ exit(); }
	$uid = $_POST['uid'];
	$eid = $_POST['eid'];
	$content = $_POST['content'];

	// Create connection
	$db = new DataBase();

	$sql = "INSERT INTO message (eid, uid, content, time)
			VALUES ('{$eid}', '{$uid}', '{$content}', now())";

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
