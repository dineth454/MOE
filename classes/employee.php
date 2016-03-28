<?php 
require("database/db.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();
	
	class Employee{
		
		
		function loadRoles(){
			global $mysqli;
			//echo 'load roles athule';
			
			$sqlQuery = "select * from role_type";
			$roleTypeResult = $mysqli->query($sqlQuery);
			
			///$resultRoleArray = mysqli_fetch_assoc($roleTypeResult);
			
			return $roleTypeResult;
		}
		
		function loadInstitutes(){
			global $mysqli;
			$sqlQuery = "select * from intitute_type";
			$instituteTypeResult = $mysqli->query($sqlQuery);
			
			///$resultRoleArray = mysqli_fetch_assoc($roleTypeResult);
			
			return $instituteTypeResult;
			
		}
		
		function loadDesignation(){
			global $mysqli;
			$sqlQuery = "select * from designation";
			$designationTypeResult = $mysqli->query($sqlQuery);
			
			///$resultRoleArray = mysqli_fetch_assoc($roleTypeResult);
			
			return $designationTypeResult;
			
		}
	}

?>