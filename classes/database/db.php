<?php
/*
* Mysql database class - only one connection alowed
*/
class Database {
	private $_connection;
	private static $_instance; //The single instance
	private $_host = "localhost";
	private $_username = "gtmsadmin";
	private $_password = "gtms";
	private $_database = "moe";
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	// Constructor
	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
	
		// Error handling
		if(mysqli_connect_error()) {
			echo "Error";
			trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),
				 E_USER_ERROR);
		} else {
			echo "Connected successfully!";
		}
	}
	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
		
	}
}

$db = Database::getInstance();
?>