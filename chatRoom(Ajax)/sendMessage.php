<?php

	header("Content-type:text/html;charset=utf-8");
	if(empty($_POST['sender'])){exit();}
	$sender = $_POST['sender'];
	$receiver = $_POST['receiver'];
	$content = $_POST['content'];
	//$aa = $content."&".$sender."&".$receiver;
	//file_put_contents("log.txt",$content."\r\n",FILE_APPEND);
	//include "include/dbconn.php";

	$servername = "localhost";
	$username = "root";
	$password = '';
	$dbname = "test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect to database");

	$sql = "INSERT INTO message (sender,receiver,content,stime)VALUES ('{$sender}','{$receiver}','{$content}',now())";
	//file_put_contents("log.txt",$sql."\r\n",FILE_APPEND);
	$res = mysql_query($sql,$link);
	if(!$res){
		echo ""; //Sending failed
	}else{
		date_default_timezone_set("PRC");
		echo date("H:i:s");
	}
?>
