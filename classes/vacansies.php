<?php

require("dbcon.php");
$db = new DBCon();
$con = $db->connection();

class Vacancy {
    
     function getSchoolIDOfLoggedUser($loggedUsernic) {
        global $mysqli;
        // select Institute Id of logged User
        $query_for_get_instituteId = "select instituteID from employee where nic = '" . $loggedUsernic . "'";
        $result_InstituteID = $mysqli->query($query_for_get_instituteId);
        $result_InstituteIdArray = mysqli_fetch_array($result_InstituteID);
        $InstituteIDLoggedUser = $result_InstituteIdArray['instituteID'];

        //get School Id Of Logged User
        $query_for_get_schoolID_of_logged_user = "select schoolID from school where instituteID =' " . $InstituteIDLoggedUser . " ' ";
        $result_School = $mysqli->query($query_for_get_schoolID_of_logged_user);
        $result_school_arry = mysqli_fetch_array($result_School);
        // $zonalId_LoggedUser = $result_zonal_arry ['zonalID'];
        //return $result_school_arry;
        
        $schoolId = $result_school_arry['schoolID'];
        return $schoolId;
    }

    function getProvinceIDFromNIC($nic) {
        global $con;
        $query_for_get_province_ID = "SELECT provinceOfficerID FROM principal WHERE nic = '" . $nic . "'";

        $result1 = mysqli_query($con, $query_for_get_province_ID);

        $row = mysqli_fetch_assoc($result1);

        $resultProvinceID = $row["provinceOfficerID"];
        return $resultProvinceID;
    }

    function getZonalIDFromNIC($nic) {

        global $con;

        $query_for_get_Zonal_ID = "SELECT zonalOfficeID FROM principal WHERE nic = '" . $nic . "'";

        $result2 = mysqli_query($con, $query_for_get_Zonal_ID);

        $row = mysqli_fetch_assoc($result2);

        $resultZonalID = $row["zonalOfficeID"];

        return $resultZonalID;
    }

    function addVacancy($provinceId, $zonalId,$schoolId, $subject, $grade, $num_of_teachers, $id, $sender) {
        global $mysqli;
        $insertOk = 1;
        $vacid = "";

        $query_for_add_vacancy = "insert into  vacancies (Subject_ID,Grade,Num_of_teachers,ProvinceID,ZonalID,schoolId) values ($subject,$grade,$num_of_teachers,$provinceId,$zonalId,$schoolId)";

        $result = $mysqli->query($query_for_add_vacancy);

        if ($result != 1) {

            $insertOk = 0;
        }
        

        $sqlQuery_vac = "SELECT * FROM vacancies";


        $Result_vac = $mysqli->query($sqlQuery_vac);

        while ($row = mysqli_fetch_assoc($Result_vac)) {
            $vacid = $row["Vacancy_ID"];
        }





        $query1 = "INSERT INTO notification(notID,type, action, description, sender) VALUES ('$id','Vacancy','tomoe','$vacid','$sender')";
        $result1 = $mysqli->query($query1);

        $query2 = "INSERT INTO notification_all(notID,type, description, sender, date) VALUES ('$id','Vacancy','$vacid','$sender', NOW())";
        $result2 = $mysqli->query($query2);
        
        if ($result1 != 1 AND $result2 != 1) {
            $insertOk = 0;
        }
        
        return $insertOk;
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
      } */
}

?>