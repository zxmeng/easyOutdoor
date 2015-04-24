

<?php
 	require_once('Page.php');

	// the interface to change the page content to createReview
	$uid = $_GET['uid'];

	$page = new Page('createReview.php');
	
	// Assign variables
	$page->uid = $uid;

	echo $page;
?>