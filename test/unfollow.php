<?php

	require_once('DBClass.php');

	// if(empty($_POST['userAID'])){ exit(); }
	// $AID = $_POST['AID'];
	// $BID = $_POST['BID'];

	$AID = 3;
	$BID = 4;

	// Create connection
	$db = new DataBase();

	// In the database, userA follows userB
	$sql = "DELETE FROM follow
			WHERE uidA = $AID AND uidB = $BID";
	$res = $db->query($sql);
	if(!$res) die; // following failed

	// delete the friend association
	$check = "SELECT *
			  FROM friend
			  WHERE (uidA = $BID AND uidB = $AID) OR (uidA = $AID AND uidB = $BID)";

	$num = mysqli_num_rows($db->query($check));

	if($num != 0) {
		$Dfriend = "DELETE FROM friend
			  	   	WHERE (uidA = $BID AND uidB = $AID) OR (uidA = $AID AND uidB = $BID)";
		$resDF = $db->query($Dfriend);
		if(!$resDF) die;
		echo "deleted friend";
	}

	echo "succeed";
	$db->close();
	
?>