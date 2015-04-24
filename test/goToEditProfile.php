

<?php
 	require_once('Page.php');

	// the interface to change the page content to editProfile
	$uid = $_GET['uid'];

	$page = new Page('editProfile.php');

	// Assign variables
	$page->uid = $uid;

	echo $page;
?>