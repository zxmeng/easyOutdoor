<?php
	session_start();
	include_once("connect.php");

	$session_email=$_SESSION['email'];
	$session_password=$_SESSION['password'];
	$session_id=$_SESSION['id'];
	$session_id=$_COOKIE['id_cookie'];
	$session_password=$_COOKIE['password_cookie'];
	//checking if the sessions are set
	if(isset($_SESSION['email'])){
		
		$query = mysql_query("SELECT * FROM User WHERE email='$session_email'") or die("Could not check member");
		$count_query = mysql_num_rows($query);
		if($count_query = 0){
			$logged=0;
			header("Location:logout.php");
			echo '^logged1';
		}else{
			
			while($query_row=mysql_fetch_assoc($query)){
				$password_db=$query_row['password'];
				//$password=$password;
				if($session_password!=$password_db){
					$logged=0;
					header("Location:logout.php");
					echo '^logged2';
				}else{
					$logged=1;
					}
				}
			}

	}
	/*else {

	if(isset($_COOKIE['id_cookie'])){
		
		//check if the member exists
		$query=mysql_query("SELECT * FROM User WHERE id='$session_id' AND password='$session_password' LIMIT 1")or die("Could not check member");
		$count_count=mysql_num_rows($query);
		if($count_count>0){
			while($row=mysql_fetch_array($query)){
				$session_email=$row['email'];
			}
			//create sessions
			$_SESSION['email']=$session_email;
			$_SESSION['id']=$session_id;
			$_SESSION['password']=$session_password;
			//logged in stuff here
			$logged=1;
		}else{
			//header("Location:logout.php");
			//header("Location:test.php");
			exit();
		}
	}else{
		//if the user is not logged in
		$logged = 0;echo '4';
		//header("Location:test.php");
	}*/
?>