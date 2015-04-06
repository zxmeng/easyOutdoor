<?php include_once("scripts/global.php");
if($logged==0){
	header("Location:index.php");
	exit();
}
?>
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
    Logged in<br/>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>