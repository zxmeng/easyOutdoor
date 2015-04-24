

<?php
 	require_once('Page.php');

	// the interface to change the page content to editReview
	$uid = $_GET['uid'];
	$pid = $_GET['pid'];

	$page = new Page('editReview.php');
	// Assign variables
	$page->pid = $pid;
	$page->uid = $uid;
	echo $page;
?>