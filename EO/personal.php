<img class="icon" src="images/logo.png">
<div class="name"><a href="profile.php?user=<?php echo escape($user->data()->username);?>"><?php echo escape($user->data()->username); ?></div>


    <ul>
        <a href="update.php">Update Profile</a><br/>
        <a href="changepassword.php">Change Password</a><br/>
        <a href="logout.php">Log out</a><br/>
        <a href="member.php">member</a><br/>
    </ul>
<?php include'notification.php';?>
