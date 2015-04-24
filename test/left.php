<?php 

	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	require_once('UserClass.php');

	if($logged==1){
		//logged in
		
		$ur = new User();
		$info = $ur->getInfo($_SESSION['id']);
		$nickname = $info['nickname'];
		$icon = $info['uPhoto'];

?>
		<div class="loginicon">
			<img src="<?php echo $icon; ?>" onclick="loadPersonalHomepage(<?php echo $_SESSION['id'].','.$_SESSION['id']; ?>)"><br>
		</div>
		<h2 onclick="loadPersonalHomepage(<?php echo $_SESSION['id'].','.$_SESSION['id']; ?>)"> <font color='#58ACFA'><?php echo $nickname; ?></font></h2>
		</div><br>

		<button type="button" class="btn btn-default btn-circle btn-lg" id="friend" onclick="clickFriend(<?php echo $_SESSION['id']; ?>)" style="margin:0 3px 5px 3px;"><i class="glyphicon glyphicon-user"></i></button>
		<button type="button" class="btn btn-default btn-circle btn-lg" id="editFrofile" onclick="clickEditProfile(<?php echo $_SESSION['id']; ?>)"style="margin:0 3px 5px 3px;"><i class="glyphicon glyphicon-pencil"></i></button>
		
		<br><br><br>
		<div id="notiBox"><?php include_once('notification.php'); ?></div>
		<br><br>
		<a href="logout.php"><span class="glyphicon glyphicon-remove-circle" style="font-size: 40px"></span></a>
		<br><br>
<?php 
	}
	else if($logged==0){
		// not logged in
?>
		<div>
		    <div>
				<img style="height:250px;width:250px;"src="images/logo-sqw.png"><br>
				<h3><font color="#e5e4e2">Welcome to EasyOutddor</font></h3>
			</div>
			
		    <a href="login.php">Login</a> | <a href="register.php">Register</a><BR>
			
		</div>
<?php
	}
?>
