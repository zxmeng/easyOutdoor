<?php

	header("Content-type:text/html;charset=utf-8");
	if(empty($_POST['sender'])){exit();}
	$sender = $_POST['sender'];
	$receiver = $_POST['receiver'];

	//include "include/dbconn.php";
	$servername = "localhost";
	$username = "root";
	$password = '';
	$dbname = "test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect to database");

	$sql = "select content,stime from message where sender='{$receiver}' and receiver='{$sender}' and mloop=0 order by stime asc";
	//file_put_contents("log.txt",$sql."\r\n",FILE_APPEND);
	$res = mysql_query($sql,$link);
	$row=mysql_fetch_array($res);

	//Number of messages
	//Using json
	$mNums = mysql_num_rows($res);
	if($mNums<1){
		echo "nomessage";
		exit();
	}else if($mNums==1){
		echo "[{'content':'".$row['content']."','stime':'".substr($row['stime'],11)."'}]";
	}else{
		$result="[{'content':'".$row['content']."','stime':'".substr($row['stime'],11)."'}";
		while($row=mysql_fetch_array($res)){
			$result.=",{'content':'".$row['content']."','stime':'".substr($row['stime'],11)."'}";
		}
		$result.=']';
		echo $result;
	}
	mysql_free_result($res);


	//Set the status to 1 after reveiving the message
	if($mNums>0){
		$sql = "update message set mloop=1 where sender='{$receiver}' and receiver='{$sender}' and mloop=0";
		mysql_query($sql,$link);
		//file_put_contents("log.txt",$sql."\r\n",FILE_APPEND);
	}

?>
