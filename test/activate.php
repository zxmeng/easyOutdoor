<?php 	

	include_once("scripts/global.php");

	$code = $_GET['code'];

	if(!$code){
		echo "No code supplied";
	}else{
		$check=mysql_query("SELECT * FROM User WHERE code='$code' AND status='1'");
		if(mysql_num_rows($check)==1){
			echo "You have already activated your account";
		}else{
			$activate = mysql_query("UPDATE User SET status='1' WHERE code='$code'");
			echo "Your accound has been activated!";
		}
	}

?>