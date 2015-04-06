<?php
	require_once("Page.php");
	// show messages

	$auid = $_GET['auid'];
	$uid = $_GET['uid'];
	$flag = $_GET['flag'];

	$page = new Page('friendDetail.php');
	$page->uid = $uid;
	$page->auid = $auid;
	$page->flag = $flag;

	echo $page;

?>