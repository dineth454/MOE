<?php

require("dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();

class Institute {
    
    function addschool($provinceId, $zonalId, $school,$SchoolType,$NoOfStudents,$lat,$lang){
		global $mysqli;

		$query = "insert into institute (instituteTypeID) values(3)";
		$result1 = $mysqli->query($query);

		echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';

		//alert("Hello! I am an alert box!!");
		//$query_for_insert_values = "insert into school values('$teacherID',$currentSubject,$grade)";
    	//$result1 = $mysqli->query($query_for_insert_values);

	}
    
}

?>
