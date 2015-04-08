<?php

	require_once('NotiClass.php');
	$fid = $_GET['fid'];

	$noti = new Notification();

	$noti->updateNoti($fid);

?>