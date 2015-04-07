<?php 

include_once("connect.php");

$message = "";

if(isset($_POST['Login'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$remember=$_POST['remember'];
	
	//error handeling
	if((!$email)||(!$password)){
		$message='please insert both fields';
	}else{
		//secure the data
		$query = mysql_query("SELECT * FROM User WHERE email='$email'") or die("Could not check member");
		$count_query = mysql_num_rows($query);
		if($count_query = 0){
			$message ='The information you entered was incorrect!';
		}else{

			if($remember =="yes"){
				//create the cookies
				setcookie("id_cookie",$email, time()+60*60*24*100,"/");
				setcookie("password_cookie",$password, time()+60*60*24*100,"/");
			}
			
			while($query_row=mysql_fetch_assoc($query)){
				$password_db=$query_row['password'];
				//$password=$password;
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
						header("Location:index.php");//refresh
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
<link href="css/login-law.css" rel="stylesheet" type="text/css"/>
<meta charset="UTF-8">
<title>Login</title>
</head>

<body>
<div class="container center login">
    <h1>Login</h1>
    <p><?php echo $message; ?></p>
    <form action="login.php" method="post">
    	<input type="text" name="email" placeholder="Email Address"/><br/>
        <input type="password" name="password" placeholder="Password"/><br/>
        <input type="checkbox" name="remember" value="yes" checked="checked"/>Remember Me?<br/>
        <input type="submit" name="Login"/>
    </form>
</div>
</body>
</html>