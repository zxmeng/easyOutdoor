<?php
	require_once("Page.php");
	// show messages

	$auid = $_GET['auid'];
	$uid = $_GET['uid'];

	$page = new Page('friendDetail.php');
	$page->uid = $uid;
	$page->auid = $auid;

	echo $page;

?>