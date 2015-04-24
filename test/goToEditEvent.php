

<?php
 	require_once('Page.php');

	// the interface to change the page content to editEvent
	$uid = $_GET['uid'];
	$eid = $_GET['eid'];

	$page = new Page('editEvent.php');
	// Assign variables
	$page->eid = $eid;
	$page->uid = $uid;
	echo $page;
?>