
<?php
 	require_once('Page.php');

	// the interface to change the page content to userEvents
	$auid = $_GET['auid'];
	$uid = $_GET['uid'];
	$flag = $_GET['flag'];

	$page = new Page('userEvents.php');

	// Assign variables
	$page->auid = $auid;
	$page->uid = $uid;
	$page->flag = $flag;

	echo $page;
?>