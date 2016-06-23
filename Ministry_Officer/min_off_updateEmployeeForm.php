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

        <title>User | Update</title>



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
                <?php include 'sidebar_min_off.php' ?>
                <!-- /#sidebar-wrapper -->
                <!-- /.navbar-collapse -->
            </nav>

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid" style="box-shadow: 1px 1px 5px #000000">

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

                        $designationTypeID = $_SESSION['update']['designationType'];
                        $address = $_SESSION['update']['Address'];
                        $roleType = $_SESSION['update']['roleType'];
                        $nicNumber = $_SESSION['update']['nicNumber'];
                        $nameWithInitials = $_SESSION['update']['nameWithInitials'];
                        $fullName = $_SESSION['update']['fullName'];
                        $employmentID = $_SESSION['update']['employementID'];
                        $emailAddress = $_SESSION['update']['emailAddress'];
                        $gender = $_SESSION['update']['gender'];
                        $marrigeState = $_SESSION['update']['marrigeState'];
                        $mobileNumber = $_SESSION['update']['mobileNumber'];

                        // province Officer kenek nam
                        if ($designationTypeID == 2) {
                            $searchUserProvinceId = $_SESSION['update']['proviceIDSearchUser'];
                        }
                        // zonal officer kenek nam
                        if ($designationTypeID == 3) {
                            $searchUserProvinceId = $_SESSION['update']['proviceIDSearchUser'];
                            $searchUserZonalId = $_SESSION['update']['zonalIdSearchUser'];
                        }
                        // principal kenek nam
                        if ($designationTypeID == 4) {

                            $searchUserProvinceId = $_SESSION['update']['proviceIDSearchUser'];
                            $searchUserZonalId = $_SESSION['update']['zonalIdSearchUser'];
                            $searchUserSchoolId = $_SESSION['update']['schoolIdSearchUser'];
                        }
                        // teacher kenek nam
                        if ($designationTypeID == 5) {
                            $searchUserProvinceId = $_SESSION['update']['proviceIDSearchUser'];
                            $searchUserZonalId = $_SESSION['update']['zonalIdSearchUser'];
                            $searchUserSchoolId = $_SESSION['update']['schoolIdSearchUser'];
                            $searchUserSubjectId = $_SESSION['update']['subjectIdSearchUser'];
                        }


                        if (isset($_POST['submit'])) {
                            echo '</br>';

                            $role_subitted = $_POST['select_role'];
                            $nameInitialsSubmitted = $_POST['name'];
                            $nameFullUpdated = $_POST['fname'];
                            $eIDSubmitted = $_POST['eId'];
                            $emailUpdated = $_POST['email'];
                            $addressUpdated = $_POST['address'];
                            $genderUpdated = $_POST['gender'];
                            $merrageUpdated = $_POST['marrrige'];
                            $mobileUpdated = $_POST['mobileNm'];

                            $resultUpdated = $employee->updateEmployeeBasic($nicNumber, $role_subitted, $nameInitialsSubmitted, $nameFullUpdated, $eIDSubmitted, $emailUpdated, $addressUpdated, $genderUpdated, $merrageUpdated, $mobileUpdated);
                            if ($resultUpdated == 1) {

                                echo '<script type="text/javascript">'; 
                                echo 'alert("User is updated successfully!");'; 
                                echo 'window.location.href = "min_off_updateEmployeeFront.php";';
                                echo '</script>';
                            } else {
                                echo '<script language="javascript">';
                                echo 'alert("Error Occured While Updating")';
                                echo '</script>';
                            }
                        }

                        ?>

                        <!-- New Part-->
                        <div class="row">
                            <div class="col-lg-7">

                                <h1 style="padding-bottom:40px;">Update Employee Basic Details</h1>

                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit="return(validateEmpUpdateForm())"  novalidate>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- NIC number-->
                                            <div class="form-group" >
                                                <label>NIC Number</label>
                                                <div><label ><?php echo $nicNumber; ?></label></div>
                                            </div>

                                            <!-- Designation-->
                                            <div class="form-group">
                                                <label for="designation" style="display: inline-block;">Designation</label>
                                                    <?php if ($designationTypeID == 1) { ?>
                                                            <div style="display: inline-block; margin-left: 100px;"><label>Ministry Officer</label></div>
                                                        <?php } else if ($designationTypeID == 2) { ?>
                                                            <div style="display: inline-block; margin-left: 100px;"><label>Province Officer</label></div>
                                                        <?php } else if ($designationTypeID == 3) { ?>
                                                            <div style="display: inline-block; margin-left: 100px;"><label>Zonal Officer</label></div>
                                                        <?php } else if ($designationTypeID == 4) { ?>
                                                            <div style="display: inline-block; margin-left: 100px;"><label>Principal</label></div>
                                                        <?php } else { ?>
                                                            <div style="display: inline-block; margin-left: 100px;"><label>Teacher</label></div>
                                                        <?php } ?>
                                            </div>

                                            <!-- Province Office-->
                                            <?php if($searchUserZonalId > 0) {
                                                    echo $display = "";?>
                                            <div class="form-group" style="<?php echo $display ?>" id="provinceIDDiv">
                                                <label for="province Office">Province Office</label>
                                                    <?php if ($searchUserProvinceId == 1) { ?>
                                                                <div style="display: inline-block; margin-left: 100px;"><label>Central Province</label></div>
                                                            <?php } else if ($searchUserProvinceId == 2) { ?>
                                                                <div style="display: inline-block; margin-left: 100px;"><label>Western Province</label></div>
                                                            <?php } else if ($searchUserProvinceId == 3) { ?>
                                                                <div style="display: inline-block; margin-left: 100px;"><label>Southern Province</label></div>
                                                            <?php } else if ($searchUserProvinceId == 4) { ?>
                                                                <div style="display: inline-block; margin-left: 100px;"><label>Northern Province</label></div>
                                                            <?php } else if ($searchUserProvinceId == 5) { ?>
                                                                <div style="display: inline-block; margin-left: 100px;"><label>Eastern Province</label></div>
                                                            <?php } else {
                                                                
                                                            }
                                                            ?>
                                            </div>
                                            <?php } ?>

                                            <!-- Zonal Office-->
                                            <?php if($searchUserZonalId > 0) {
                                                    echo $display = "";?>
                                            <div class="form-group" style="<?php echo $display ?>" id="zonalOfficeDiv">
                                                <label for="Zonal Office">Zonal Office</label>
                                                    <?php
                                                            $result = $employee->loadZonalOffices();
                                                            foreach ($result as $array) {
                                                                if ($array['zonalID'] == $searchUserZonalId) {
                                                                    echo '<div style="display: inline-block; margin-left: 100px;"><label>' . $array['zonalName'] . '</label></div>';
                                                                }
                                                            }
                                                        ?>
                                            </div>
                                            <?php } ?>

                                            <!-- School-->
                                            <?php if($searchUserSchoolId > 0) {
                                                    echo $display = "";?>
                                            <div class="form-group" style="<?php echo $display ?>" id="schoolIdDiv">
                                                <label for="School">School</label>
                                                    <?php
                                                            $result = $employee->loadSchools();

                                                            foreach ($result as $array) {
                                                                if ($array['schoolID'] == $searchUserSchoolId) {
                                                                    echo '<div style="display: inline-block; margin-left: 100px;"><label>' . $array['schoolName'] . '</label></div>';
                                                                }
                                                            }
                                                            ?>
                                            </div>
                                            <?php } ?>

                                            <!-- Appointment Subject-->
                                            <?php if($searchUserSubjectId > 0) {
                                                    echo $display = "";?>
                                            <div class="form-group" style="<?php echo $display ?>" id="subjectHiddenDiv">
                                                <label for="School">Appointment Subject</label>
                                                    <?php
                                                        $result = $employee->loadSubjects();

                                                        foreach ($result as $array) {
                                                            if ($array['subjectID'] == $searchUserSubjectId) {
                                                            echo '<div style="display: inline-block; margin-left: 100px;"><label>' . $array['subject'] . '</label></div>';
                                                        }
                                                    }
                                                    ?>
                                            </div>
                                            <?php } ?>

                                            <!-- Select role-->
                                            <div class="form-group">
                                                <label for="selec_trole" style="display: inline-block;">User Role</label>
                                                <select required class="form-control" id="select_role" name="select_role" >
                                                    <?php if ($roleType == 2) { ?>
                                                            <option selected="true" value="2" >role2</option>
                                                            <option value="3">role3</option>
                                                            <option value="4">role4</option>
                                                            <option value="5">role5</option>
                                                        <?php } else if ($roleType == 3) { ?>
                                                            <option  value="2">role2</option>
                                                            <option selected="true" value="3">role3</option>
                                                            <option value="4">role4</option>
                                                            <option value="5">role5</option>
                                                        <?php } else if ($roleType == 4) { ?>
                                                            <option  value="2">role2</option>
                                                            <option  value="3">role3</option>
                                                            <option selected="true" value="4">role4</option>
                                                            <option value="5">role5</option>
                                                        <?php } else if ($roleType == 5) { ?>
                                                            <option  value="2">role2</option>
                                                            <option  value="3">role3</option>
                                                            <option  value="4">role4</option>
                                                            <option selected="true" value="5" >role5</option>
                                                            <?php
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                </select>
                                                <label id="errorRole" style="font-size:10px;"></label>
                                            </div>

                                            <!-- Name With Initials-->
                                            <div class="form-group">
                                                <label for="ini_name">Name With Initials</label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $nameWithInitials; ?>" placeholder="Enter Name with Initials"/>
                                                <label id="errorFirstName" style="font-size:10px"> </label>
                                            </div>

                                            <!-- Full Name-->
                                            <div class="form-group">
                                                <label for="fullName">Full Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fullName; ?>" placeholder="Enter Full Name"/>
                                                <label id="errorLastName" style="font-size:10px"> </label>
                                            </div>

                                            <!-- Employment ID-->
                                            <div class="form-group">
                                                <label for="employ_ID">Employee ID</label>
                                                <input type="text" class="form-control" id="eId" name="eId" value="<?php echo $employmentID; ?>" placeholder="Enter Employment ID"/>
                                                <label id="errorEmployID" style="font-size:10px"> </label>
                                            </div>

                                            <!-- Email-->
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $emailAddress; ?>" placeholder="Enter Email" required />
                                                <label id="errorEmail" style="font-size:10px"> </label>
                                            </div>

                                            <!--Current Address-->
                                            <div class="form-group">
                                                <label for="address">Current Address</label>
                                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" placeholder="Enter address" />
                                                <label id="errorAddress" style="font-size:10px"> </label>
                                            </div>

                                            <!--Gender-->
                                            <div class="form-group">
                                                <label for="gender">Select Gender</label>
                                                <select class="form-control" name= "gender" id = "gender">
                                                        <?php if ($gender == 2) { ?>
                                                            <option selected="true" value="2">Male</option>
                                                            <option  value="3">Female</option>
                                                        <?php } else { ?>
                                                            <option value="2">Male</option>
                                                            <option selected="true" value="3">Female</option>
                                                        <?php } ?>
                                                </select> 
                                                <label id="errorGender" style="font-size:10px"> </label>
                                            </div>

                                            <!--Marriage-->
                                            <div class="form-group">
                                                <label for="marriage">Marriage Status</label>
                                                <select class="form-control" name = "marrrige" id = "marrrige">
                                                        <?php if ($marrigeState == 2) { ?>
                                                            <option selected="true" value="2">Yes</option>
                                                            <option value="3">No</option>
                                                        <?php } else { ?>
                                                            <option  value="2">Yes</option>
                                                            <option selected="true" value="3">No</option>
                                                        <?php } ?>
                                                </select>
                                                <label id="errorMarriage" style="font-size:10px"> </label>
                                            </div>

                                            <!--Mobile Number-->
                                            <div class="form-group">
                                                <label for="mobile_numb">Mobile Number</label>
                                                <input type="text" class="form-control" id="mobileNm" name="mobileNm" value="<?php echo $mobileNumber; ?>" placeholder="Enter Mobile Number"/>
                                                <label id="errormobileNumb" style="font-size:10px"> </label>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-5" style="position: fixed; top: 150px; left: 850px;"> 
                                <img src="../images/addPerson.png" width="400" height="400">
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
