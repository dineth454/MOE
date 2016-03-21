<?php
require("classes/database/db.php");
$db = Database::getInstance();
$mysqli = $db->getConnection();

 
///// insert data into the database user table
function InsertData($firstName1,$lastName1,$nic1,$mobile1,$email1,$password,$comment1){
	global $mysqli;
	
	
	if($mysqli){
		$sqlquery = "INSERT INTO user (firstName, lastName, nic,mobileNum, email,password, comment ) VALUES ('{$firstName1}','{$lastName1}' ,'{$nic1}' , '{$mobile1}','{$email1}' ,'{$password}','{$comment1}')";
		$result = $mysqli->query($sqlquery);
		return $result;
	}else{
		echo "connection is not Stable";
		
	}
}

///////login data

function login_data($email,$password){
	global $mysqli;
	$userOK =0;
	$sqlquery = "SELECT * FROM user WHERE email = '$email' AND password ='$password'";


	$donorIDResult = $mysqli->query($sqlquery);	
     $resultArray = mysqli_fetch_assoc($donorIDResult);
	 echo $resultArray['email'];
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



	/*if($result = mysqli_query($mysqli,$sqlquery)){
		while($row = mysqli_fetch_row(result)){

		printf("%s (%s)\n",$row[0],$row[1]);

		print_r($result);
		//echo "kalinga";

		header('home.php');
	}

	mysqli_free_result($result);

	}*/
	//$result = $mysqli->query($sqlquery);
	



	
	
	//return $result;


?>
