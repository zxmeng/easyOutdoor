<?php
// include_once("scripts/global.php");

include_once("connect.php");
$message="";

if(isset($_POST['Register'])){

	$nickname = $_POST['nickname'];
	$phone = $_POST['phone'];
	$profile = $_POST['profile'];
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	
	//error handeling
	if((!$nickname)||(!$email)||(!$password1)||(!$password2)){
		$message='Please insert all fields in the form below!';
	}else{
		if($password1!=$password2){
			$message='Your password fields do not match!';
		}else{
			//securing the data
			//$password1=md5($password1);
		
			$email=mysql_real_escape_string($email);
			
			//check for dublicates of email
			$email_query=mysql_query("SELECT email FROM User WHERE email ='$email' LIMIT 1") or die("Could not check email");
			$count_email=mysql_num_rows($email_query);
			

			if($count_email>0){
				$message= 'Your email is already in use!';
			}else{
			
				//generate random code
				$code=rand(11111111,99999999);
				//sned activation email. Everything below is in the email! Lawrence
				require 'PHPmailer/Send_Mail.php';
				$to = "$email";
				$subject = "EasyOutdoor: Activate Your Account and Join Awesome Activities Now!";
				$body = "Hello $nickname,\n\nYou registered and need to activate your account. Click the link below or paste it into the URL bar of your browser\n\n http://localhost:8080/easyOutdoor/test/activate.php?code=$code\n\nThanks!";
				Send_Mail($to,$subject,$body);
				//end email (HAVE TO CHANGE THE LINK IN BODY SINCE THE SERVER SET UP IS DIFFERENT IN EVERY PC) lawrence!!!!!!!!!!!!!!

				if(!mail($to,$subject,$body)){
					$message = "We couldn't sign you up at this time. Please try again later.";
				}else{
				
					//insert to database
					$now = date("Y-m-d H:i:s");
					$register= mysql_query("INSERT INTO User(nickname,email,password,phone,uProfile,joinTime,status,code)
						VALUES('$nickname','$email','$password1','$phone','$profile','$now','0','$code')")
						or die("Could not insert your information");
					$message=  'You have now been registered!';
					header("Location:index.php");
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
<title>Register</title>
</head>

<body>
<div class="container center login">
    <h1>Register</h1>
    <p><?php print("$message");?></p>
    <form action="register.php" method="post">
    	<input type="text" name="nickname" placeholder="Nickname"/><br/>
        <input type="text" name="email" placeholder="Email"/><br/>
        <input type="text" name="phone" placeholder="Phone"/><br/>
        <input type="text" name="profile" placeholder="Profile"/><br/>
        <input type="password" name="password1" placeholder="Password"/><br/>
        <input type="password" name="password2" placeholder="Validate Password"/><br/>
        <input type="submit" name="Register" value="Register"/>
    </form>
</div>
</body>
</html>