<?php 
require("dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();



	
	class Employee{
		
		// loadRoles for addEmployee.php file
		function loadRoles(){
			global $mysqli;
			
			echo 'load roles athule';
			
			$sqlQuery = "select * from role_type";
			$roleTypeResult = $mysqli->query($sqlQuery);
			$resultRoleArray = mysqli_fetch_all($roleTypeResult);
					print_r($resultRoleArray);
					foreach($resultRoleArray as $array){
					print_r( $array['roleType']);
					echo '</br>';
				//echo 'kalinga';
			}
			//return $roleTypeResult;
			return $resultRoleArray;
		}
		// loadinstitute for addEmployee.php file
		function loadInstitutes(){
			global $mysqli;
			$sqlQuery = "select * from intitute_type";
			$instituteTypeResult = $mysqli->query($sqlQuery);
			
			///$resultRoleArray = mysqli_fetch_assoc($roleTypeResult);
			
			return $instituteTypeResult;
			
		}
		
		//Load Designation for add employee.php file
		
		function loadDesignation(){
			global $mysqli;
			$sqlQuery = "select * from designation";
			$designationTypeResult = $mysqli->query($sqlQuery);
			
			///$resultRoleArray = mysqli_fetch_assoc($roleTypeResult);
			
			return $designationTypeResult;
			
		}
		
		
		//load zonal offices for according to provinceID
		/*function loadZonalOffices(){
			$q = intval($_GET['q']);
			global $mysqli;
			$sqlQuery = "select instituteID,zonalName from zonal_office where provinceOfficeID = '".$q."'";
			
			$zonalOfficeResult = $mysqli->query($sqlQuery);
			
			echo "load function eka athule";
			$result = mysqli_fetch_all($zonalOfficeResult);
			return $result;
			
		}*/
		
		
	}

?>