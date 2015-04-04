<?php
	require_once("Page.php");
	// show messages

	$rid = $_GET['roomID'];
	$uid = $_GET['userID'];

	$page = new Page('messageViewer.php');
	$page->uid = $uid;
	$page->rid = $rid;

	echo $page;

?>