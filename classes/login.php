<?php
require("database/db.php");
$db = Database::getInstance();

$mysqli = $db->getConnection();
	
	class Login{
		
		function login_data($nic,$password){
			global $mysqli;
			$userOK =0;
			$sqlquery = "SELECT * FROM user WHERE nic = '$nic' AND password ='$password'";


			$loginQueryResult = $mysqli->query($sqlquery);	
			$resultArray = mysqli_fetch_assoc($loginQueryResult);
			echo $resultArray['nic'];
			  if(sizeof($resultArray)!= 0){
				$userOK =1;

		}
			return $userOK;

}

		function updatePassword($email,$password){
			global $mysqli;
			$userUpdateOk = 0;
			$sqlquery = "update user set password = '$password' where email = '$email' ";
			$boolUpdate = $mysqli->query($sqlquery);
			if($boolUpdate){
				$userUpdateOk = 1;
			}	
			return $userUpdateOk;
}
		
		
		
		
	}
	

?>