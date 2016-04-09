<?php
require("dbcon.php");
	
	class Login {
		
		function sysLog($nic,$password){

			$con = new DBCon();
			$conn = $con->connection();
			
			//check username and password
			$query = "SELECT * FROM user WHERE nic = '".$nic."' AND password ='".$password."' LIMIT 1 ";
			$result = mysqli_query($conn, $query);

			$query2 = "SELECT nic FROM user WHERE nic = '".$nic."' LIMIT 1";
			$result2 = mysqli_query($conn, $query2);


			if(mysqli_num_rows($result)==1) {
				while($row = mysqli_fetch_assoc($result)){
					$roleType = $row["roleTypeID"];
					
				}
        		
        		if($roleType==1){
        			header("Location: admin.php"); /* Redirect browser */
					exit();
        		}
        		else if($roleType==2){
        			header("Location: teacher.php"); /* Redirect browser */
					exit();
        		}

			}else{
				if(mysqli_num_rows($result2)==1){
					echo "Check ur password again!";
				}
				else{
					echo "Invalid Username or password!!";
				}
				
			}

    	}
	}

?>