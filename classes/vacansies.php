<?php 

require("dbcon.php");
$db = new DBCon();
$con = $db->connection();

class Vacancy {

	

	function getProvinceIDFromNIC($nic)

	{
		global $con;
		$query_for_get_province_ID = "SELECT provinceOfficerID FROM principal WHERE nic = '".$nic."'";

		$result1 = mysqli_query($con, $query_for_get_province_ID);

		$row =mysqli_fetch_assoc($result1);

        $resultProvinceID = $row["provinceOfficerID"];
        return $resultProvinceID;
	}

	function getZonalIDFromNIC($nic){

		global $con;

		$query_for_get_Zonal_ID = "SELECT zonalOfficeID FROM principal WHERE nic = '".$nic."'";

		$result2 = mysqli_query($con, $query_for_get_Zonal_ID);

		$row =mysqli_fetch_assoc($result2);

        $resultZonalID = $row["zonalOfficeID"];

        return $resultZonalID;
	}

	function addVacancy($provinceId, $zonalId, $subject, $grade, $num_of_teachers, $id, $sender) {
        global $con;

        $query_for_add_vacancy = "insert into  Vacancies (Subject_ID,Grade,Num_of_teachers,ProvinceID,ZonalID) values ($subject,$grade,$num_of_teachers,$provinceId,$zonalId)";

        $result = mysqli_query($con, $query_for_add_vacancy);
        //echo "helooo";
        $sqlQuery_vac = "SELECT * FROM Vacancies";
        $Result_vac = mysqli_query($con, $sqlQuery_vac);
        while ($row = mysqli_fetch_assoc($Result_vac)) {
                    $vacid = $row["Vacancy_ID"];
        }



        $query1 = "INSERT INTO `notification`(`notID`,`type`, `action`, `description`, `sender`) VALUES ('$id','Vacancy','tomoe','$vacid','$sender')";
        $result1 = mysqli_query($con, $query1);

        $query2 = "INSERT INTO `notification_all`(`notID`,`type`, `description`, `sender`, `date`) VALUES ('$id','Vacancy','$vacid','$sender', NOW())";
        $result2 = mysqli_query($con, $query2);

    }

     function loadSubjects() {
        global $mysqli;
        $query = "select * from subject";
        $result = $mysqli->query($query);
        return $result;
    }


   /* function loadsubject(){
    	global $con;

    	$sql="select subjectID,subject from subject";
		$result = mysqli_query($con,$sql);

		//echo '<option value="">Select Subject</option>';
		// $row = mysqli_fetch_array($result);

		return $result;
    									//print_r($row);
    	
	
													//echo "\r\n";
		}*/
    
}


?>