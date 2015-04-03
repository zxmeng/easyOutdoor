<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect");


$sql = "CREATE TABLE Comment (
ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
content TEXT,
senderID INT UNSIGNED NOT NULL,
receiverID INT UNSIGNED,
eventID INT UNSIGNED NOT NULL,
time DATETIME NOT NULL,
FOREIGN KEY (senderID) REFERENCES user (ID),
FOREIGN KEY (receiverID) REFERENCES user (ID),
FOREIGN KEY (eventID) REFERENCES event (ID)
)";

if($conn->query($sql) == TRUE){
	echo "succeed";
}
else echo "Error: ".$conn->error;
$conn->close();
?>
