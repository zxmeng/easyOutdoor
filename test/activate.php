<?php 	

	include_once("connect.php");

	// first, get the input code
	$code = $_GET['code'];

	if(!$code){
		// handle error
		echo "No code supplied";
	}else{
		$check=mysql_query("SELECT * FROM User WHERE code='$code' AND status='1'");
		if(mysql_num_rows($check)==1){
			// handle error
			echo "You have already activated your account";
		}else{
			// activate the account
			$activate = mysql_query("UPDATE User SET status='1' WHERE code='$code'");
			echo "Your accound has been activated!";
		}
	}

?>