<?php
	require_once("Page.php");
	// the interface to change the page content to show comment list

	$eid = $_GET['eid'];
	$uid = $_GET['uid'];

	$page = new Page('commentList.php');
	// Assign variables
	$page->eid = $eid;
	$page->uid = $uid;

	echo $page; // return to client

?>