<?php 
require("dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();
	
	class School{
		
		function loadInstitutes(){
			global $mysqli;
			$sqlQuery = "select * from intitute_type";
			$instituteTypeResult = $mysqli->query($sqlQuery);
			
			///$resultRoleArray = mysqli_fetch_assoc($roleTypeResult);
			
			return $instituteTypeResult;
			
		}

		function loadProvince(){
			global $mysqli;
			$sqlQuery = "select * from province_office";
			$provinceTypeResult = $mysqli->query($sqlQuery);
			
			///$resultRoleArray = mysqli_fetch_assoc($roleTypeResult);
			
			return $provinceTypeResult;
			
		}
		
		function loadZonal(){
			global $mysqli;
			$sqlQuery = "select * from zonal_office";
			$zonalTypeResult = $mysqli->query($sqlQuery);
			
			///$resultRoleArray = mysqli_fetch_assoc($roleTypeResult);
			
			return $zonalTypeResult;
			
		}

		function loadSchool_type(){
			global $mysqli;
			$sqlQuery = "select * from school_type";
			$schoolTypeResult = $mysqli->query($sqlQuery);
			
			///$resultRoleArray = mysqli_fetch_assoc($roleTypeResult);
			
			return $schoolTypeResult;
			
		}

		function addschool($provinceId, $zonalId, $school,$SchoolType,$NoOfStudents,$lat,$lang){
			global $mysqli;

			$query_for_insert_values = "insert into school values('$teacherID',$currentSubject,$grade)";
        	$result1 = $mysqli->query($query_for_insert_values);

		}
	}

?>