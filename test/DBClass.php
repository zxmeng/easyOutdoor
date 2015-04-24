<?php
require_once('config.php');

class DataBase{
	public $db;

	public function __construct(){
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PSW, DB_NAME) or die("unable to connect");
        // connect to database
	}

	public function close(){
		$this->db->close();
		// close the connection
	}

	public function query($sql){
		$result = $this->db->query($sql) or die("Unable to update your information");
		// execute the query to database
		return $result;
	}

	public function getInsertedID(){
		// get the id of last inserted record
		$id = $this->db->insert_id;
		return $id;
	}

}