<?php
require("dbcon.php");
	
	class Login {
		
		function sysLog($nic,$password){

			$con = new DBCon();
			$conn = $con->connection();
			
			//check nic and password
			$query = "SELECT * FROM user WHERE nic = '".$nic."' AND password ='".$password."' LIMIT 1 ";
			$result = mysqli_query($conn, $query);

			//check password
			$query2 = "SELECT nic FROM user WHERE nic = '".$nic."' LIMIT 1";
			$result2 = mysqli_query($conn, $query2);

			//get details from employee table
			$query3 = "SELECT * FROM employee WHERE nic = '".$nic."' LIMIT 1";
			$result3 = mysqli_query($conn, $query3);


			if(mysqli_num_rows($result)==1) {
				while($row = mysqli_fetch_assoc($result)){
					$roleTypeID = $row["roleTypeID"];
					
				}

				if(mysqli_num_rows($result3)==1) {
				while($row = mysqli_fetch_assoc($result3)){
					$instituteID = $row["instituteID"];
					$designationTypeID = $row["designationTypeID"];
					$fullName = $row["fullName"];
					
					}
				}
        		
        		if($roleTypeID==1){
        			session_start();
        			$_SESSION["login_time"]= time();
					$_SESSION["roleTypeID"]= $roleTypeID;
					$_SESSION["instituteID"]= $instituteID;
					$_SESSION["designationTypeID"]= $designationTypeID;
					$_SESSION["fullName"]= $fullName;
        			header("Location: interface_0.1.php"); /* Redirect browser */
					exit();
        		}
        		else if($roleTypeID==2){
        			session_start();
					$_SESSION["roleTypeID"]= $roleTypeID;
					$_SESSION["instituteID"]= $instituteID;
					$_SESSION["designationTypeID"]= $designationTypeID;
					$_SESSION["fullName"]= $fullName;
        			header("Location: teacher.php"); /* Redirect browser */
					exit();
        		}

			}else{
				//if there is nic, password must not there. so it is a incorrect password
				if(mysqli_num_rows($result2)==1){
					//echo "Check ur password again!";
					echo '<script type="text/javascript">alert("Check ur password again!");</script>';
					//echo '<script type="text/javascript">
					//	document.getElementById("passwordError").innerHTML = "password eka waradiy bn..";
					//</script>';
				}
				else{
					echo "Invalid Username or password!!";
				}
				
			}

    	}
	}

?>