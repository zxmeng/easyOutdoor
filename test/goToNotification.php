

<?php
 	require_once('Page.php');

	$uid = $_GET['uid'];
	//echo "User: ".$uid;

	$page = new Page('notification.php');
	$page->uid = $uid;

	echo $page;
?>