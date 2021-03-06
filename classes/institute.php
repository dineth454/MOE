<?php

require("dbcon.php");
$db = new DBCon();
$con = $db->connection();

class Institute {

    function addschool($provinceId, $zonalId, $school, $SchoolType, $NoOfStudents, $lat, $lang) {
        global $con;
        $insertOK = 1;


        $query_for_insert_institute_type = "INSERT into institute(instituteTypeID) values (4)";

        $result1 = mysqli_query($con, $query_for_insert_institute_type);

        //echo $result1;


        $query_for_get_enterded_instituteID = "SELECT instituteID FROM institute ORDER BY instituteID DESC LIMIT 1;";
        $result = mysqli_query($con, $query_for_get_enterded_instituteID);

        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $institute_ID = $row["instituteID"];
            }
        }



        $query_for_insert_values = "INSERT into school (schoolName,instituteID,provinceOfficeID,zonalOfficeID,SchoolTypeID,numOfStudents,lat,lng) 
                                                values('$school','$institute_ID','$provinceId','$zonalId','$SchoolType','$NoOfStudents','$lat','$lang')";


        $insert_school_data = mysqli_query($con, $query_for_insert_values);
        if ($insert_school_data != 1) {
            $insertOK = 0;
            //echo $insert_school_data;
        }
        
        return $insertOK;
    }

    function addZonalOffice($provinceID, $zonlName) {
        global $con;
        $insertOK = 1;
        //Zonal office or not
        $instituteType = 3;

        // insert into institute tabel

        $Query = "insert into institute(instituteTypeID) values('$instituteType')";
        $result = $con->query($Query);
        if ($result != 1) {
            $insertOK = 0;
        } else {
            $query2 = "select max(instituteID) from institute";
            $result2 = $con->query($query2);
            $resultArray = mysqli_fetch_array($result2);
            $instituteID = $resultArray['max(instituteID)'];


            if ($result2->num_rows > 0) {

                $query3 = "insert into  zonal_office(zonalName,instituteID,provinceOfficeID) values('$zonlName','$instituteID',$provinceID)";
                $result3 = $con->query($query3);

                if ($result3 != 1) {
                    $insertOK = 0;
                }
            }
        }

        return $insertOK;
    }
    
    function findSchool($schoolID){
        global $con;
        $query = "select * from school where schoolID = '".$schoolID."'";
        $resultFindSchool = $con->query($query);
        $resultSchoolArray = mysqli_fetch_array($resultFindSchool);
        return $resultSchoolArray;
        
    }

    function addSubject($subject) {
        global $con;
        $insertOK = 1;

        $Query = "insert into subject(subject) values('$subject')";
        $result = $con->query($Query);
        if ($result != 1) {
            $insertOK = 0;
        }

        return $insertOK;
    }
    
    function updateInstitute($schoolID,$updatedSchoolName,$updatedNoOFStudents,$updatesLatitude,$updatedLangitude){
        global $con;
        $updatedOK = 1;
        
        $query = "update school set schoolName = '".$updatedSchoolName."',numOfStudents = '".$updatedNoOFStudents."',lat = '".$updatesLatitude."',lng = '".$updatedLangitude."' where schoolID = '".$schoolID."' ";
        $resultBoolean = $con->query($query);
        if($resultBoolean != 1 ){
            
            $updatedOK = 0;
            
        }
        
        return $updatedOK;
    }
    
    function getInstituteIDLoggedUser($loggedUserNIC) {
        global $con;
        // select Institute Id of logged User
        $query_for_get_instituteId = "select instituteID from employee where nic = '" . $loggedUserNIC . "'";
        $result_InstituteID = $con->query($query_for_get_instituteId);
        $result_InstituteIdArray = mysqli_fetch_array($result_InstituteID);
        $InstituteIDLoggedUser = $result_InstituteIdArray['instituteID'];
        return $InstituteIDLoggedUser;
    }


//================== wena karanna deyak nathuwata employee class eken import karapu functions =================//
     function getProvinceIdOfLoggedUser($LoggedUsernic) {
        global $con;
        // select Institute Id of logged User
        $query_for_get_instituteId = "select instituteID from employee where nic = '" . $LoggedUsernic . "'";
        $result_InstituteID = $con->query($query_for_get_instituteId);
        $result_InstituteIdArray = mysqli_fetch_array($result_InstituteID);
        $InstituteIDLoggedUser = $result_InstituteIdArray['instituteID'];


        // province Id of logged User

        $query_for_find_provinceID = "select provinceID from province_office where instituteID = '" . $InstituteIDLoggedUser . "'";
        $result_loggedUserProvinceID = $con->query($query_for_find_provinceID);
        $result_loggedUserProvinceIdArray = mysqli_fetch_array($result_loggedUserProvinceID);
        // $provinceID_LoggedUser = $result_loggedUserProvinceIdArray['provinceID'];

        return $result_loggedUserProvinceIdArray;
    }

    function getZonalIDLoggedUser($loggedUsernic) {

        global $con;
        // select Institute Id of logged User
        $query_for_get_instituteId = "select instituteID from employee where nic = '" . $loggedUsernic . "'";
        $result_InstituteID = $con->query($query_for_get_instituteId);
        $result_InstituteIdArray = mysqli_fetch_array($result_InstituteID);
        $InstituteIDLoggedUser = $result_InstituteIdArray['instituteID'];

        //get zonal Office Id Of Logged User
        $query_for_get_zonal_id_of_logged_user = "select zonalID from zonal_office where instituteID =' " . $InstituteIDLoggedUser . " ' ";
        $result_zonalOffice = $con->query($query_for_get_zonal_id_of_logged_user);
        $result_zonal_arry = mysqli_fetch_array($result_zonalOffice);
        // $zonalId_LoggedUser = $result_zonal_arry ['zonalID'];
        return $result_zonal_arry;
    }

    //==========================================================================================================//

    function getSchoolIDLoggedUser($loggedUsernic) {

        global $con;
        // select Institute Id of logged User
        $query_for_get_instituteId = "select instituteID from employee where nic = '" . $loggedUsernic . "'";
        $result_InstituteID = $con->query($query_for_get_instituteId);
        $result_InstituteIdArray = mysqli_fetch_array($result_InstituteID);
        $InstituteIDLoggedUser = $result_InstituteIdArray['instituteID'];

        //get zonal Office Id Of Logged User
        $query_for_get_zonal_id_of_logged_user = "select schoolID from school where instituteID =' " . $InstituteIDLoggedUser . " ' ";
        $result_zonalOffice = $con->query($query_for_get_zonal_id_of_logged_user);
        $result_zonal_arry = mysqli_fetch_array($result_zonalOffice);
        // $zonalId_LoggedUser = $result_zonal_arry ['zonalID'];
        return $result_zonal_arry;
    }

}

?>
