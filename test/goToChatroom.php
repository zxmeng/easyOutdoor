
<?php
 	require_once('Page.php');

	$eid = $_GET['eid'];
	$uid = $_GET['uid'];

	$page = new Page('chatroom.php');

	// Assign variables
	$page->eid = $eid;
	$page->uid = $uid;

	echo $page;
?>