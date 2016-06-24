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

	function selectsubjectname($sub){
		global $mysqli;
		$query = "SELECT COUNT(*) AS res FROM subject WHERE subject = '".$sub."'";
		$result = $mysqli->query($query);

		$fetch_result = mysqli_fetch_array($result);
		$res = $fetch_result['res'];

		return $res;

	}

	function selectsubjectcode($sub){
		global $mysqli;
		$query = "SELECT COUNT(*) AS res FROM subject WHERE subjectCode = '".$sub."'";
		$result = $mysqli->query($query);

		$fetch_result = mysqli_fetch_array($result);
		$res = $fetch_result['res'];

		return $res;

	}


	function subjectnameselect($id,$sub){
		global $mysqli;
		$query = "SELECT COUNT(*) AS res FROM subject WHERE subject = '".$sub."' AND NOT subjectID = '".$id ."'";
		$result = $mysqli->query($query);

		$fetch_result = mysqli_fetch_array($result);
		$res = $fetch_result['res'];

		return $res;

	}

	function subjectcodeselect($id,$sub){
		global $mysqli;
		$query = "SELECT COUNT(*) AS res FROM subject WHERE subjectCode = '".$sub."' AND NOT subjectID = '".$id ."'";
		$result = $mysqli->query($query);

		$fetch_result = mysqli_fetch_array($result);
		$res = $fetch_result['res'];

		return $res;

	}

	function insertsubject($id, $sub){
		global $mysqli;
		$query ="INSERT INTO subject(`subjectCode`, `subject`) VALUES ('$id','$sub')";
		$result = $mysqli->query($query);

	}

	function searchsubcode($sub){
		global $mysqli;
		$query = "SELECT COUNT(*) AS res FROM subject WHERE subjectcode = '".$sub."'";
		$result = $mysqli->query($query);
		$fetch_result = mysqli_fetch_array($result);
		$res = $fetch_result['res'];

		return $res;
	}

	function getsubjectname($code){
		global $mysqli;
		$query = "SELECT * FROM subject WHERE subjectcode = '".$code."'";
		$result = $mysqli->query($query);
		$fetch_result = mysqli_fetch_array($result);
		$res = $fetch_result['subject'];
		return $res;
	}

	function getsubjectid($code){
		global $mysqli;
		$query = "SELECT * FROM subject WHERE subjectcode = '".$code."'";
		$result = $mysqli->query($query);
		$fetch_result = mysqli_fetch_array($result);
		$res = $fetch_result['subjectID'];
		return $res;
	}

	function updatesubject($id,$code,$name){
		global $mysqli;
		$query = "UPDATE `subject` SET `subjectCode`='".$code."',`subject`='".$name."' WHERE `subjectID`= '".$id."'  ";
		$result = $mysqli->query($query);

		return $result;
	}



}
