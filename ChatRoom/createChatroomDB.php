<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect");


$sql = "CREATE TABLE Chatroom (
roomID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
ownerID INT UNSIGNED NOT NULL,
FOREIGN KEY (ownerID) REFERENCES User (ID),
time DATETIME NOT NULL
)";

if($conn->query($sql) == TRUE){
	echo "succeed";
}
else echo "Error: ".$conn->error;
$conn->close();
?>
