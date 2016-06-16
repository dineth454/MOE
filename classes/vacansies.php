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

	function addVacancy($provinceId, $zonalId, $subject, $grade, $num_of_teachers) {
        global $con;

        $query_for_add_vacancy = "insert into  Vacancies (Subject_ID,Grade1,Num_of_teachers,ProvinceID,ZonalID) values ($subject,$grade,$num_of_teachers,$provinceId,$zonalId)";

        $result = mysqli_query($con, $query_for_add_vacancy);
        echo "helooo";

    }
}


?>