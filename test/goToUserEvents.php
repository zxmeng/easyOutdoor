
<?php
 	require_once('Page.php');

	$uid = $_GET['uid'];
	$flag = $_GET['flag'];

	$page = new Page('userEvents.php');

	// Assign variables
	$page->uid = $uid;
	$page->flag = $flag;

	echo $page;
?>