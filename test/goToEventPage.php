
<?php
 	require_once('Page.php');

	$eid = $_GET['eid'];
	$uid = $_GET['uid'];

	$page = new Page('eventPage.php');

	// Assign variables
	$page->eid = $eid;
	$page->uid = 2;

	echo $page;
?>