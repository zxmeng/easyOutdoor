<?php
 	require_once('Page.php');

	$district = $_GET['district'];
	$flag = $_GET['flag'];

	$page = new Page('district.php');

	// Assign variables
	$page->district = $district;
	$page->flag = $flag;

	echo $page;
?>