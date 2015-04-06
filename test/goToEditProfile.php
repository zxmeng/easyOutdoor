

<?php
 	require_once('Page.php');

	$uid = $_GET['uid'];

	$page = new Page('editProfile.php');

	$page->uid = $uid;

	echo $page;
?>