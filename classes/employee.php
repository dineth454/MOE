<?php

require("dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();

class Employee {

    // loadRoles for addEmployee.php file
    function loadRoles() {
        global $mysqli;

        //echo 'load roles athule';

        $sqlQuery = "select * from role_type";
        $roleTypeResult = $mysqli->query($sqlQuery);
        $resultRoleArray = mysqli_fetch_all($roleTypeResult);
        print_r($resultRoleArray);
        foreach ($resultRoleArray as $array) {
            print_r($array['roleType']);
            echo '</br>';
            //echo 'kalinga';
        }
        //return $roleTypeResult;
        return $resultRoleArray;
    }

    // loadinstitute for addEmployee.php file
    function loadInstitutes() {
        global $mysqli;
        $sqlQuery = "select * from intitute_type";
        $instituteTypeResult = $mysqli->query($sqlQuery);

        ///$resultRoleArray = mysqli_fetch_assoc($roleTypeResult);

        return $instituteTypeResult;
    }

    //Load Designation for add employee.php file

    function loadDesignation() {
        global $mysqli;
        $sqlQuery = "select * from designation";
        $designationTypeResult = $mysqli->query($sqlQuery);

        ///$resultRoleArray = mysqli_fetch_assoc($roleTypeResult);

        return $designationTypeResult;
    }

    //load zonal offices for according to provinceID
    /* function loadZonalOffices(){
      $q = intval($_GET['q']);
      global $mysqli;
      $sqlQuery = "select instituteID,zonalName from zonal_office where provinceOfficeID = '".$q."'";

      $zonalOfficeResult = $mysqli->query($sqlQuery);

      echo "load function eka athule";
      $result = mysqli_fetch_all($zonalOfficeResult);
      return $result;

      } */

    function addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $dob, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID) {
        global $mysqli;
        // add ministry officer into the system --------------------------------------------------------------------------------
        if ($designation == '1') {
            $instituteType = 1;


            $query_for_get_institute_id = "select instituteID from institute where instituteTypeID = '" . $instituteType . "'";
            $resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
            $instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
            $instituteID = $instituteIDArray["instituteID"];


            if ($instituteID != 0) {

                $query_for_insert_data_into_employee = "insert into employee (nic,instituteID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";

                $result1 = $mysqli->query($query_for_insert_data_into_employee);

                if ($result1 == 1) {

                    $query_for_insert_ministryOffeicer_tabel = "insert into ministry_officer (nic) values('$nic')";

                    $result2 = $mysqli->query($query_for_insert_ministryOffeicer_tabel);


                    if ($result2 == 1) {
                        $query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$nic',$roleType)";
                        $result = $mysqli->query($query_for_insert_user_table);

                        echo '<script language="javascript">';
                        echo 'alert("Employee successfully registered as a MinistryOfficer!!!  Thank You.")';
                        echo '</script>';
                    }
                }
            }



            // add province officer into the system ----------------------------------------------------------------------
        } else if ($designation == '2') {



            $query_for_get_institute_id = "select instituteID from province_office where provinceID = '" . $provinceID . "'";
            $resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
            $instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
            $instituteID = $instituteIDArray["instituteID"];

            if ($instituteID != 0) {

                $query_for_insert_data_into_employee = "insert into employee (nic,instituteID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
                $result1 = $mysqli->query($query_for_insert_data_into_employee);
                if ($result1 == 1) {

                    $query_for_insert_proviceOffeicer_tabel = "insert into province_officer (nic) values('$nic')";

                    $result2 = $mysqli->query($query_for_insert_proviceOffeicer_tabel);

                    if ($result2 == 1) {
                        $query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$nic',$roleType)";
                        $result = $mysqli->query($query_for_insert_user_table);

                        echo '<script language="javascript">';
                        echo 'alert("Employee successfully registered as a ProvinceOfficer!!!  Thank You.")';
                        echo '</script>';
                    }
                }
            }
            // add Zonal officer into the system -----------------------------------------------------------------------
        } else if ($designation == '3') {


            $query_for_get_institute_id = "select instituteID from zonal_office where zonalID = '" . $zoneID . "'";
            $resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
            $instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
            $instituteID = $instituteIDArray["instituteID"];

            //echo $instituteID;

            if ($instituteID != 0) {
                $query_for_insert_data_into_employee = "insert into employee (nic,instituteID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
                $result1 = $mysqli->query($query_for_insert_data_into_employee);
                if ($result1 == 1) {

                    $query_for_insert_zonalOfficer_tabel = "insert into zonal_officer (nic,provinceOfficeID) values('$nic',$provinceID)";

                    $result2 = $mysqli->query($query_for_insert_zonalOfficer_tabel);

                    if ($result2 == 1) {
                        $query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$nic',$roleType)";
                        $result = $mysqli->query($query_for_insert_user_table);

                        echo '<script language="javascript">';
                        echo 'alert("Employee successfully registered as a ZonalOfficer!!!  Thank You.")';
                        echo '</script>';
                    }
                }
            }
            //add principal into the system ---------------------------------------------------------------------
        } else if ($designation == '4') {



            $query_for_get_institute_id = "select instituteID from school where schoolID = '" . $schoolId . "'";
            $resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
            $instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
            $instituteID = $instituteIDArray["instituteID"];



            if ($instituteID != 0) {
                $query_for_insert_data_into_employee = "insert into employee (nic,instituteID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
                $result1 = $mysqli->query($query_for_insert_data_into_employee);
                if ($result1 == 1) {
                    $query_for_insert_principal_tabel = "insert into principal (nic,zonalOfficeID,provinceOfficerID) values('$nic',$zoneID,$provinceID)";

                    $result2 = $mysqli->query($query_for_insert_principal_tabel);

                    if ($result2 == 1) {
                        $query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$nic',$roleType)";
                        $result = $mysqli->query($query_for_insert_user_table);

                        echo '<script language="javascript">';
                        echo 'alert("Employee successfully registered as a principal!!!  Thank You.")';
                        echo '</script>';
                    }
                }
            }
            // add teacher into the system -----------------------------------------------------------------------
        } else {

            $query_for_get_institute_id = "select instituteID from school where schoolID = '" . $schoolId . "'";
            $resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
            $instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
            $instituteID = $instituteIDArray["instituteID"];


            if ($instituteID != 0) {
                $query_for_insert_data_into_employee = "insert into employee (nic,instituteID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
                $result1 = $mysqli->query($query_for_insert_data_into_employee);

                if ($result1 == 1) {

                    $query_for_insert_teacher_tabel = "insert into teacher (nic,zonalOfficeID,provinceOfficeID,appoinmentSubject) values('$nic',$zoneID,$provinceID,$subjectID)";

                    $result2 = $mysqli->query($query_for_insert_teacher_tabel);


                    if ($result2 == 1) {

                        $query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$nic',$roleType)";

                        $result = $mysqli->query($query_for_insert_user_table);

                        echo '<script language="javascript">';
                        echo 'alert("Employee successfully registered as a teacher!!!  Thank You.")';
                        echo '</script>';
                        header("Location: framePage.php");
                    }
                }
            }
        }
    }

    function findEmployee($searchUsernic, $roletypeID, $designationIdLoggedUser, $LoggedUsernic) {
        global $mysqli;
        $query_for_find_employee = "select * from employee where nic = '" . $searchUsernic . "'";
        $result_employee = $mysqli->query($query_for_find_employee);
        $result_employeeArray = mysqli_fetch_array($result_employee);
        //get designation Id for Search User
        $designationOfsearchUser = $result_employeeArray['designationTypeID'];


        // select Institute Id of logged User
        $query_for_get_instituteId = "select instituteID from employee where nic = '" . $LoggedUsernic . "'";
        $result_InstituteID = $mysqli->query($query_for_get_instituteId);
        $result_InstituteIdArray = mysqli_fetch_array($result_InstituteID);
        $InstituteIDLoggedUser = $result_InstituteIdArray['instituteID'];

        // province Id of logged User
        $query_for_find_provinceID = "select provinceID from province_office where instituteID = '" . $InstituteIDLoggedUser . "'";
        $result_loggedUserProvinceID = $mysqli->query( $query_for_find_provinceID);
        $result_loggedUserProvinceIdArray = mysqli_fetch_array($result_loggedUserProvinceID);
        $provinceID_LoggedUser = $result_loggedUserProvinceIdArray['provinceID'];

        //get ProvinceOfficeId of zonalOfficer accordng to searchUserNic

        $query_for_get_provineOfficeID = "select provinceOfficeID from zonal_officer where nic = '" . $searchUsernic . "'";
        $result_provinceID = $mysqli->query($query_for_get_provineOfficeID);
        $result_ProvinceIdArray = mysqli_fetch_array($result_provinceID);
        $provinceID_searchUser = $result_ProvinceIdArray['provinceOfficeID'];
        
        // get provinceOfficeID of principal According to SearchUserNIC
          $query_for_get_provinceID_of_Principal = "select provinceOfficerID from principal where nic = '" . $searchUsernic . "' ";
          $result_provinceID_of_principal = $mysqli->query($query_for_get_provinceID_of_Principal);
          $result_Arrray = mysqli_fetch_array($result_provinceID_of_principal);
          $provinceID_Principal = $result_Arrray['provinceOfficerID'];
          
        
       // echo 'roletypeID';
      //  echo $roletypeID . '</br>';
       // echo 'designationIdLoggedUser';
       // echo $designationIdLoggedUser . '</br>';
       // echo 'designationOfsearchUser';
       // echo $designationOfsearchUser . '</br>';

        //check loged User is System admin or not
        if ($roletypeID == 1 and $designationIdLoggedUser == 1) {
            return $result_employeeArray;
        } else if ($designationIdLoggedUser < $designationOfsearchUser) {
            // ministry Officer
            if ($designationIdLoggedUser == 1) {
                return $result_employeeArray;
                echo 'awdrgyjo';
                // Provincial Officer
            } else if ($designationIdLoggedUser == 2) {
                //zonalOfficeer
                if($provinceID_LoggedUser == $provinceID_searchUser ){
                     return $result_employeeArray;
                     //principal
                }else if ($provinceID_LoggedUser == $provinceID_Principal ){
                    return $result_employeeArray;
                    
                }
                
                
                //teacher
            }


            return $result_employeeArray;
        } else {
            echo '123456789';
        }

        // print_r($result_employeeArray);
    }

}

?>