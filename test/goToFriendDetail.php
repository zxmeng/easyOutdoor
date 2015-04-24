<?php
	require_once("Page.php");

	// the interface to change the page content to friendDetail
	$auid = $_GET['auid'];
	$uid = $_GET['uid'];
	$flag = $_GET['flag'];

	$page = new Page('friendDetail.php');
	// Assign variables
	$page->uid = $uid;
	$page->auid = $auid;
	$page->flag = $flag;

	echo $page;

?>