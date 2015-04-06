
<?php
 	require_once('Page.php');

	$pid = $_GET['pid'];
	$uid = $_GET['uid'];

	$page = new Page('reviewPage.php');

	// Assign variables
	$page->pid = $pid;
	$page->uid = $uid;

	echo $page;
?>