<?php 
require("dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();

class Subject{
	 function getsubid(){
	 	global $mysqli;
	 	$query = "SELECT COUNT(*) AS no FROM subject";
	 	$result = $mysqli->query($query);
	 	$fetch_result = mysqli_fetch_array($result);
		$count = $fetch_result['no'] +1;
		
	 	return $count;

	 }

	 function selectsubject($sub){
	 	global $mysqli;
	 	$query = "SELECT COUNT(*) AS res FROM subject WHERE subject = '".$sub."'";
	 	$result = $mysqli->query($query);

	 	$fetch_result = mysqli_fetch_array($result);
	 	$res = $fetch_result['res'];

	 	return $res;

	 }

	 function insertsubject($id, $sub){
	 	global $mysqli;
	 	$query ="INSERT INTO subject(`subjectID`, `subject`) VALUES ('$id','$sub')";
	 	$result = $mysqli->query($query);

	 }


}
