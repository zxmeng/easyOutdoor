<?php 

	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	if($logged==1){
		//logged in
?>
		<div class="container center login">
		    <h1>EasyOutdoor</h1>
		    Logged in<br/>
		    <a href="logout.php">Logout</a>
		</div>

		<div class="button" type="button" id="friend" onclick="clickFriend(<?php echo $_SESSION['id']; ?>)">Friend</div><br>

		<div class="button" type="button" id="editFrofile" onclick="clickEditProfile(<?php echo $_SESSION['id']; ?>)">Edit</div><br>

		<div class="button" type="button" id="back" onclick="loadNotification(<?php echo $_SESSION['id']; ?>)">Notification</div><br>

		<div id="notiBox"></div>

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
