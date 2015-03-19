<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect");

$sql = "CREATE TABLE participation (
ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userID INT UNSIGNED NOT NULL,
eventID INT UNSIGNED NOT NULL,
parTime DATETIME NOT NULL,
FOREIGN KEY (userID) REFERENCES user (ID),
FOREIGN KEY (eventID) REFERENCES event (ID)
)";

if($conn->query($sql) == TRUE){
	echo "succeed\n";
}
else echo "Error: ".$conn->error;
$conn->close();
?>