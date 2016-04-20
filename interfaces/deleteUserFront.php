<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Delete User Front</title>


        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">


        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">
        <link href="../assets/css/fonts_styles.css" rel="stylesheet">


    </head>

    <body>

        <div id="wrapper" > 

            <!-- Sidebar -->
            <?php include 'sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->

            <!-- include Navigation BAr -->
            <?php include 'navigationBar.php' ?>


            <?php
            $roletypeID = $_SESSION["roleTypeID"];
            $designationIdLoggedUser = $_SESSION["designationTypeID"];
            $LoggedUsernic = $_SESSION["nic"];

            require("../classes/employee.php");
            $employee = new Employee();
            // submit button action
            if (isset($_POST['submit'])) {
                global $LoggedUsernic;
                $searchUsernic = "";

                $searchUsernic = $_POST['nic'];


                $result = $employee->findEmployee($searchUsernic, $roletypeID, $designationIdLoggedUser, $LoggedUsernic);
                $result1 = $employee->findProvinceOfficerDetails($searchUsernic);
                $result2 = $employee->getZonalOfficerDetails($searchUsernic);
                $result3 = $employee->getPrincipalTeacherBasicDetails($searchUsernic);
                $result4 = $employee->getTeacherSubjectDetails($searchUsernic);


                if (sizeof($result) == 0) {
                    echo '<script language="javascript">';
                    echo 'alert("Not Found This Nic,Try again!!!  Thank You.")';
                    echo '</script>';
                    // echo $result1['provinceID'];
                    // echo 'kalingaMAuau';
                } else {

                    //search karana user ministry Officer keneknam 
                    if ($result['designationTypeID'] == 1) {


                        $_SESSION['delete']['designationType'] = $result['designationTypeID'];

                        $_SESSION['delete']['nicNumber'] = $result['nic'];
                        $_SESSION['delete']['Address'] = $result['currentAddress'];
                        $_SESSION['delete']['roleType'] = $result['roleType'];
                        $_SESSION['delete']['nameWithInitials'] = $result['nameWithInitials'];
                        $_SESSION['delete']['fullName'] = $result['fullName'];
                        $_SESSION['delete']['employementID'] = $result['employeementID'];
                        $_SESSION['delete']['emailAddress'] = $result['email'];
                        $_SESSION['delete']['gender'] = $result['gender'];
                        $_SESSION['delete']['marrigeState'] = $result['marrigeState'];
                        $_SESSION['delete']['mobileNumber'] = $result['mobileNum'];

                        header("Location: deleteEmployeeForm.php");
                        // search karana user province Officer kenek nam
                    } else if ($result['designationTypeID'] == 2) {

                        $_SESSION['delete']['designationType'] = $result['designationTypeID'];

                        $_SESSION['delete']['nicNumber'] = $result['nic'];
                        $_SESSION['delete']['Address'] = $result['currentAddress'];
                        $_SESSION['delete']['roleType'] = $result['roleType'];
                        $_SESSION['delete']['nameWithInitials'] = $result['nameWithInitials'];
                        $_SESSION['delete']['fullName'] = $result['fullName'];
                        $_SESSION['delete']['employementID'] = $result['employeementID'];
                        $_SESSION['delete']['emailAddress'] = $result['email'];
                        $_SESSION['delete']['gender'] = $result['gender'];
                        $_SESSION['delete']['marrigeState'] = $result['marrigeState'];
                        $_SESSION['delete']['mobileNumber'] = $result['mobileNum'];

                        ///////////////////////////////////////////////////////////////////////////////////////

                        $_SESSION['delete']['proviceIDSearchUser'] = $result1['provinceID'];

                        header("Location: deleteEmployeeForm.php");

                        //search karana kena zonal officer kenek nam
                    } else if ($result['designationTypeID'] == 3) {
                        $_SESSION['delete']['designationType'] = $result['designationTypeID'];

                        $_SESSION['delete']['nicNumber'] = $result['nic'];
                        $_SESSION['delete']['Address'] = $result['currentAddress'];
                        $_SESSION['delete']['roleType'] = $result['roleType'];
                        $_SESSION['delete']['nameWithInitials'] = $result['nameWithInitials'];
                        $_SESSION['delete']['fullName'] = $result['fullName'];
                        $_SESSION['delete']['employementID'] = $result['employeementID'];
                        $_SESSION['delete']['emailAddress'] = $result['email'];
                        $_SESSION['delete']['gender'] = $result['gender'];
                        $_SESSION['delete']['marrigeState'] = $result['marrigeState'];
                        $_SESSION['delete']['mobileNumber'] = $result['mobileNum'];

                        ///////////////////////////////////////////////////////////////////////////////////////
                        // provinceOfficeId eka 
                        $_SESSION['delete']['proviceIDSearchUser'] = $result2['provinceOfficeID'];
                        // zonal officeID
                        $_SESSION['delete']['zonalIdSearchUser'] = $result2['zonalID'];


                        //redirect to this page
                        header("Location: deleteEmployeeForm.php");

                        // search karana kenak principal kenek nam
                    } else if ($result['designationTypeID'] == 4) {
                        $_SESSION['delete']['designationType'] = $result['designationTypeID'];

                        $_SESSION['delete']['nicNumber'] = $result['nic'];
                        $_SESSION['delete']['Address'] = $result['currentAddress'];
                        $_SESSION['delete']['roleType'] = $result['roleType'];
                        $_SESSION['delete']['nameWithInitials'] = $result['nameWithInitials'];
                        $_SESSION['delete']['fullName'] = $result['fullName'];
                        $_SESSION['delete']['employementID'] = $result['employeementID'];
                        $_SESSION['delete']['emailAddress'] = $result['email'];
                        $_SESSION['delete']['gender'] = $result['gender'];
                        $_SESSION['delete']['marrigeState'] = $result['marrigeState'];
                        $_SESSION['delete']['mobileNumber'] = $result['mobileNum'];

                        ///////////////////////////////////////////////////////////////////////////////////////
                        // provinceOfficeId eka 
                        $_SESSION['delete']['proviceIDSearchUser'] = $result3['provinceOfficeID'];
                        // zonal officeID
                        $_SESSION['delete']['zonalIdSearchUser'] = $result3['zonalOfficeID'];

                        //schoolId
                        $_SESSION['delete']['schoolIdSearchUser'] = $result3['schoolID'];
                        //redirect to this page
                        header("Location: deleteEmployeeForm.php");

                        //search karana kena teacher kenek nam
                    } else {

                        $_SESSION['delete']['designationType'] = $result['designationTypeID'];

                        $_SESSION['delete']['nicNumber'] = $result['nic'];
                        $_SESSION['delete']['Address'] = $result['currentAddress'];
                        $_SESSION['delete']['roleType'] = $result['roleType'];
                        $_SESSION['delete']['nameWithInitials'] = $result['nameWithInitials'];
                        $_SESSION['delete']['fullName'] = $result['fullName'];
                        $_SESSION['delete']['employementID'] = $result['employeementID'];
                        $_SESSION['delete']['emailAddress'] = $result['email'];
                        $_SESSION['delete']['gender'] = $result['gender'];
                        $_SESSION['delete']['marrigeState'] = $result['marrigeState'];
                        $_SESSION['delete']['mobileNumber'] = $result['mobileNum'];

                        ///////////////////////////////////////////////////////////////////////////////////////
                        // provinceOfficeId eka 
                        $_SESSION['delete']['proviceIDSearchUser'] = $result3['provinceOfficeID'];
                        // zonal officeID
                        $_SESSION['delete']['zonalIdSearchUser'] = $result3['zonalOfficeID'];

                        //schoolId
                        $_SESSION['delete']['schoolIdSearchUser'] = $result3['schoolID'];
                        //subjectId
                        $_SESSION['delete']['subjectIdSearchUser'] = $result4['appoinmentSubject'];
                        //redirect to this page
                        header("Location: deleteEmployeeForm.php");
                    }
                }

                //echo $result['marrigeState']; 
                // echo $roletype;
            }
            ?>


            <!-- Finished NAvigation bar -->
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid">
                    <div class="col-lg-9  col-lg-offset-1">
                        <div align="center" style="padding-bottom:10px;">
                            <h1>Delete Employee</h1>
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" >

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- NIC number-->
                                            <label  for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3" style="display: inline-block; text-align: left;">Enter NIC Number </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" required class="form-control" id="nic" name="nic" placeholder="Enter NIC number"/>
                                                <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Find</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>



                        </form>

                    </div>



                </div>
            </div>
            <!-- /#page-content-wrapper -->



            <?php include 'footer.php' ?>

            <script src="../assets/js/jquery.js"></script>


            <script src="../assets/js/bootstrap.min.js"></script>
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>



        </div>
    </body>

</html>
