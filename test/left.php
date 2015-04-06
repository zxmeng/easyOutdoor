<?php 

	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	require_once('UserClass.php');
	$ur = new User();
	$nickname = $ur->getUserName($_SESSION['id']);

	if($logged==1){
		//logged in
?>
		<div class="container center login">
		    <div "commentheader"><img class="icon" src="images/logo-sq.png"><br></div>
		    <font color='#58ACFA'><?php echo $nickname; ?>:</font> Logged in
		</div>

		<p>
		<div class="button" type="button" id="friend" onclick="clickFriend(<?php echo $_SESSION['id']; ?>)">Friend List</div><br>
		</p><p>
		<div class="button" type="button" id="editFrofile" onclick="clickEditProfile(<?php echo $_SESSION['id']; ?>)">Edit Profile</div><br>
		</p><p>
		<div class="button" type="button" id="notification" onclick="loadNotification(<?php echo $_SESSION['id']; ?>)">Notification</div><br>
		</p><p>

		<div id="notiBox"></div>
		</p>

		<div class="container center login">
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
