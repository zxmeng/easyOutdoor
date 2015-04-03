<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect");


$sql = "CREATE TABLE friend (
		userA INT UNSIGNED NOT NULL,
		userB INT UNSIGNED NOT NULL,
		FOREIGN KEY (userA) REFERENCES user (ID),
		FOREIGN KEY (userB) REFERENCES user (ID))";

if($conn->query($sql) == TRUE){
	echo "succeed";
}
else echo "Error: ".$conn->error;
$conn->close();
?>