<?php
	require_once('DBClass.php');
	header("Content-type: text/html; charset=utf-8");

	if(empty($_POST['roomID'])) { exit(); }
	$roomID = $_POST['roomID'];
	// $roomID = 2;
	// echo $roomID;

	// Create connection
	// $link = mysql_connect(DB_HOST, DB_USER, DB_PSW) or die ('unable to connect: ' . mysql_error());
	// mysql_select_db(DB_NAME, $link);
	$db = new DataBase();

	$sql = "SELECT user.first, message.time, message.content, message.MID, user.ID
			FROM message, user
			WHERE user.ID = message.userID AND message.roomID = '{$roomID}' ORDER BY message.time DESC";

	// $res = mysql_query($sql, $link) or die ('SQL: {$sql}<br>Error: ' . mysql_error());
	$res = $db->query($sql);

	$row = mysqli_fetch_array($res);
	$mNums = mysqli_num_rows($res); // Get the number of messages

	if($mNums < 1){
		echo "no message";
		exit();
	}
	else if($mNums == 1){
		echo "[{'MID':'".$row['MID']."','userID':'".$row['ID']."','userName':'".$row['first']."','content':'".$row['content']."','time':'".substr($row['time'], 11)."'}]"; //Using json
	}

	else{ // Find the lastest 20 messages and show them
		// echo "mNum = ";
		// echo $mNums;
		$result = "[{'MID':'".$row['MID']."','userID':'".$row['ID']."','userName':'".$row['first']."','content':'".$row['content']."','time':'".substr($row['time'], 11)."'}";
		$count = 1;
		while($row = mysqli_fetch_array($res)){
			$result .= ",{'MID':'".$row['MID']."','userID':'".$row['ID']."','userName':'".$row['first']."','content':'".$row['content']."','time':'".substr($row['time'],11)."'}";
			$count++;
			// echo "count = ", $count;
			if ($count == 20) break;
		}
		$result .= ']';
		echo $result;
	}

?>
