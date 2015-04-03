<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect");

$sql = "CREATE TABLE User (
ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(30) NOT NULL,
phone INT NOT NULL UNIQUE,
photo BLOB,
first VARCHAR(30) NOT NULL,
last VARCHAR(30) NOT NULL,
description TEXT,
joinTime DATETIME NOT NULL,
lastLoginTime DATETIME NOT NULL,
status BOOLEAN DEFAULT FALSE
)";

if($conn->query($sql) == TRUE){
	echo "succeed";
}
else echo "Error: ".$conn->error;
$conn->close();
?>
