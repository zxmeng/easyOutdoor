<?php
include_once 'core/init.php';
if(isset($_POST['name'])){
	$name=trim($_POST['name']);

	if(empty($name)){
		$message_cat='You must submit a category name.'; 
	}else if(category_exists($name)){
		$message_cat='That category already exists.';
	}else if(strlen($name)>24){
		$message_cat='Category names can only be up to 24 characters.';
	}

	if( ! isset($message_cat)){
		add_category($name);
		$message_cat='Category created';
	}
}
?>
<!DOCTYPE HTML>
<html>
	<head>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Add a Category</title>

		<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>
		<h1>Add a Category</h1>
		<?php print("$message_cat");?>
		<form action="" method="post">
			<div>
				<label for="name">Name</label>
				<input type="text" name="name" value="">
			</div>
			<div>
				<input type="submit" value="Add Category">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="js/bootstrap.min.js"></script>

	</body>
</html>