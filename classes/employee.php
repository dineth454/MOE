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
		
		function addEmployee($nic,$roleType,$designation,$nameInitials,$fName,$empID,$email,$dob,$currentAddress,$gender,$marrigeState,$mobileNum,$provinceID,$zoneID,$schoolId,$subject){
			global $mysqli;
			
			echo $nic .'</br>';
			echo $roleType.'</br>';
			echo $designation.'</br>';
			
			if($designation == '1'){
				$instituteType = 1;
				echo 'kalinga</br>';
				
				//$query_for_insert_user_table = 'insert into user (nic,password,roleTypeID) values ($nic,$nic,$roleType)';
				//$result = $mysqli->query($query_for_insert_user_table);
				$query_for_get_institute_id = "select instituteID from institute where instituteTypeID = '".$instituteType."'";
				$resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
				$instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
				$instituteID = $instituteIDArray["instituteID"];
				echo $instituteID;
				
				if($instituteID != 0){
					
					echo 'kalinga yapa </br>';
					$query_for_insert_data_into_employee = "insert into employee (nic,instituteID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
					echo 'after query </br>';
					$result1  = $mysqli->query($query_for_insert_data_into_employee);
					
					echo 'afetr inserted </br>';
					if($result1 == 1) {
						
						$query_for_insert_ministryOffeicer_tabel = "insert into ministry_officer (nic) values('$nic')";
					
						$result2 = $mysqli->query($query_for_insert_ministryOffeicer_tabel);
						
						echo 'insert into ministry officer tabel' ;
						
						if($result2 == 1){
							$query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$nic',$roleType)";
							$result = $mysqli->query($query_for_insert_user_table);
							
							echo 'successfully inssertd';
							
						}
						
					}
					
				}
				
					
				
				
			}
			
			
		}
		
		
	}

?>