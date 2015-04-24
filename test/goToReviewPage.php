
<?php
 	require_once('Page.php');

	// the interface to change the page content to reviewPage
	$pid = $_GET['pid'];
	$uid = $_GET['uid'];

	$page = new Page('reviewPage.php');

	// Assign variables
	$page->pid = $pid;
	$page->uid = $uid;

	echo $page;
?>