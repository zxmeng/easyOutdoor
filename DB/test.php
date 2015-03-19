<?php
include 'post.php';

	$servername = "localhost";
	$username = "root";
	$password = '';
	$dbname = "blog_test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname) or die("unable to connect");

	// $id = 6;
	// echo $id;
	//$newpost = new event();
	// $sql = "SELECT * FROM event WHERE ID = $id";
	// echo $sql;
	// $result = $conn->query($sql);
	// if ($result->num_rows > 0) {
	// 	// output data of each row
	// 	while($row = $result->fetch_assoc()) {
	// 		echo $row["ID"].$row["title"].$row["destination"];
	// 	}
	// } 	
	// else {
	// 	echo "0 results";
	// }
	//$newpost->likeByUser(1,$conn);
	// $title = "go out";
	// $ownerID = 133; 
	// $district = "hk"; 
	// $eventDate = "2015-06-17 08:00:00"; 
	// date_default_timezone_set("PRC");
	// //$postTime = date("Y-m-d H:i:s"); 
	// $limitation = 20; 
	$sql = "INSERT INTO user
		VALUES (133, 'def.jpg', 'haha')";
		if($conn->query($sql) == TRUE){
			echo "succeed\n";
		}
		else echo "Error".$conn->error;
	//$newpost->editEvent("lahayo", $destination, $district, $eventDate, $description, $postTime,$limitation, $conn);
	echo "<p>hello world</p>";
	$conn->close();
?>