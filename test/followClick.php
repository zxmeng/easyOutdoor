<?php

	require_once('DBClass.php');

	// Create connection
	$db = new DataBase();

	$auid = $_GET['auid'];
	$uid = $_GET['uid'];
	$flag = $_GET['flag'];

	// flag = 1 -> follow
	if ($flag > 0){
		// Check duplicate follow
		$check_dump = "SELECT *
					   FROM follow
					   WHERE uidA = $uid AND uidB = $auid";
		$dump_num = mysqli_num_rows($db->query($check_dump));
		if ($dump_num > 0) die ('Dumplicate follow');

		// In the database, userA follows userB
		$sql = "INSERT INTO follow (uidA, uidB)
				VALUES ('{$uid}', '{$auid}')";
		$res = $db->query($sql);
		if(!$res) die; // following failed

		$foid = $db->getInsertedID();
		$notifyFollow = "INSERT INTO notification (type, fid)
						 VALUES ('follow', '{$foid}')";
		$nitifyRes = $db->query($notifyFollow);
		if(!notifyRes) die;

		// check if userB followed userA
		// if yes, then treat them as friends (and they can at the other in a comment)
		$check = "SELECT * 
				  FROM follow
				  WHERE uidA = $auid AND uidB = $uid";
		$num = mysqli_num_rows($db->query($check));

		if($num > 0) {
			$friend = "INSERT INTO friend (uidA, uidB)
					   VALUES ('{$uid}', '{$auid}')";
			$resF = $db->query($friend);
			if(!$resF) die;
			echo "added friend";
		}
	}

	// flag = 0 ->unfollow
	else { 
		// In the database, userA follows userB
		$sql = "DELETE FROM follow
				WHERE uidA = $uid AND uidB = $auid";
		$res = $db->query($sql);
		if(!$res) die; // following failed

		// delete the friend association if it existed
		$check = "SELECT *
				  FROM friend
				  WHERE (uidA = $auid AND uidB = $uid) OR (uidA = $uid AND uidB = $auid)";

		$num = mysqli_num_rows($db->query($check));

		if($num != 0) {
			$Dfriend = "DELETE FROM friend
				  	   	WHERE (uidA = $auid AND uidB = $uid) OR (uidA = $uid AND uidB = $auid)";
			$resDF = $db->query($Dfriend);
			if(!$resDF) die;
			echo "deleted friend";
		}
	}

	echo "succeed";
	$db->close();

?>