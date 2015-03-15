<?php
include 'post.php';

	$servername = "localhost";
	$username = "root";
	$password = '';
	$dbname = "test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect");

		
	$newpost = new event();
	$sql = "SELECT * FROM event WHERE ID = 6";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$newpost->initEvent($row["ID"], $row["title"], $row["destination"], $row["district"], $row["eventDate"], $row["description"], $row["lastEditTime"], $row["likedNum"], $row["parNum"], $row["limitation"], $row["status"]);
		}
	} 	
	else {
		echo "0 results";
	}
	$newpost->likeByUser(1,$conn);
	// $title = "go out";s
	// $destination = "sha tin"; 
	// $district = "hk"; 
	// $eventDate = "2015-06-17 08:00:00"; 
	// $description = "hahahahahaha";
	// date_default_timezone_set("PRC");
	// $postTime = date("Y-m-d H:i:s"); 
	// $limitation = 20; 
	// $newpost->createEvent($title, $destination, $district, $eventDate, $description, $postTime,$limitation, $conn);
	// $newpost->editEvent("lahayo", $destination, $district, $eventDate, $description, $postTime,$limitation, $conn);
	echo "<p>hello world</p>";
	$conn->close();
?>