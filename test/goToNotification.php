
<?php
 	require_once('Page.php');

	// the interface to change the page content to show notifications
	$uid = $_GET['uid'];

	$page = new Page('notification.php');
	// Assign variables
	$page->uid = $uid;

	echo $page;
?>