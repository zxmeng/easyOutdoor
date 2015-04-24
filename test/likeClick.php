
<?php
 	require_once('EventClass.php');
 	require_once('ReviewClass.php');
 	
 	// handle user clicking (un)like button
 	if($flag < 2){
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
	}
	else {
		$review = new Review();

	 	$pid = $_GET['pid'];
		$uid = $_GET['uid'];
		$flag = $_GET['flag'];

		if($flag == 3){
			$review->like($pid,$uid);
		}
		else{
			$review->unlike($pid,$uid);
		}
		$review->db->close();
	}
?>