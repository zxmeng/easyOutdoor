

<?php
 	require_once('Page.php');

	$uid = $_GET['uid'];
	$eid = $_GET['eid'];
	//echo $uid;

	$page = new Page('editEvent.php');
	$page->eid = $eid;
	$page->uid = $uid;
	echo $page;
?>