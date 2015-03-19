<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "blog_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect");

// $sql = "CREATE TABLE Event (
// 			ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// 			ownerID INT UNSIGNED NOT NULL,
// 			title VARCHAR(30) NOT NULL,
// 			district VARCHAR(30) NOT NULL,
// 			eventDate DATETIME NOT NULL,
// 			lastEditTime DATETIME NOT NULL,
// 			limitation INT,
// 			status INT(1)
// 		)";

// if($conn->query($sql) == TRUE){
// 	echo "succeed";
// }
// else echo "Error".$conn->error;

$sql = "CREATE TABLE user (
			ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			profilePhoto VARCHAR(50),
			username VARCHAR(50)
		)";

if($conn->query($sql) == TRUE){
	echo "succeed";
}
else echo "Error".$conn->error;

$conn->close();
?>
