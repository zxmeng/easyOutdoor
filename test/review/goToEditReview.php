

<?php
 	require_once('Page.php');

	$uid = $_GET['uid'];
	$pid = $_GET['pid'];
	//echo $uid;

	$page = new Page('editReview.php');
	$page->pid = $pid;
	$page->uid = $uid;
	echo $page;
?>