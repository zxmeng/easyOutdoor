<?php
	require_once("Page.php");
	// show messages

	$eid = $_GET['eid'];
	$uid = $_GET['uid'];

	$page = new Page('messageViewer.php');
	$page->uid = $uid;
	$page->eid = $eid;

	echo $page;

?>