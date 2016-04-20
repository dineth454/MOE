<?php 
require("dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();

class Institute{
	function addschool($provinceId, $zonalId, $school,$SchoolType,$NoOfStudents,$lat,$lang){
			global $mysqli;

			

			$query_for_insert_institute_type = "INSERT into institute(instituteTypeID) values (4)";
			$result111 = $mysqli->query($query_for_insert_institute_type);

			$query_for_get_enterded_instituteID = "SELECT LAST(instituteID) FROM institute;";
			$institute_ID = $mysqli->query($query_for_get_enterded_instituteID);



			
        	//$result1 = $mysqli->query($query_for_insert_values);
			$query_for_insert_values = "INSERT into school(schoolName,instituteID,provinceOfficeID,zonalOfficeID,SchoolTypeID,numOfStudents,lat,lng) values('$school','$institute_ID','$provinceId','$zonalId','$SchoolType','$NoOfStudents','$lat','$lang')";
        	$insert_school_data = $mysqli->query($query_for_insert_values);

        	echo "rrrrrrr";



		}

}


?>