<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>EasyOutdoor</title>

		<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>

    	<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  		<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
  		<script src="map-main.js" type="text/javascript"></script>	
		<script src="userScript.js"></script>
		<script src="searchScript.js"></script>
		<script src="mainScript.js"></script>
		<script src="eventScript.js"></script>
		<script src="reviewScript.js"></script>
		<script src="commentScript.js"></script>
		<script src="messageScript.js"></script>

		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
			<link rel="stylesheet" href="css/masonry-lawrence.css" />
		</noscript>
		<link rel="stylesheet" href="css/chatroom.css" />

	</head>

<?php 
	if($logged==1){
		// if it's logged in, load the notification
?>
	    <script type="text/javascript">setInterval(loadNotification, 500)</script>
		<body id="top" onload="loadNotification(<?php echo $_SESSION['id']; ?>)">
<?php
	}
	else{
?>
		<body id="top" onload="">
<?php
	}
?>
		<!-- Header -->
			<header id="header">
				<?php include_once('left.php'); ?>
			</header>

