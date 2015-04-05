<?php

	require_once('DBClass.php');

	// if(empty($_POST['userAID'])){ exit(); }
	// $AID = $_POST['AID'];
	// $BID = $_POST['BID'];

	$AID = 4;
	$BID = 2;

	// Create connection
	$db = new DataBase();

	// Check duplicate follow
	$check_dump = "SELECT *
				   FROM follow
				   WHERE uidA = $AID AND uidB = $BID";
	$dump_num = mysqli_num_rows($db->query($check_dump));
	if ($dump_num > 0) die ('Dumplicate follow');

	// In the database, userA follows userB
	$sql = "INSERT INTO follow (uidA, uidB)
			VALUES ('{$AID}', '{$BID}')";
	$res = $db->query($sql);
	if(!$res) die; // following failed

	// check if userB followed userA
	// if yes, then treat them as friends (and they can at the other in a comment)
	$check = "SELECT * 
			  FROM follow
			  WHERE uidA = $BID AND uidB = $AID";
	$num = mysqli_num_rows($db->query($check));

	if($num > 0) {
		$friend = "INSERT INTO friend (uidA, uidB)
				   VALUES ('{$AID}', '{$BID}')";
		$resF = $db->query($friend);
		if(!$resF) die;
		echo "add friend    ";
	}

	echo "succeed";
	$db->close();

?>