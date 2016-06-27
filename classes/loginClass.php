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


        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $roleTypeID = $row["roleTypeID"];
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

            if ($roleTypeID == 1 || $roleTypeID == 2 || $roleTypeID == 3 || $roleTypeID == 4) {
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
                
                
                header("Location: Ministry_Officer/ministryOfficerHome.php"); /* Redirect browser */
                exit();
            } else if ($roleTypeID == 5) {
                session_start();
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
                header("Location: teacher/teacher_home.php");
                exit();
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