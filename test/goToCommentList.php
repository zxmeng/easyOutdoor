<?php
	require_once("Page.php");
	// show comment list

	$eid = $_GET['eid'];

	$page = new Page('commentList.php');
	$page->eid = $eid;

	echo $page;
	// echo "error";

?>