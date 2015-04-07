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

		    <div class="loginicon">
						<img src="images/cuhk-test.jpg"><br>
					</div>
		   <h2> <font color='#58ACFA'><?php echo $nickname; ?></font></h2>
		</div><br>


		<button type="button" class="btn btn-default btn-circle btn-lg" id="friend" onclick="clickFriend(<?php echo $_SESSION['id']; ?>)" style="margin:0 3px 5px 3px;"><i class="glyphicon glyphicon-user"></i></button>
			<button type="button" class="btn btn-default btn-circle btn-lg" id="editFrofile" onclick="clickEditProfile(<?php echo $_SESSION['id']; ?>)"style="margin:0 3px 5px 3px;"><i class="glyphicon glyphicon-pencil"></i></button>
			<button type="button" class="btn btn-default btn-circle btn-lg" id="notification" onclick="loadNotification(<?php echo $_SESSION['id']; ?>)"style="margin:0 3px 5px 3px;"><i class="glyphicon glyphicon-list-alt"></i></button>
			<br>
			<div id="notiBox"></div>
<!--
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
-->
		

			
			<button type="button" class="btn btn-default btn-circle btn"><a href="logout.php"><i class="glyphicon glyphicon-plus"></i></a></button>


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
