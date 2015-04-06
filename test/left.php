<?php 
	if($logged==1){
		//logged in
?>
		<div class="container center login">
		    <h1>EasyOutdoor</h1>
		    Logged in<br/>
		    <a href="logout.php">Logout</a>
		</div>

<?php 
	}
	else if($logged==0){
		// not log in
?>
		<div class="container center login">
		    <h1>EasyOutdoor</h1>
		    <a href="login.php">Login</a> | <a href="register.php">Register</a>
		</div>
		
<?php
	}
?>
