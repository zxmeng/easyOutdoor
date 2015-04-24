<?php
 	require_once('Page.php');

	// the interface to change the page content to createEvent
	$uid = $_GET['uid'];

	$page = new Page('createEvent.php');
	// assign variables
	$page->uid = $uid;

	echo $page; // return to client
?>