
<?php
	// the interface to change the page content to chatroom
 	require_once('Page.php');

	$eid = $_GET['eid'];
	$uid = $_GET['uid'];

	$page = new Page('chatroom.php');

	// Assign variables
	$page->eid = $eid;
	$page->uid = $uid;

	echo $page; // return to client
?>