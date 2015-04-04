<?php
//config.php
//echo "<p>Loading config...</p>";

// Define configuration
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PSW", "");
define("DB_NAME", "eo");

define("SITE_TITLE", "WLCOME TO EASYOUTDOOR");

//Paths
define('BASE_URL', 'http://'.$_SERVER['SERVER_NAME'].':3306/easyOutdoor/');

//echo "<p>success</p>";

?>


<?php
	// require_once('config.php');

	class DataBase {
		public $db;

		public function __construct(){
			$this->db = new mysqli(DB_HOST, DB_USER, DB_PSW, DB_NAME) or die("unable to connect");
			// echo "<p>Connencted to database.</p>";
		}

		public function close(){
			$this->db->close();
		}

		public function query($sql){
			$result = $this->db->query($sql);
			return $result;
		}

		public function getUserName($id) {
			$sql = "SELECT first
					FROM user
					WHERE ID = $id";
			$res = $this->db->query($sql);
			$nameArray = mysqli_fetch_array($res);;
			return $nameArray['first'];
		}
	}
?>