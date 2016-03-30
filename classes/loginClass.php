<?php
require("dbcon.php");
	
	class Login {
		
		function sysLog($nic,$password){

			$con = new DBCon();
			$conn = $con->connection();
			
			//check username and password
			$query = "SELECT * FROM user WHERE nic = '".$nic."' AND password ='".$password."' LIMIT 1 ";
			$result = mysqli_query($conn, $query);


			if(mysqli_num_rows($result)==1) {
				while($row = mysqli_fetch_assoc($result)){
					$roleType = $row["roleTypeID"];
					
				}
        		
        		if($roleType==1){
        			header("Location: classes/admin.php"); /* Redirect browser */
					exit();
        		}
        		else if($roleType==2){
        			header("Location: classes/teacher.php"); /* Redirect browser */
					exit();
        		}

			}else{
				echo "Invalid Username or password!!";
			}

    	}
	}

?>