<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect");


$sql = "CREATE TABLE Message (
MID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
content TEXT NOT NULL,
userID INT UNSIGNED NOT NULL,
FOREIGN KEY (userID) REFERENCES User (ID),
roomID INT UNSIGNED NOT NULL,
FOREIGN KEY (roomID) REFERENCES Chatroom (roomID),
time DATETIME NOT NULL
)";

if($conn->query($sql) == TRUE){
	echo "succeed";
}
else echo "Error: ".$conn->error;
$conn->close();
?>
