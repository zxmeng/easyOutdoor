
<?php
 	require_once('EventClass.php');
 	$event = new Event();
 	// handle user clicking (un)join button
 	$eid = $_GET['eid'];
	$uid = $_GET['uid'];
	$flag = $_GET['flag'];

	if($flag == 1){
		$event->join($eid,$uid);
	}
	else{
		$event->unjoin($eid,$uid);
	}
	$event->db->close();
?>