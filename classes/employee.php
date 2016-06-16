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

    function addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID) {
        global $mysqli;





        // add ministry officer into the system --------------------------------------------------------------------------------
        if ($designation == 1) {


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

                        $password = sha1($nic);
                        $query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$password',$roleType)";
                        $result = $mysqli->query($query_for_insert_user_table);

                        echo '<script language="javascript">';
                        echo 'alert("Employee successfully registered as a MinistryOfficer!!!  Thank You.")';
                        echo '</script>';
                    }
                }
            }



            // add province officer into the system ----------------------------------------------------------------------
        } else if ($designation == 2) {

            // province officer kenekwa add karanna puluwan sysadmin ta ho ministry officer kenekta witharai
            // methanin eka check karanna onii

            $query_for_get_institute_id = "select instituteID from province_office where provinceID = '" . $provinceID . "'";
            $resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
            $instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
            $instituteID = $instituteIDArray["instituteID"];

            if ($instituteID != 0) {

                $query_for_insert_data_into_employee = "insert into employee (nic,instituteID,province_OfficeID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$provinceID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
                $result1 = $mysqli->query($query_for_insert_data_into_employee);
                if ($result1 == 1) {

                    $query_for_insert_proviceOffeicer_tabel = "insert into province_officer (nic) values('$nic')";

                    $result2 = $mysqli->query($query_for_insert_proviceOffeicer_tabel);

                    if ($result2 == 1) {
                        $password = sha1($nic);
                        $query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$password',$roleType)";
                        $result = $mysqli->query($query_for_insert_user_table);

                        echo '<script language="javascript">';
                        echo 'alert("Employee successfully registered as a ProvinceOfficer!!!  Thank You.")';
                        echo '</script>';
                    }
                }
            }
            // add Zonal officer into the system -----------------------------------------------------------------------
        } else if ($designation == 3) {

            $query_for_get_institute_id = "select instituteID,provinceOfficeID from zonal_office where zonalID = '" . $zoneID . "'";
            $resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
            $instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
            $instituteID = $instituteIDArray["instituteID"];
            $provinceOfficeId = $instituteIDArray["provinceOfficeID"];

            //echo $instituteID;

            if ($instituteID != 0) {
                $query_for_insert_data_into_employee = "insert into employee (nic,instituteID,province_OfficeID,zonalOffics_ID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$provinceOfficeId,$zoneID,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
                $result1 = $mysqli->query($query_for_insert_data_into_employee);
                if ($result1 == 1) {

                    $query_for_insert_zonalOfficer_tabel = "insert into zonal_officer (nic,provinceOfficeID) values('$nic',$provinceID)";

                    $result2 = $mysqli->query($query_for_insert_zonalOfficer_tabel);

                    if ($result2 == 1) {
                        $password = sha1($nic);
                        $query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$password',$roleType)";
                        $result = $mysqli->query($query_for_insert_user_table);

                        echo '<script language="javascript">';
                        echo 'alert("Employee successfully registered as a ZonalOfficer!!!  Thank You.")';
                        echo '</script>';
                    }
                }
            }
            //add principal into the system ---------------------------------------------------------------------
        } else if ($designation == 4) {



            $query_for_get_institute_id = "select instituteID,provinceOfficeID,zonalOfficeID from school where schoolID = '" . $schoolId . "'";
            $resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
            $instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
            $instituteID = $instituteIDArray["instituteID"];
            $provinceOfficeId = $instituteIDArray["provinceOfficeID"];
            $zonalOfficeId = $instituteIDArray["zonalOfficeID"];



            if ($instituteID != 0) {
                $query_for_insert_data_into_employee = "insert into employee (nic,instituteID,province_OfficeID,zonalOffics_ID,SchoolID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$provinceOfficeId,$zonalOfficeId,$schoolId,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
                $result1 = $mysqli->query($query_for_insert_data_into_employee);
                if ($result1 == 1) {
                    $query_for_insert_principal_tabel = "insert into principal (nic,zonalOfficeID,provinceOfficerID) values('$nic',$zoneID,$provinceID)";

                    $result2 = $mysqli->query($query_for_insert_principal_tabel);

                    if ($result2 == 1) {
                        $password = sha1($nic);
                        $query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$password',$roleType)";
                        $result = $mysqli->query($query_for_insert_user_table);

                        echo '<script language="javascript">';
                        echo 'alert("Employee successfully registered as a principal!!!  Thank You.")';
                        echo '</script>';
                    }
                }
            }
        } else {

            $query_for_get_institute_id = "select instituteID,provinceOfficeID,zonalOfficeID from school where schoolID = '" . $schoolId . "'";
            $resultOfInstituteId = $mysqli->query($query_for_get_institute_id);
            $instituteIDArray = mysqli_fetch_assoc($resultOfInstituteId);
            $instituteID = $instituteIDArray["instituteID"];
            $provinceOfficeId = $instituteIDArray["provinceOfficeID"];
            $zonalOfficeId = $instituteIDArray["zonalOfficeID"];


            if ($instituteID != 0) {
                $query_for_insert_data_into_employee = "insert into employee (nic,instituteID,province_OfficeID,zonalOffics_ID,SchoolID,roleType,designationTypeID,nameWithInitials,fullName,employeementID,email,currentAddress,gender,marrigeState,mobileNum) values ('$nic',$instituteID,$provinceOfficeId,$zonalOfficeId,$schoolId,$roleType,$designation,'$nameInitials','$fName','$empID','$email','$currentAddress','$gender','$marrigeState','$mobileNum')";
                $result1 = $mysqli->query($query_for_insert_data_into_employee);

                if ($result1 == 1) {

                    $query_for_insert_teacher_tabel = "insert into teacher (nic,zonalOfficeID,provinceOfficeID,appoinmentSubject) values('$nic',$zoneID,$provinceID,$subjectID)";

                    $result2 = $mysqli->query($query_for_insert_teacher_tabel);


                    if ($result2 == 1) {
                        $password = sha1($nic);
                        $query_for_insert_user_table = "insert into user (nic,password,roleTypeID) values ('$nic','$password',$roleType)";

                        $result = $mysqli->query($query_for_insert_user_table);

                        echo '<script language="javascript">';
                        echo 'alert("Employee successfully registered as a teacher!!!  Thank You.")';
                        echo '</script>';
                        //  header("Location: framePage.php");
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

        // select Institute Id Of Search user
        $query_for_get_searchUserIId = "select instituteID from employee where nic = '" . $searchUsernic . "'";
        $result_InstituteSearchUserID = $mysqli->query($query_for_get_searchUserIId);
        $result_InstituteIdArray1 = mysqli_fetch_array($result_InstituteSearchUserID);
        $InstituteIDsearchUser = $result_InstituteIdArray1['instituteID'];
        // province Id of logged User

        $query_for_find_provinceID = "select provinceID from province_office where instituteID = '" . $InstituteIDLoggedUser . "'";
        $result_loggedUserProvinceID = $mysqli->query($query_for_find_provinceID);
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

        // get provinceOfficeIdOf teacher According to SearchUserNIC
        $query_for_get_prov_off_Id_Of_teacher = "select provinceOfficeID from teacher where nic = '" . $searchUsernic . "' ";
        $result_pro_Id_Of_Teacher = $mysqli->query($query_for_get_prov_off_Id_Of_teacher);
        $resuly_of_pro_id = mysqli_fetch_array($result_pro_Id_Of_Teacher);
        $proviceId_teacher = $resuly_of_pro_id ['provinceOfficeID'];

        //get zonal Office Id Of Logged User
        $query_for_get_zonal_id_of_logged_user = "select zonalID from zonal_office where instituteID =' " . $InstituteIDLoggedUser . " ' ";
        $result_zonalOffice = $mysqli->query($query_for_get_zonal_id_of_logged_user);
        $result_zonal_arry = mysqli_fetch_array($result_zonalOffice);
        $zonalId_LoggedUser = $result_zonal_arry ['zonalID'];

        //get zonalOfficeId Of SearchUser as a Principal
        $qry_4_get_zonl_id_of_principal = "select zonalOfficeID from principal where nic = '" . $searchUsernic . "'";
        $result_zone_offce_principal = $mysqli->query($qry_4_get_zonl_id_of_principal);
        $result_zoneIdArry = mysqli_fetch_array($result_zone_offce_principal);
        $zonalIDSearchUserPrincipal = $result_zoneIdArry ['zonalOfficeID'];

        //get zonalOfficeId OfSearch user as a teacher
        $qry_4_get_zonl_id_of_teacher = "select zonalOfficeID from teacher where nic = '" . $searchUsernic . " '";
        $result_zone_offce_teacher = $mysqli->query($qry_4_get_zonl_id_of_teacher);
        $result_zoneIdArryTeacher = mysqli_fetch_array($result_zone_offce_teacher);
        $zonalIDSearchUserteacher = $result_zoneIdArryTeacher['zonalOfficeID'];

        // echo 'roletypeID';
        //  echo $roletypeID . '</br>';
        // echo 'designationIdLoggedUser';
        // echo $designationIdLoggedUser . '</br>';
        // echo 'designationOfsearchUser';
        // echo $designationOfsearchUser . '</br>';
        //check loged User is System admin or not
        if ($searchUsernic == '921003072V') {
            echo '<script language="javascript">';
            echo 'alert("You Dont Have Permission to Do this action!!!  Thank You.")';
            echo '</script>';
        } else if ($roletypeID == 1 and $designationIdLoggedUser == 1) {
            return $result_employeeArray;
            //echo '123456';
        } else if ($designationIdLoggedUser < $designationOfsearchUser) {
            // ministry Officer
            if ($designationIdLoggedUser == 1) {
                return $result_employeeArray;
                //echo 'awdrgyjo';
                // Logged in as a Provincial Officer
            } else if ($designationIdLoggedUser == 2) {
                //zonalOfficeer
                if ($provinceID_LoggedUser == $provinceID_searchUser) {
                    return $result_employeeArray;
                    //principal
                } else if ($provinceID_LoggedUser == $provinceID_Principal) {
                    return $result_employeeArray;
                    //teacher
                } else if ($provinceID_LoggedUser == $proviceId_teacher) {

                    return $result_employeeArray;
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("You Dont Have Permission to Do this action!!!  Thank You.")';
                    echo '</script>';
                }
                // Logged In as a Zonal Officer
            } else if ($designationIdLoggedUser == 3) {
                //principal
                if ($zonalId_LoggedUser == $zonalIDSearchUserPrincipal) {
                    return $result_employeeArray;
                }
                //teacher
                else if ($zonalId_LoggedUser == $zonalIDSearchUserteacher) {
                    return $result_employeeArray;
                } else {

                    echo '<script language="javascript">';
                    echo 'alert("You Dont Have Permission to Do this action!!!  Thank You.")';
                    echo '</script>';
                }
                //logged in as a principal
            } else if ($designationIdLoggedUser == 4) {
                //teacherla witharai
                if ($InstituteIDLoggedUser == $InstituteIDsearchUser) {
                    return $result_employeeArray;
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("You Dont Have Permission to Do this action!!!  Thank You.")';
                    echo '</script>';
                }
            } else {

                echo '<script language="javascript">';
                echo 'alert("You Dont Have Permission to Do this action!!!  Thank You.")';
                echo '</script>';
            }


            //return $result_employeeArray;
        } else {
            echo '<script language="javascript">';
            echo 'alert("You Dont Have Permission to Do this action!!!  Thank You.")';
            echo '</script>';
        }

        // print_r($result_employeeArray);
    }

    //UPDATE eMPLOYEE FUNCTION
    function updateEmployeeBasic($nicNumber, $role_subitted, $nameInitialsSubmitted, $nameFullUpdated, $eIDSubmitted, $emailUpdated, $addressUpdated, $genderUpdated, $merrageUpdated, $mobileUpdated) {
        global $mysqli;
        $updateOK = 1;

        $updateEmployeeQuery = "update employee set roleType = '$role_subitted',nameWithInitials = '$nameInitialsSubmitted', fullName = '$nameFullUpdated',employeementID = '$eIDSubmitted',email = '$emailUpdated',currentAddress = '$addressUpdated' ,gender = '$genderUpdated' ,marrigeState = '$merrageUpdated',mobileNum = '$mobileUpdated' where nic = '$nicNumber' ";
        $booleanResult = $mysqli->query($updateEmployeeQuery);

        $updateUserQuery = "update user set roleTypeID = '$role_subitted' where nic = '$nicNumber'";
        $booleanResult2 = $mysqli->query($updateUserQuery);
        if ($booleanResult != true) {
            $updateOK = 0;
        }
        if ($booleanResult2 != true) {
            $updateOK = 0;
        }
        return $updateOK;
    }

//find all details according to logged User Nic
    function findFullDetailsOfLoggedUser($loggedUserNic) {
        global $mysqli;
        $query = "select * from employee where nic = '" . $loggedUserNic . "'";
        $result_Of_Logged_User = $mysqli->query($query);
        $result_LoggedUser_Array = mysqli_fetch_array($result_Of_Logged_User);
        return $result_LoggedUser_Array;
    }

// find all details according to search User Nic
    function findFullDetailsOfSearchUser($searchUserNic) {
        global $mysqli;
        $query = "select * from employee where nic = '" . $searchUserNic . "'";
        $result_of_searchUser = $mysqli->query($query);
        $resultSearchUserArray = mysqli_fetch_array($result_of_searchUser);
        return $resultSearchUserArray;
    }

    //search karana eka province officer kenek nam eyage provinceID eka ganna methode eka
    function findProvinceOfficerDetails($searchUserNic) {
        global $mysqli;

        $query_for_get_searchUserIId = "select instituteID from employee where nic = '" . $searchUserNic . "'";
        $result_InstituteSearchUserID = $mysqli->query($query_for_get_searchUserIId);
        $result_InstituteIdArray1 = mysqli_fetch_array($result_InstituteSearchUserID);
        $InstituteIDsearchUser = $result_InstituteIdArray1['instituteID'];



        $query_for_find_provinceID = "select provinceID from province_office where instituteID = '" . $InstituteIDsearchUser . "'";
        $result_searchUserProvinceID = $mysqli->query($query_for_find_provinceID);
        $result_searchUserProvinceIdArray = mysqli_fetch_array($result_searchUserProvinceID);
        // $provinceID_searchUser =  $result_searchUserProvinceIdArray['provinceID'];
       // echo 'banda';
        //echo $provinceID_searchUser;
        return $result_searchUserProvinceIdArray;
    }

    //search karana kena zonal officer kenek nam eyage provinceId ekai zonal Id ekai ganna methode eka
    function getZonalOfficerDetails($searchUserNic) {
        global $mysqli;
        $query_for_get_searchUserIId = "select instituteID from employee where nic = '" . $searchUserNic . "'";
        $result_InstituteSearchUserID = $mysqli->query($query_for_get_searchUserIId);
        $result_InstituteIdArray1 = mysqli_fetch_array($result_InstituteSearchUserID);
        $InstituteIDsearchUser = $result_InstituteIdArray1['instituteID'];

        $query = "select zonalID,provinceOfficeID,zonalName from zonal_office where instituteID = '" . $InstituteIDsearchUser . "'";
        $result_zonalOfficer = $mysqli->query($query);
        $result_array = mysqli_fetch_array($result_zonalOfficer);

        return $result_array;
    }

    // search karana kena principal kenek nam eyage province ekai zonal ekai,school ekai ganna method eka

    function getPrincipalTeacherBasicDetails($searchUserNic) {
        global $mysqli;
        $query_for_get_searchUserIId = "select instituteID from employee where nic = '" . $searchUserNic . "'";
        $result_InstituteSearchUserID = $mysqli->query($query_for_get_searchUserIId);
        $result_InstituteIdArray1 = mysqli_fetch_array($result_InstituteSearchUserID);
        $InstituteIDsearchUser = $result_InstituteIdArray1['instituteID'];

        $query = "select schoolID,instituteID,schoolName,provinceOfficeID,zonalOfficeID from school where instituteID = '" . $InstituteIDsearchUser . "'";
        $result_school = $mysqli->query($query);
        $result_array = mysqli_fetch_array($result_school);
        return $result_array;
    }

    function getTeacherSubjectDetails($searchUserNic) {
        global $mysqli;

        $query = "select appoinmentSubject from teacher where nic = '" . $searchUserNic . "'";
        $result = $mysqli->query($query);
        $resultArray = mysqli_fetch_array($result);
        return $resultArray;
    }

    function loadZonalOffices() {
        global $mysqli;
        $query = "select * from zonal_office";
        $result = $mysqli->query($query);


        return $result;
    }

    function loadSchools() {
        global $mysqli;
        $query = "select * from school";
        $result = $mysqli->query($query);
        return $result;
    }

    function loadGrades() {
        global $mysqli;
        $query = "select * from grade";
        $result = $mysqli->query($query);
        return $result;
    }

    function loadSubjects() {
        global $mysqli;
        $query = "select * from subject";
        $result = $mysqli->query($query);
        return $result;
    }

    function insertIntoSubjetcCombination($nic, $currentSubject, $grade,$schoolID) {
        global $mysqli;
        $insertok = 1;
        //echo $schoolID;
        $query_for_get_teacherId = "select teachetID from teacher where nic = '" . $nic . "'";
        $result = $mysqli->query($query_for_get_teacherId);
        $resultArray = mysqli_fetch_array($result);
        $teacherID = $resultArray['teachetID'];

        $query_for_insert_values = "insert into subject_combinat values($teacherID,$currentSubject,$grade,$schoolID)";
        $result1 = $mysqli->query($query_for_insert_values);
        if ($result1 != 1) {
            $insertok = 0;
        }

        return $insertok;
    }

    function getInstituteIDLoggedUser($loggedUserNIC) {
        global $mysqli;
        // select Institute Id of logged User
        $query_for_get_instituteId = "select instituteID from employee where nic = '" . $loggedUserNIC . "'";
        $result_InstituteID = $mysqli->query($query_for_get_instituteId);
        $result_InstituteIdArray = mysqli_fetch_array($result_InstituteID);
        $InstituteIDLoggedUser = $result_InstituteIdArray['instituteID'];
        return $InstituteIDLoggedUser;
    }

    function getProvinceIdOfLoggedUser($LoggedUsernic) {
        global $mysqli;
        // select Institute Id of logged User
        $query_for_get_instituteId = "select instituteID from employee where nic = '" . $LoggedUsernic . "'";
        $result_InstituteID = $mysqli->query($query_for_get_instituteId);
        $result_InstituteIdArray = mysqli_fetch_array($result_InstituteID);
        $InstituteIDLoggedUser = $result_InstituteIdArray['instituteID'];


        // province Id of logged User

        $query_for_find_provinceID = "select provinceID from province_office where instituteID = '" . $InstituteIDLoggedUser . "'";
        $result_loggedUserProvinceID = $mysqli->query($query_for_find_provinceID);
        $result_loggedUserProvinceIdArray = mysqli_fetch_array($result_loggedUserProvinceID);
        // $provinceID_LoggedUser = $result_loggedUserProvinceIdArray['provinceID'];

        return $result_loggedUserProvinceIdArray;
    }

    function getZonalIDLoggedUser($loggedUsernic) {

        global $mysqli;
        // select Institute Id of logged User
        $query_for_get_instituteId = "select instituteID from employee where nic = '" . $loggedUsernic . "'";
        $result_InstituteID = $mysqli->query($query_for_get_instituteId);
        $result_InstituteIdArray = mysqli_fetch_array($result_InstituteID);
        $InstituteIDLoggedUser = $result_InstituteIdArray['instituteID'];

        //get zonal Office Id Of Logged User
        $query_for_get_zonal_id_of_logged_user = "select zonalID from zonal_office where instituteID =' " . $InstituteIDLoggedUser . " ' ";
        $result_zonalOffice = $mysqli->query($query_for_get_zonal_id_of_logged_user);
        $result_zonal_arry = mysqli_fetch_array($result_zonalOffice);
        // $zonalId_LoggedUser = $result_zonal_arry ['zonalID'];
        return $result_zonal_arry;
    }

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
        return $result_school_arry;
    }

    function deleteUser($searchUserNIC) {

        global $mysqli;
        $deleteOK = 1;

        $deleteQuery = "delete from employee where nic = '" . $searchUserNIC . "'";
        $result = $mysqli->query($deleteQuery);

        if ($result != true) {
            $deleteOK = 0;
        }

        return $deleteOK;
    }

    function transerUpdateTeacher($nicNumber,$schoolId,$zoneID,$provinceID) {
        global $mysqli;
        $updateOK = 1;

        $queryForgetInstituteID = "select instituteID from school where schoolID = '" . $schoolId . "'";
        $result = $mysqli->query($queryForgetInstituteID);
        $resultArray = mysqli_fetch_array($result);
        $instituteId = $resultArray['instituteID'];

        if ($result->num_rows > 0) {

            $queryForUpdateEMployee = "update employee set instituteID = '$instituteId' ,province_OfficeID = '$provinceID',zonalOffics_ID = '$zoneID',SchoolID = '$schoolId' where nic = '" . $nicNumber . "'";
            $result2 = $mysqli->query($queryForUpdateEMployee);

            if ($result2 != true) {
                $updateOK = 0;
            }
        } else {
            $updateOK = 0;
        }

        return $updateOK;
    }

    function insertIntoWorkingHistory($nicNumber, $instituteIDOLD) {
        global $mysqli;
        $description = 'PassedWorked';


        $insertOK = 1;

        $query = "insert into working_history(nic,instituteID,description,affectedDate) values ('$nicNumber',$instituteIDOLD,'$description',NOW()) ";
        $result = $mysqli->query($query);

        if ($result != 1) {
            $insertOK = 0;
        }

        return $insertOK;
    }

    function insertVacancies($instituteId, $subjetcID, $noOfVacancies) {
        global $mysqli;
        $insertOk = 1;

        $query = "insert into Vacancies(InstituteID,SubjectId,noOfVacansies) values ('$instituteId','$subjetcID','$noOfVacancies')";
        $result = $mysqli->query($query);

        if ($result != 1) {
            $insertOk = 0;
        }

        return $insertOk;
    }

}
