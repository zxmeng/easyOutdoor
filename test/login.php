<?php 

include_once("connect.php");

$message = "";
$message = "Welcome Back to EasyOutdoor";
if(isset($_POST['Login'])){
	$email=$_POST['email'];
	$password=$_POST['password'];

	//error handeling
	if((!$email)||(!$password)){
		$message='please insert both fields';
	}else{
		//secure the data
		$query = mysql_query("SELECT * FROM User WHERE email='$email'") or die("Could not check member");
		$count_query = mysql_num_rows($query);
		if($count_query == 0){
			$message ='The information you entered was incorrect!';
		}else{
			while($query_row=mysql_fetch_assoc($query)){
				$password_db=$query_row['password'];
				if($password!=$password_db){
					$message = "Incorrect password";

				}else{
					$status=$query_row['status'];
					$email=$query_row['email'];

					if($status==0){
						$message = "You haven't activated your account, please check your email ($email)";
					}else{
						session_start();

						$_SESSION['logged']=1;
						$_SESSION['id']=$query_row['uid'];
						$_SESSION['email']=$email;
						$_SESSION['nickname']=$nickname;
						$_SESSION['password']=$password;
						$abc=$_SESSION['email'];
						header("Location:index.php"); // refresh
					}
				}
			}
		}
	}		
}

?>

<!doctype html>
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


<body>
<div class="login" align="center">
	<div>	
				<img style="height:250px;width:250px;"src="images/logo-sqw.png"><br>
				
			</div>
    <h1>Login</h1>
    <p><?php echo $message; ?></p><div class="logintype">
    <form action="login.php" method="post">
    	<input type="text" name="email" placeholder="Email Address"/><br/>
        <input type="password" name="password" placeholder="Password"/><br/>
        <input type="submit" name="Login"/>
    </form></div>
</div>
</body>
</html>