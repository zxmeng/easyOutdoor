<?php
	require_once("Page.php");

	// the interface to change the page content to friendList
	$uid = $_GET['uid'];
	$show = $_GET['show'];

	$page = new Page('friendList.php');
	// Assign variables
	$page->uid = $uid;
	$page->show = $show;

	echo $page;

?>