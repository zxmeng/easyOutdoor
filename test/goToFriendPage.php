<?php
	require_once("Page.php");

	// the interface to change the page content to friendPage
	$uid = $_GET['uid'];

	$page = new Page('friendPage.php');
	// Assign variables
	$page->uid = $uid;

	echo $page;

?>