<?php

require("dbcon.php");

class Login {

    function sysLog($nic, $password) {

        $con = new DBCon();
        $conn = $con->connection();

        //check nic and password
        $query = "SELECT * FROM user WHERE nic = '" . $nic . "' AND password ='" . $password . "' LIMIT 1 ";
        $result = mysqli_query($conn, $query);

        //check password
        $query2 = "SELECT nic FROM user WHERE nic = '" . $nic . "' LIMIT 1";
        $result2 = mysqli_query($conn, $query2);

        //get details from employee table
        $query3 = "SELECT * FROM employee WHERE nic = '" . $nic . "' LIMIT 1";
        $result3 = mysqli_query($conn, $query3);


        $roleTypeID = "";
        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $roleTypeID = $row["roleTypeID"];
                echo "aaaaa";
            }

            if (mysqli_num_rows($result3) == 1) {
                while ($row = mysqli_fetch_assoc($result3)) {
                    $instituteID = $row["instituteID"];
                    $designationTypeID = $row["designationTypeID"];
                    $fullName = $row["fullName"];
                    $nameWithInitials = $row["nameWithInitials"];
                    $employementID = $row["employeementID"];
                    $email = $row["email"];
                    $currentAddress = $row["currentAddress"];
                    $gender = $row["gender"];
                    $marregeState = $row["marrigeState"];
                    $mobile = $row["mobileNum"];
                    
                }
            }

            session_start();
            $_SESSION["login_time"] = time();
            $_SESSION["nic"] = $nic;
            $_SESSION["roleTypeID"] = $roleTypeID;
            $_SESSION["instituteID"] = $instituteID;
            $_SESSION["designationTypeID"] = $designationTypeID;
            $_SESSION["fullName"] = $fullName;
            $_SESSION["nameWithInitials"] = $nameWithInitials;
            $_SESSION["employementID"] = $employementID;
            $_SESSION["email"] = $email;
            $_SESSION["currentAdderss"] = $currentAddress;
            $_SESSION["gender"] = $gender;
            $_SESSION["marrageState"] = $marregeState;
            $_SESSION["mobile"] = $mobile;

            if ($roleTypeID == 1) {
                header("Location: Admin/adminHome.php"); /* Redirect browser */

            } else if ($roleTypeID == 2) {
                header("Location: Ministry_Officer/ministryOfficerHome.php");
                //exit();

            } else if ($roleTypeID == 3) {
                header("Location: PZInstitute_User/PZInstituteUserHome.php");
                //exit();
            }else if ($roleTypeID == 4) {
                header("Location: Extended_principle_user/Extended_principle_home.php");
                //exit();
            }else if ($roleTypeID == 5) {
                header("Location: Extended_principle_user/Extended_principle_home.php");
                //exit();
            } else if ($roleTypeID == 6) {
                header("Location: teacher/teacher_home.php");
                //exit();
            }else{

            }

        } else {
            //if there is nic, password must not there. so it is a incorrect password
            if (mysqli_num_rows($result2) == 1) {
                //echo '<script type="text/javascript">alert("Check ur password again!");</script>';

                echo '<div id="dialog-message" title="Error!!">
                    <p>
                    <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 50px 0;"></span>
                    Check your password again..
                    </p>
                    </div>';



            } else {
                echo '<div id="dialog-message" title="Error!!">
                    <p>
                    <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 50px 0;"></span>
                    Invalid Username or Password..
                    </p>
                    </div>';
            }
        }
    }

}

?>