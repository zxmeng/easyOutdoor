<?php
	session_start();

	if (isset($_SESSION["logged"])) {
	    $logged = $_SESSION['logged'];  
	}
	else{  
	    $logged = 0;
	    $_SESSION['id'] = -1;
	}

	require_once('init.php');
	include_once('header.php');
	include_once('mainPage.php');
	include_once('footer.php');
?>