<?php
require_once('config.php');

class DataBase{
	public $db;

	public function __construct(){
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PSW, DB_NAME) or die("unable to connect");
        //echo "<p>Connencted to database.</p>";
	}

	public function close(){
		$this->db->close();
	}

	public function query($sql){
		$result = $this->db->query($sql) or die("Unable to update your information");
		//$resultArray = $result->fetch_all(MYSQLI_ASSOC);
		return $result;
	}

	public function getInsertedID(){
		$id = $this->db->insert_id;
		echo $id;
		return $id;
	}

}