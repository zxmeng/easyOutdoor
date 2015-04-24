
<?php
 	require_once('Page.php');

	// the interface to change the page content to eventPage
	$eid = $_GET['eid'];
	$uid = $_GET['uid'];

	$page = new Page('eventPage.php');

	// Assign variables
	$page->eid = $eid;
	$page->uid = $uid;

	echo $page;
?>