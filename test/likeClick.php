
<?php
 	require_once('EventClass.php');
 	$event = new Event();

 	$eid = $_GET['eid'];
	$uid = $_GET['uid'];
	$flag = $_GET['flag'];

	if($flag == 1){
		$event->like($eid,$uid);
	}
	else{
		$event->unlike($eid,$uid);
	}
	$event->db->close();
?>