<?php
 	require_once('Page.php');

	$data = $_GET['data'];
	$flag = $_GET['flag'];

	// the interface to change the page content to searchResult
	$page = new Page('searchResult.php');

	// Assign variables
	$page->data = $data;
	$page->flag = $flag;

	echo $page;
?>