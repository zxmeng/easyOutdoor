<?php
	require_once('DBClass.php');
	
	if(empty($_GET['suid'])){ exit(); }
	$suid = $_GET['suid'];
	$ruid = $_GET['ruid'];
	$eid = $_GET['eid'];
	$content = $_GET['content'];

	// Create connection
	$db = new DataBase();
	// if($ruid != 0){
		$sql = "INSERT INTO comment (content, suid, ruid, eid, time)
				VALUES ('{$content}', '{$suid}', '{$ruid}', '{$eid}', now())";
		$res = $db->query($sql);
		if(!$res){
			die; //Sending failed
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