<?php 
require("dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();



	
	class Employee{
		
		// loadRoles for addEmployee.php file
		function loadRoles(){
			global $mysqli;
			
			//echo 'load roles athule';
			
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
		
		function addEmployee($nic,$roleType,$designation,$nameInitials,$fName,$empID,$email,$dob,$currentAddress,$gender,$marrigeState,$mobileNum,$provinceID,$zoneID,$schoolId,$subjectID){
			global $mysqli;
			// add ministry officer into the system --------------------------------------------------------------------------------
			if($designation == '1'){
				$instituteType = 1;
				
				$query_for_get_institute_id = "select instituteID from institute where instituteTypeID = '".$instituteType."'";
				$resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
				$instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
				$instituteID = $instituteIDArray["instituteID"];
				
				
				if($instituteID != 0){
					
					$query_for_insert_data_into_employee = "insert into employee (nic,instituteID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
					
					$result1  = $mysqli->query($query_for_insert_data_into_employee);
					
					if($result1 == 1) {
						
						$query_for_insert_ministryOffeicer_tabel = "insert into ministry_officer (nic) values('$nic')";
					
						$result2 = $mysqli->query($query_for_insert_ministryOffeicer_tabel);
						
						
						if($result2 == 1){
							$query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$nic',$roleType)";
							$result = $mysqli->query($query_for_insert_user_table);
							
							echo '<script language="javascript">';
							echo 'alert("Employee successfully registered as a MinistryOfficer!!!  Thank You.")';
							echo '</script>';
						
							
						}
						
					}
					
				}
				
					
				
				// add province officer into the system ----------------------------------------------------------------------
			}else if($designation == '2'){
				
				
				
				$query_for_get_institute_id = "select instituteID from province_office where provinceID = '".$provinceID."'";
				$resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
				$instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
				$instituteID = $instituteIDArray["instituteID"];
				
				if($instituteID != 0){
					
					$query_for_insert_data_into_employee = "insert into employee (nic,instituteID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
					$result1  = $mysqli->query($query_for_insert_data_into_employee);
					if($result1 == 1) {
						
						$query_for_insert_proviceOffeicer_tabel = "insert into province_officer (nic) values('$nic')";
					
						$result2 = $mysqli->query($query_for_insert_proviceOffeicer_tabel);
						
						if($result2 == 1){
							$query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$nic',$roleType)";
							$result = $mysqli->query($query_for_insert_user_table);
							
							echo '<script language="javascript">';
							echo 'alert("Employee successfully registered as a ProvinceOfficer!!!  Thank You.")';
							echo '</script>';
						}
					}
				}
				// add Zonal officer into the system -----------------------------------------------------------------------
			}else if($designation == '3'){
				
				
				$query_for_get_institute_id = "select instituteID from zonal_office where zonalID = '".$zoneID."'";
				$resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
				$instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
				$instituteID = $instituteIDArray["instituteID"];
				
				//echo $instituteID;
				
				if($instituteID != 0){
					$query_for_insert_data_into_employee = "insert into employee (nic,instituteID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
					$result1  = $mysqli->query($query_for_insert_data_into_employee);
					if($result1 == 1) {
						
						$query_for_insert_zonalOfficer_tabel = "insert into zonal_officer (nic,provinceOfficeID) values('$nic',$provinceID)";
					
						$result2 = $mysqli->query($query_for_insert_zonalOfficer_tabel);
						
						if($result2 == 1){
							$query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$nic',$roleType)";
							$result = $mysqli->query($query_for_insert_user_table);
							
							echo '<script language="javascript">';
							echo 'alert("Employee successfully registered as a ZonalOfficer!!!  Thank You.")';
							echo '</script>';
						}
						
					}
				}
				//add principal into the system ---------------------------------------------------------------------
				
			}else if($designation == '4'){
				
				
				
				$query_for_get_institute_id = "select instituteID from school where schoolID = '".$schoolId."'";
				$resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
				$instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
				$instituteID = $instituteIDArray["instituteID"];
				
				
				
				if($instituteID != 0){
					$query_for_insert_data_into_employee = "insert into employee (nic,instituteID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
					$result1  = $mysqli->query($query_for_insert_data_into_employee);
					if($result1 == 1) {
						$query_for_insert_principal_tabel = "insert into principal (nic,zonalOfficeID,provinceOfficerID) values('$nic',$zoneID,$provinceID)";
					
						$result2 = $mysqli->query($query_for_insert_principal_tabel);
						
						if($result2 == 1){
							$query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$nic',$roleType)";
							$result = $mysqli->query($query_for_insert_user_table);
							
							echo '<script language="javascript">';
							echo 'alert("Employee successfully registered as a principal!!!  Thank You.")';
							echo '</script>';
						}
					}
				}
				// add teacher into the system -----------------------------------------------------------------------
			}else {
				
				$query_for_get_institute_id = "select instituteID from school where schoolID = '".$schoolId."'";
				$resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
				$instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
				$instituteID = $instituteIDArray["instituteID"];
				
				
				if($instituteID != 0){
					$query_for_insert_data_into_employee = "insert into employee (nic,instituteID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
					$result1  = $mysqli->query($query_for_insert_data_into_employee);
					
					if($result1 == 1) {
						
						$query_for_insert_teacher_tabel = "insert into teacher (nic,zonalOfficeID,provinceOfficeID,appoinmentSubject) values('$nic',$zoneID,$provinceID,$subjectID)";
						
						$result2 = $mysqli->query($query_for_insert_teacher_tabel);
						
						
						if($result2 == 1){
							
							$query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$nic',$roleType)";
							
							$result = $mysqli->query($query_for_insert_user_table);
							
							echo '<script language="javascript">';
							echo 'alert("Employee successfully registered as a teacher!!!  Thank You.")';
							echo '</script>';
						}
					}
					
				}
				
				
			}
			
			
		}
		
		
	}

?>