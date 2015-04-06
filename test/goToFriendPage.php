<?php
	require_once("Page.php");
	// show firend list

	$uid = $_GET['uid'];

	$page = new Page('friendPage.php');
	$page->uid = $uid;

	echo $page;

?>