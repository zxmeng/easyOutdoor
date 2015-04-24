<?php
	require_once("Page.php");

	// the interface to change the page content to show messages
	$eid = $_GET['eid'];
	$uid = $_GET['uid'];

	$page = new Page('messageViewer.php');
	// Assign variables
	$page->uid = $uid;
	$page->eid = $eid;

	echo $page;

?>