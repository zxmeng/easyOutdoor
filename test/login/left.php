<?php include_once("scripts/global.php");
if($logged==1){
	header("Location:loggedin.php");
	exit();
}?>


<!doctype html>
<html>
<head>
<link href="css/login-law.css" rel="stylesheet" type="text/css"/>
<meta charset="UTF-8">
<title>EasyOutdoor</title>
</head>

<body>
<div class="container center login">
    <h1>EasyOutdoor</h1>
    <a href="login.php">Login</a> | <a href="register.php">Register</a>
</div>
</body>
</html>