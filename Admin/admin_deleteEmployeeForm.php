<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>GTMS | Members</title>



        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">

        <link href="../assets/css/fonts_styles.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">
        <!-- Alert start-->
        <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
        <script src="../alertify/lib/alertify.min.js"></script>
        <!-- Alert end-->

        <style>

        body {
        background-image: url("../images/back4.jpg");
        background-repeat: no-repeat;
        background-position: 220px 330px;
        background-attachment: fixed;
        background-size: 1150px 350px;
        }
        </style>


    </head>

    <body>
        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#020816;" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- include Navigation BAr -->
                <?php include '../interfaces/navigation_bar.php' ?>
                <!--____________________________________________________________________________-->
                <!-- Sidebar Menu Items-->
                <!-- Sidebar -->

                <?php
                include 'sideBarActivation.php';

                //sideBar Activation
                $navMembers = "background-color: #0A1A42;";
                $textMembers = "color: white;";

                $navDeleteMembers = "background-color: #091536;";
                $textDeleteMembers = "color: white;";

                $colMembers = "collapse in";

                include 'sidebar_admin.php'; ?>
                <!-- /#sidebar-wrapper -->
                <!-- /.navbar-collapse -->
            </nav>

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">

                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">

                        <?php
                        //get session attribute Values

                        require '../classes/employee.php';
                        $employee = new Employee();

                        $display = "display: none;";

                        // Initialize Variables
                        $searchUserSubjectId = 0;
                        $searchUserSchoolId = 0;
                        $searchUserZonalId = 0;
                        $searchUserProvinceId = 0;

                        $designationTypeID = $_SESSION['delete']['designationType'];
                        $address = $_SESSION['delete']['Address'];
                        $roleType = $_SESSION['delete']['roleType'];
                        $nicNumber = $_SESSION['delete']['nicNumber'];
                        $nameWithInitials = $_SESSION['delete']['nameWithInitials'];
                        $fullName = $_SESSION['delete']['fullName'];
                        $employmentID = $_SESSION['delete']['employementID'];
                        $emailAddress = $_SESSION['delete']['emailAddress'];
                        $gender = $_SESSION['delete']['gender'];
                        $marrigeState = $_SESSION['delete']['marrigeState'];
                        $mobileNumber = $_SESSION['delete']['mobileNumber'];

                        // province Officer kenek nam
                        if ($designationTypeID == 2) {
                            $searchUserProvinceId = $_SESSION['delete']['proviceIDSearchUser'];
                        }
                        // zonal officer kenek nam
                        if ($designationTypeID == 3) {
                            $searchUserProvinceId = $_SESSION['delete']['proviceIDSearchUser'];
                            $searchUserZonalId = $_SESSION['delete']['zonalIdSearchUser'];
                        }
                        // principal kenek nam
                        if ($designationTypeID == 4) {

                            $searchUserProvinceId = $_SESSION['delete']['proviceIDSearchUser'];
                            $searchUserZonalId = $_SESSION['delete']['zonalIdSearchUser'];
                            $searchUserSchoolId = $_SESSION['delete']['schoolIdSearchUser'];
                        }
                        // teacher kenek nam
                        if ($designationTypeID == 5) {
                            $searchUserProvinceId = $_SESSION['delete']['proviceIDSearchUser'];
                            $searchUserZonalId = $_SESSION['delete']['zonalIdSearchUser'];
                            $searchUserSchoolId = $_SESSION['delete']['schoolIdSearchUser'];
                            $searchUserSubjectId = $_SESSION['delete']['subjectIdSearchUser'];
                        }



                        // echo $_SESSION['designationType'];
                        if (isset($_POST['submit'])) {
                            $resultDeleted = $employee->deleteUser($nicNumber);
                            if($resultDeleted == 1){
                                
                                echo '<script language="javascript">
                                        alertify.confirm("Member is deleted successfully!", function (e) {
                                        if (e) {
                                            window.location.href="admin_deleteEmployeeFront.php";
                                        }
                                        });
                                    </script>';
                               // header("Location: updateEmployeeFront.php");
                            }else{
                                echo '<script language="javascript">';
                                echo 'alertify.alert("Error occured while deleting..")';
                                echo '</script>';
                            }
                            
                            
                        }
                        ?>

                        <!-- New Part-->
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 style="padding-bottom:40px; padding-left: 10px;">Remove Member</h1>

                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit="return(validateEmpUpdateForm())"  novalidate>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                        <div class="row">

                                            <!-- NIC number-->
                                            <div class="form-group col-lg-12" >
                                                <div class="col-lg-6"><label>NIC Number</label></div>
                                                <div class= "col-lg-6" style="display: inline-block;"><label ><?php echo $nicNumber; ?></label></div>
                                            </div>

                                            <!-- Select role-->
                                            <div class="form-group col-lg-12">
                                                <div class="col-lg-6"><label>User Role</label></div>
                                                <div class="col-lg-6">
                                                    <?php if ($roleType == 2) { ?>
                                                        <div style="display: inline-block;"><label>Ministry User</label></div>

                                                    <?php } else if ($roleType == 3) { ?>
                                                        <div style="display: inline-block;"><label>PZInstitute User</label></div>

                                                    <?php } else if ($roleType == 4) { ?>
                                                        <div style="display: inline-block;"><label>Extended Principal User</label></div>

                                                    <?php } else if ($roleType == 5) { ?>
                                                        <div style="display: inline-block;"><label>General Principal User</label></div>
                                                            
                                                    <?php } else { ?>
                                                        <div style="display: inline-block;"><label>General User</label></div>

                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <!-- Designation-->
                                            <div class="form-group col-lg-12">
                                                <div class="col-lg-6"><label for="designation" style="display: inline-block;">Designation</label></div>
                                                <div class="col-lg-6">
                                                    <?php if ($designationTypeID == 1) { ?>
                                                            <div style="display: inline-block;"><label>Ministry Officer</label></div>
                                                        <?php } else if ($designationTypeID == 2) { ?>
                                                            <div style="display: inline-block;"><label>Province Officer</label></div>
                                                        <?php } else if ($designationTypeID == 3) { ?>
                                                            <div style="display: inline-block;"><label>Zonal Officer</label></div>
                                                        <?php } else if ($designationTypeID == 4) { ?>
                                                            <div style="display: inline-block;"><label>Principal</label></div>
                                                        <?php } else { ?>
                                                            <div style="display: inline-block;"><label>Teacher</label></div>
                                                        <?php } ?>
                                                </div>
                                            </div>

                                            <!-- Province Office-->
                                            <?php if($searchUserProvinceId > 0) {
                                                    $display = "";?>
                                            <div class="form-group col-lg-12" style="<?php echo $display ?>" id="provinceIDDiv">
                                                <div class="col-lg-6"><label for="province Office">Province Office</label></div>
                                                    <div class="col-lg-6">

                                                    <?php if ($searchUserProvinceId == 1) { ?>
                                                                <div style="display: inline-block;"><label>Central Province</label></div>
                                                            <?php } else if ($searchUserProvinceId == 2) { ?>
                                                                <div style="display: inline-block;"><label>Western Province</label></div>
                                                            <?php } else if ($searchUserProvinceId == 3) { ?>
                                                                <div style="display: inline-block;"><label>Southern Province</label></div>
                                                            <?php } else if ($searchUserProvinceId == 4) { ?>
                                                                <div style="display: inline-block;"><label>Northern Province</label></div>
                                                            <?php } else if ($searchUserProvinceId == 5) { ?>
                                                                <div style="display: inline-block;"><label>Eastern Province</label></div>
                                                            <?php } else {
                                                                
                                                            }
                                                            ?>
                                                    </div>
                                            </div>
                                            <?php } ?>

                                            <!-- Zonal Office-->
                                            <?php if($searchUserZonalId > 0) {
                                                    $display = "";?>
                                            <div class="form-group col-lg-12" style="<?php echo $display ?>" id="zonalOfficeDiv">
                                                <div class="col-lg-6"><label for="Zonal Office">Zonal Office</label></div>
                                                    <div class="col-lg-6">

                                                    <?php
                                                            $result = $employee->loadZonalOffices();
                                                            foreach ($result as $array) {
                                                                if ($array['zonalID'] == $searchUserZonalId) {
                                                                    echo '<div style="display: inline-block;"><label>' . $array['zonalName'] . '</label></div>';
                                                                }
                                                            }
                                                        ?>
                                                    </div>
                                            </div>
                                            <?php } ?>

                                            <!-- School-->
                                            <?php if($searchUserSchoolId > 0) {
                                                    $display = "";?>
                                            <div class="form-group col-lg-12" style="<?php echo $display ?>" id="schoolIdDiv">
                                                <div class="col-lg-6"><label for="School">School</label></div>
                                                    <div class="col-lg-6">

                                                    <?php
                                                            $result = $employee->loadSchools();

                                                            foreach ($result as $array) {
                                                                if ($array['schoolID'] == $searchUserSchoolId) {
                                                                    echo '<div style="display: inline-block;"><label>' . $array['schoolName'] . '</label></div>';
                                                                }
                                                            }
                                                            ?>
                                                    </div>
                                            </div>
                                            <?php } ?>

                                            <!-- Appointment Subject-->
                                            <?php if($searchUserSubjectId > 0) {
                                                    $display = "";?>
                                            <div class="form-group col-lg-12" style="<?php echo $display ?>" id="subjectHiddenDiv">
                                                <div class="col-lg-6"><label for="School">Appointment Subject</label></div>
                                                    <div class="col-lg-6">

                                                    <?php
                                                        $result = $employee->loadSubjects();

                                                        foreach ($result as $array) {
                                                            if ($array['subjectID'] == $searchUserSubjectId) {
                                                            echo '<div style="display: inline-block;"><label>' . $array['subject'] . '</label></div>';
                                                        }
                                                    }
                                                    ?>
                                                    </div>
                                            </div>
                                            <?php } ?>

                                        
                                        

                                            <!-- Name With Initials-->
                                            <div class="form-group col-lg-12" >
                                                <div class="col-lg-6"><label>Name With Initials</label></div>
                                                <div class= "col-lg-6" style="display: inline-block;"><label ><?php echo $nameWithInitials; ?></label></div>
                                            </div>

                                            <!-- Full Name-->
                                            <div class="form-group col-lg-12" >
                                                <div class="col-lg-6"><label>Full Name</label></div>
                                                <div class= "col-lg-6" style="display: inline-block;"><label ><?php echo $fullName; ?></label></div>
                                            </div>

                                            <!-- Employment ID-->
                                            <div class="form-group col-lg-12" >
                                                <div class="col-lg-6"><label>Employee ID</label></div>
                                                <div class= "col-lg-6" style="display: inline-block;"><label ><?php echo $employmentID; ?></label></div>
                                            </div>

                                            <!-- Email-->
                                            <div class="form-group col-lg-12" >
                                                <div class="col-lg-6"><label>Email</label></div>
                                                <div class= "col-lg-6" style="display: inline-block;"><label ><?php echo $emailAddress; ?></label></div>
                                            </div>

                                            <!--Current Address-->
                                            <div class="form-group col-lg-12" >
                                                <div class="col-lg-6"><label>Current Address</label></div>
                                                <div class= "col-lg-6" style="display: inline-block;"><label ><?php echo $address; ?></label></div>
                                            </div>

                                            <!--Gender-->
                                            <div class="form-group col-lg-12">
                                                <div class="col-lg-6"><label for="designation" style="display: inline-block;">Gender</label></div>
                                                <div class="col-lg-6">
                                                        <?php if ($gender == 2) { ?>
                                                            <div style="display: inline-block;"><label>Male</label></div>
                                                        <?php } else { ?>
                                                            <div style="display: inline-block;"><label>Female</label></div>
                                                        <?php } ?>
                                                </div>
                                            </div>

                                            <!--Marriage-->
                                            <div class="form-group col-lg-12">
                                                <div class="col-lg-6"><label for="designation" style="display: inline-block;">Marriage Status</label></div>
                                                <div class="col-lg-6">
                                                        <?php if ($marrigeState == 2) { ?>
                                                            <div style="display: inline-block;"><label>Yes</label></div>
                                                        <?php } else { ?>
                                                            <div style="display: inline-block;"><label>No</label></div>
                                                        <?php } ?>
                                                </div>
                                            </div>

                                            <!--Mobile Number-->
                                            <div class="form-group col-lg-12" >
                                                <div class="col-lg-6"><label>Mobile Number</label></div>
                                                <div class= "col-lg-6" style="display: inline-block;"><label ><?php echo $mobileNumber; ?></label></div>
                                            </div>

                                            <div class="form-group" style="float: right">
                                                <button style="width: 80px;" type="submit" name="submit" id="submit" class="btn btn-primary">Delete</button>
                                            </div>

                                            <div class="form-group" style="float: right; padding-right: 10px;">
                                                <input class="btn btn-primary" style="width: 80px;" type="button" value="Cancel" onclick="window.location.href='adminHome.php'"/>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-5" style="position: fixed; top: 150px; left: 850px;"> 
                                <img src="../images/deletePerson.png" width="400" height="400">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- /#page-content-wrapper -->

        </div>

<?php include '../interfaces/footer.php' ?>

        <script src = "../assets/js/addEmployee.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
    </body>
</html>