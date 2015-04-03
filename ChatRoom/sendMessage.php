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
	// $link = mysql_connect(DB_HOST, DB_USER, DB_PSW) or die ('unable to connect: ' . mysql_error());
	// mysql_select_db(DB_NAME);
	$db = new DataBase();

	$sql = "INSERT INTO message (roomID, userID, content, time)
			VALUES ('{$roomID}', '{$userID}', '{$content}', now())";

	// $res = mysql_query($sql, $link);
	$res = $db->query($sql);

	if(!$res){
		die ('Unable to send message: ' . mysql_error()); //Sending failed
	}
	else{
		date_default_timezone_set("PRC");
		echo date("H:i:s");
	}
	$db->close();
?>
