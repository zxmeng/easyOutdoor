<?php
	require_once("Page.php");
	// show firend list

	$uid = $_GET['uid'];

	$page = new Page('friendList.php');
	$page->uid = $uid;

	echo $page;

?>