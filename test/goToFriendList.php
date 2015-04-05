<?php
	require_once("Page.php");
	// show firend list

	$uid = $_GET['uid'];
	$show = $_GET['show'];

	$page = new Page('friendList.php');
	$page->uid = $uid;
	$page->show = $show;

	echo $page;

?>