<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect");

$sql = "CREATE TABLE Event (
ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
destination VARCHAR(30) NOT NULL,
district VARCHAR(50) NOT NULL,
eventDate DATETIME NOT NULL,
description TEXT,
lastEditTime DATETIME NOT NULL,
likedNum INT,
parNum INT,
limitation INT,
status INT(1)
)";

if($conn->query($sql) == TRUE){
	echo "succeed";
}
else echo "Error".$conn->error;
$conn->close();
?>