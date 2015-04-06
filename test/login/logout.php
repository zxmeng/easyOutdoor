<?php
session_start();

session_destroy();

if(isset($_COOKIE['id_cookie'])){
	setcookie("id_cookie","",time()-50000,'/');
	setcookie("password_cookie","",time()-50000,'/');
}
if(!array_key_exists( 'email', $_SESSION )){
	echo("We could not log you out, try again!");
	exit();
}else{
	header("Location:login.php");
}
?>