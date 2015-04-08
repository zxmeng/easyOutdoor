<?php

	require_once('NotiClass.php');
	$nid = $_GET['nid'];

	$noti = new Notification();

	$noti->updateNoti($nid);

?>