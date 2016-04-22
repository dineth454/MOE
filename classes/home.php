<?php 
require("dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();

	class Home{
		function schools(){
			global $mysqli;
			
			$query = "SELECT count(*) AS schools FROM school";
			$result = $mysqli->query($query);
			$fetch_result = mysqli_fetch_array($result);
			$no_schools = $fetch_result['schools'];

			return $no_schools;
		}

		function teachers(){
			global $mysqli;
			
			$query = "SELECT count(*) AS teachers FROM teacher";
			$result = $mysqli->query($query);
			$fetch_result = mysqli_fetch_array($result);
			$no_teachers = $fetch_result['teachers'];

			return $no_teachers;
		}

		function users(){
			global $mysqli;
			
			$query = "SELECT count(*) AS users FROM user";
			$result = $mysqli->query($query);
			$fetch_result = mysqli_fetch_array($result);
			$no_users = $fetch_result['users'];

			return $no_users;
		}
	}



?>