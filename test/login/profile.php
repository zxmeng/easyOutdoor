<?php include_once("scripts/global.php");
 if($logged == 0){
	 echo("You need to be logged into view peoples profiles.");
	 exit();
 }
 if(isset($_GET['id'])){
	 $id=$_GET['id'];
	 $id=preg_replace("#[^0-9]#","",$id);
 }else{
 	$id=$_SESSION['id'];
 }

//collect member information
$query=mysql_query("SELECT * FROM Member WHERE id='$id' LIMIT 1") or die("Could not collect user information");
$count_mem=mysql_num_rows($query);
if($count_mem==0){
	echo("The user does not exist!");
	exit();
}
while($row=mysql_fetch_array($query)){
	$username=$row['username'];
	$firstname=$row['firstname'];
	$lastname=$row['lastname'];
	$profile_id=$row['id'];
	
	if($session_id == $profile_id){
		$owner=true;
	}else{
		$owner=false;
	}
}
?>
<!doctype html>
<html>
<head>
<link href="css/login-law.css" rel="stylesheet" type="text/css"/>
<meta charset="UTF-8">
<title><?php print("$firstname");?><?php print("$lastname");?>'s Profile</title>
</head>

<body>
<div class="container center login">
    <h1><?php print("$username");?>Profile</h1>
    <?php
	if($owner==true){
		?>
        <a href="#">edit profile</a><br/>
        <a href="#">account settings</a>
        <?php
		}else{
		?>
        <a href="#">private message</a><br/>
        <a href="#">add as friend</a>
        <?php
        }
		?>
    <br/>we are using: <?php print("$id");?>
</div>
</body>
</html>