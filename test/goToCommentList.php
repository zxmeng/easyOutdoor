<?php
	require_once("Page.php");
	// show comment list

	$eid = $_GET['eid'];
	$uid = $_GET['uid'];

	$page = new Page('commentList.php');
	$page->eid = $eid;
	$page->uid = $uid;

	echo $page;
	// echo "error";

?>