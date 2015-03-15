<?php

class post {
	protected $ID = 6;
	protected $title;
	protected $destination;
	protected $district;
	protected $eventDate;
	protected $description;
	protected $lastEditTime;
	protected $likedNum;
	protected $parNum;

	public function getID() {
		return $this->ID;
	}
	
	public function getLikedNumber() {
		return $this->$likedNum;
	}
	
	public function getPariticipantNumber() {
		return $this->$parNum;
	}
	
	public function getTitle() {
		return $this->$title;
	}
	
	public function likeByUser($userID, $conn) {
		$sql = "INSERT INTO likeinfo(userID, eventID, likeTime) 
		VALUES ('$userID', '$this->ID', now())";
		if($conn->query($sql) == TRUE){
			echo "succeed\n";
		}
		else echo "Error".$conn->error;
	}
}

class event extends post {
	private $limitation;
	private $status;
	
	public function initEvent($ID, $title, $destination, $district, $eventDate, $description, $lastEditTime, $likedNum, $parNum, $limitation, $status) {
		$this->ID = $ID;
		$this->title = $title;
		$this->destination = $destination;
		$this->district = $district;
		$this->eventDate = $eventDate;
		$this->description = $description;
		$this->lastEditTime = $lastEditTime;
		$this->likedNum = $likedNum;
		$this->parNum = $parNum;
		$this->limitation = $limitation;
		$this->status = $status;
	}
	
	public function createEvent($title, $ownerID, $district, $eventDate, $limitation, $conn) {
		// $this->title = $title;
		// $this->destination = $destination;
		// $this->district = $district;
		// $this->eventDate = $eventDate;
		// $this->description = $description;
		// $this->lastEditTime = $lastEditTime;
		// $this->likedNum = 0;
		// $this->parNum = 0;
		// $this->limitation = $limitation;
		// $this->status = true;
	
		$sql = "INSERT INTO event(ownerID, title, district, eventDate, limitation, status) 
		VALUES ('$ownerID', '$title', '$district', '$eventDate', '$limitation', 1)";
		if($conn->query($sql) == TRUE){
			echo "succeed\n";
		}
		else echo "Error".$conn->error;
		
	}
	
	public function editEvent($title, $destination, $district, $eventDate, $description, $lastEditTime, $limitation, $conn) {
		$this->title = $title;
		$this->destination = $destination;
		$this->district = $district;
		$this->eventDate = $eventDate;
		$this->description = $description;
		$this->lastEditTime = $lastEditTime;
		$this->limitation = $limitation;
	
		$sql = "UPDATE event
		SET title = '$title', destination = '$destination', district = '$district', eventDate = '$eventDate', description = '$description', lastEditTime = '$lastEditTime', limitation = '$limitation'
		WHERE ID = '$this->ID'";
		if($conn->query($sql) == TRUE){
			echo "succeed\n";
		}
		else echo "Error".$conn->error;
		
	}
	
	public function participate($userID, $conn) {
		$sql = "INSERT INTO participation(userID, eventID, parTime) 
		VALUES ('$userID', '$this->ID', now())";
		if($conn->query($sql) == TRUE){
			echo "succeed\n";
		}
		else echo "Error".$conn->error;
	}
	
	public function display() {
		
	}
}

class review extends post {
	private $photo;
	
	public function initReview($ID, $title, $destination, $district, $eventDate, $description, $lastEditTime, $likedNum, $parNum, $photo) {
		$this->ID = $ID;
		$this->title = $title;
		$this->destination = $destination;
		$this->district = $district;
		$this->eventDate = $eventDate;
		$this->description = $description;
		$this->lastEditTime = $lastEditTime;
		$this->likedNum = $likedNum;
		$this->parNum = $parNum;
		$this->photo = $photo;
	}
	
	public function createReview($title, $destination, $district, $eventDate, $description, $lastEditTime, $parNum, $photo, $conn) {
		$this->title = $title;
		$this->destination = $destination;
		$this->district = $district;
		$this->eventDate = $eventDate;
		$this->description = $description;
		$this->lastEditTime = $lastEditTime;
		$this->likedNum = 0;
		$this->parNum = $parNum;
		$this->photo = $photo;
	
		$sql = "INSERT INTO review(title, destination, district, eventDate, description, lastEditTime, parNum, photo) 
		VALUES ('$title', '$destination', '$district', '$eventDate', '$description', '$lastEditTime', '$parNum', '$photo')";
		if($conn->query($sql) == TRUE){
			echo "succeed\n";
		}
		else echo "Error".$conn->error;
		
	}
	
	public function editReview($title, $destination, $district, $eventDate, $description, $lastEditTime, $parNum, $photo, $conn) {
		$this->title = $title;
		$this->destination = $destination;
		$this->district = $district;
		$this->eventDate = $eventDate;
		$this->description = $description;
		$this->lastEditTime = $lastEditTime;
		$this->parNum = $parNum;
		$this->photo = $photo;
	
		$sql = "UPDATE review
		SET title = '$title', destination = '$destination', district = '$district', eventDate = '$eventDate', description = '$description', lastEditTime = '$lastEditTime', parNum = '$parNum', photo = '$photo'
		WHERE ID = '$this->ID'";
		if($conn->query($sql) == TRUE){
			echo "succeed\n";
		}
		else echo "Error".$conn->error;
		
	}
	
	public function display() {
		
	}
}