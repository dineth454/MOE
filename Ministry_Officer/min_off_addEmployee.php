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
        <link href="../assets/css/plugins/morris.css" rel="stylesheet">

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

                $navAddMembers = "background-color: #091536;";
                $textAddMembers = "color: white;";

                $colMembers = "collapse in";

                include 'sidebar_min_off.php';
                ?>
                <!-- /#sidebar-wrapper -->
                <!-- /.navbar-collapse -->
            </nav>

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">

                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">

                        <?php
                        $roletypeID = $_SESSION["roleTypeID"];
                        $designationIdLoggedUser = $_SESSION["designationTypeID"];
                        $LoggedUsernic = $_SESSION["nic"];

                        require("../classes/employee.php");
                        $employee = new Employee();

                        $result1 = $employee->getProvinceIdOfLoggedUser($LoggedUsernic);
                        $provinceIdLoggedUser = $result1['provinceID'];

                        $result2 = $employee->getZonalIDLoggedUser($LoggedUsernic);
                        $zonalIdLoggedUser = $result2['zonalID'];

                        $result3 = $employee->getSchoolIDOfLoggedUser($LoggedUsernic);
                        $schoolIDLoggedUser = $result3['schoolID'];

                        if (isset($_POST['submit'])) {




                            $nic = $roleType = $designation = $nameInitials = $fName = $empID = $email = $currentAddress = $gender = $marrigeState = $mobileNum = "";
                            $provinceID = $zoneID = $schoolId = $subjectID = "";
                            $nic = strtoupper($_POST['nic']);
                            $roleType = $_POST['select_role'];
                            $designation = $_POST['designation'];
                            $nameInitials = $_POST['name'];
                            $fName = $_POST['fname'];
                            $empID = $_POST['eId'];
                            $email = $_POST['email'];

                            $currentAddress = $_POST['address'];
                            $gender = $_POST['gender'];
                            $marrigeState = $_POST['marrrige'];
                            $mobileNum = $_POST['mobileNm'];


                            //echo $designation;

                            if ($designation == 2) {
                                $provinceID = $_POST['provinceID'];
                            } else if ($designation == 3) {
                                $provinceID = $_POST['provinceID'];
                                $zoneID = $_POST['zonalID'];
                            } else if ($designation == 4) {
                                $provinceID = $_POST['provinceID'];
                                $zoneID = $_POST['zonalID'];
                                $schoolId = $_POST['schoolId'];
                            } else if ($designation == 5) {
                                $provinceID = $_POST['provinceID'];
                                $zoneID = $_POST['zonalID'];
                                $schoolId = $_POST['schoolId'];
                                $subjectID = $_POST['subject'];
                            } else {
                                $designation = $_POST['designation'];
                            }



                            // logged in sys admin
                            if ($designationIdLoggedUser == 1 and $roletypeID == 1) {
                                //add Principal into system and check he is already exists.
                                if ($designation == 4) {

                                    $designationResult = $employee->checkDesignation($schoolId);

                                    if ($designationResult == 0) {
                                        echo '<script language="javascript">';
                                        echo 'alertify.alert("There Is a Principal Already In this institute")';
                                        echo '</script>';
                                    } else {
                                        $result = $employee->addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID);
                                    }
                                } else {
                                    $result = $employee->addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID);
                                }
                            } else if ($designationIdLoggedUser < $designation) {

                                if ($designation == 4) {

                                    $designationResult = $employee->checkDesignation($schoolId);

                                    if ($designationResult == 0) {
                                        echo '<script language="javascript">';
                                        echo 'alertify.alert("There Is a Principal Already In this institute")';
                                        echo '</script>';
                                    } else {
                                        // log wela inne ministry officer kenek nam
                                        if ($designationIdLoggedUser == 1) {
                                            $result = $employee->addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID);

                                            //log wela inne province officer kenek nam
                                        } else if ($designationIdLoggedUser == 2) {

                                            //zonal officer kenek nam add karanne
                                            if ($provinceIdLoggedUser == $provinceID) {
                                                $result = $employee->addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID);
                                            }
                                            // logged wela inne zonal officer kenek nam
                                        } else if ($designationIdLoggedUser == 3) {
                                            //principal kenek nam add karanne 
                                            if ($zonalIdLoggedUser == $zoneID) {
                                                $result = $employee->addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID);
                                            }
                                            //logged wela inne principal kenek nam
                                        } else if ($designationIdLoggedUser == 4) {
                                            //add karanne teacher kenek nam
                                            if ($schoolIDLoggedUser == $schoolId) {
                                                $result = $employee->addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID);
                                            } else {
                                                echo '<script language="javascript">';
                                                echo 'alertify.alert("You Dont Have Permission to Add this employee!!!  Thank You.1")';
                                                echo '</script>';
                                            }
                                        } else {
                                            echo '<script language="javascript">';
                                            echo 'alertify.alert("You Dont Have Permission to Add this employee!!!  Thank You.2")';
                                            echo '</script>';
                                        }
                                    }
                                } else {

                                    // log wela inne ministry officer kenek nam
                                    if ($designationIdLoggedUser == 1) {
                                        $result = $employee->addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID);

                                        //log wela inne province officer kenek nam
                                    } else if ($designationIdLoggedUser == 2) {

                                        //zonal officer kenek nam add karanne
                                        if ($provinceIdLoggedUser == $provinceID) {
                                            $result = $employee->addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID);
                                        }else {
                                            echo '<script language="javascript">';
                                            echo 'alertify.alert("You Dont Have Permission to Add this employee!!!  Thank You.1")';
                                            echo '</script>';
                                        }
                                        // logged wela inne zonal officer kenek nam
                                    } else if ($designationIdLoggedUser == 3) {
                                        //principal kenek nam add karanne 
                                        if ($zonalIdLoggedUser == $zoneID) {
                                            $result = $employee->addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID);
                                        }else {
                                            echo '<script language="javascript">';
                                            echo 'alertify.alert("You Dont Have Permission to Add this employee!!!  Thank You.1")';
                                            echo '</script>';
                                        }
                                        //logged wela inne principal kenek nam
                                    } else if ($designationIdLoggedUser == 4) {
                                        //add karanne teacher kenek nam
                                        if ($schoolIDLoggedUser == $schoolId) {
                                            $result = $employee->addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID);
                                        } else {
                                            echo '<script language="javascript">';
                                            echo 'alertify.alert("You Dont Have Permission to Add this employee!!!  Thank You.1")';
                                            echo '</script>';
                                        }
                                    } else {
                                        echo '<script language="javascript">';
                                        echo 'alertify.alert("You Dont Have Permission to Add this employee!!!  Thank You.2")';
                                        echo '</script>';
                                    }
                                }


                                /// $result = $employee->addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $dob, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID);
                            } else {

                                echo '<script language="javascript">';
                                echo 'alertify.alert("You Dont Have Permission to Add this employee!!!  Thank You.3")';
                                echo '</script>';
                            }
                        }
                        ?>

                        <!-- New Part-->
                        <div class="row">
                            <div class="col-lg-7">

                                <h1 style="padding-bottom:40px;">Add New Member</h1>

                                <form name="addEmployeeForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit="return(validateForm())"  novalidate>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- NIC number-->
                                            <div class="form-group">
                                                <label for="nic" style="display: inline-block;">NIC Number</label>
                                                <input maxlength="10" type="text" required class="form-control" id="nic" name="nic" placeholder="Enter NIC Number" autofocus/>
                                                <label id="errornicNum" style="font-size:10px"></label>
                                            </div>

                                            <!-- Select role-->
                                            <div class="form-group">
                                                <label for="selec_trole" style="display: inline-block;">User Role</label>
                                                <select required class="form-control" id="select_role" name="select_role" onchange="myFunction()">
                                                    <option value="">Select Role</option>
                                                    <option value="2">Ministry User</option>
                                                    <option value="3">PZInstitute User</option>
                                                    <option value="4">Extended Principal User</option>
                                                    <option value="5">General Principal User</option>
                                                    <option value="6">General User</option>
                                                </select>
                                                <label id="errorRole" style="font-size:10px;"></label>
                                            </div>

                                            <!-- Designation-->
                                            <div class="form-group" id="designationDiv" style="display: none;">
                                                <label for="designation" style="display: inline-block;">Designation</label>
                                                <select required class="form-control" id="designation" name = "designation" onchange="selectionForm(this.value)">
                                                    <option value="">Select Designation</option>
                                                    <option value="1">Ministry Officer</option>
                                                    <option value="2">Province Officer</option>
                                                    <option value="3">Zonal Officer</option>
                                                    <option value="4">Principal</option>
                                                    <option value="5">Teacher</option>
                                                </select>
                                                <label id="errorDesignation" style="font-size: 10px"> </label>
                                            </div>


                                            <!-- Province Office-->
                                            <div class="form-group" style="display: none;" id="provinceIDDiv">
                                                <label for="province Office">Province Office</label>
                                                <select class="form-control " name="provinceID" id="provinceID" onchange="showUser(this.value)">
                                                    <option value="" >Select Province Office</option>
                                                    <option value="1">Central Province</option>
                                                    <option value="2">Western Province</option>
                                                    <option value="3">Southern Province</option>
                                                    <option value="4">Nothern Province</option>
                                                    <option value="5">Eastern Province</option>
                                                    <option value="6">North Central Provience</option>
                                                    <option value="7">North Western Province</option>
                                                    <option value="8">Sabaragamuwa Province</option>
                                                    <option value="9">Uva Province</option>
                                                </select>
                                                <label id="errorProvince" style="font-size: 10px"> </label>
                                            </div>

                                            <!-- Zonal Office-->
                                            <div class="form-group" style="display: none;" id="zonalOfficeDiv">
                                                <label for="Zonal Office">Zonal Office</label>
                                                <select required class="form-control" name="zonalID"  id="abc" onchange="loadSchool(this.value)">
                                                    <option value="" >Select Zonal Office</option>
                                                </select>
                                                <label id="errorZonal" style="font-size: 10px"> </label>
                                            </div>

                                            <!-- School-->
                                            <div class="form-group" style="display: none;" id="schoolIdDiv">
                                                <label for="School">School</label>
                                                <select required class="form-control required" name="schoolId" id="abcd">
                                                    <option value="" >Select School</option>
                                                </select>
                                                <label id="errorSchool" style="font-size: 10px"> </label>
                                            </div>

                                            <!-- Appointment Subject-->
                                            <div class="form-group" style="display: none;" id="subjectHiddenDiv">
                                                <label for="School">Appointment Subject</label>
                                                <select required class="form-control" name="subject" id="subject" >
                                                    <option value="">Select Subject</option>
                                                    <?php
                                                    $result = $employee->loadSubjects();

                                                    foreach ($result as $array) {

                                                        echo '<option  value="' . $array['subjectID'] . '" >' . $array['subject'] . '</option>';
                                                    }
                                                    ?>

                                                </select>
                                                <label id="errorSubject" style="font-size: 10px"> </label>
                                            </div>

                                            <!-- Name With Initials-->
                                            <div class="form-group">
                                                <label for="ini_name">Name With Initials</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name with Initials"/>
                                                <label id="errorFirstName" style="font-size:10px"> </label>
                                            </div>

                                            <!-- Full Name-->
                                            <div class="form-group">
                                                <label for="fullName">Full Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Full Name"/>
                                                <label id="errorLastName" style="font-size:10px"> </label>
                                            </div>

                                            <!-- Employment ID-->
                                            <div class="form-group">
                                                <label for="employ_ID">Employee ID</label>
                                                <input type="text" class="form-control" id="eId" name="eId" placeholder="Enter Employment ID"/>
                                                <label id="errorEmployID" style="font-size:10px"> </label>
                                            </div>

                                            <!-- Email-->
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required />
                                                <label id="errorEmail" style="font-size:10px"> </label>
                                            </div>

                                            <!--Current Address-->
                                            <div class="form-group">
                                                <label for="address">Current Address</label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" />
                                                <label id="errorAddress" style="font-size:10px"> </label>
                                            </div>

                                            <!--Gender-->
                                            <div class="form-group">
                                                <label for="gender">Select Gender</label>
                                                <select class="form-control" name= "gender" id = "gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="2">Male</option>
                                                    <option value="3">Female</option>
                                                </select> 
                                                <label id="errorGender" style="font-size:10px"> </label>
                                            </div>

                                            <!--Marriage-->
                                            <div class="form-group">
                                                <label for="marriage">Marriage Status</label>
                                                <select class="form-control" name = "marrrige" id = "marrrige">
                                                    <option value="">Select State</option>
                                                    <option value="2">Yes</option>
                                                    <option value="3">No</option>
                                                </select>
                                                <label id="errorMarriage" style="font-size:10px"> </label>
                                            </div>

                                            <!--Mobile Number-->
                                            <div class="form-group">
                                                <label for="mobile_numb">Mobile Number</label>
                                                <input type="text" class="form-control" id="mobileNm" name="mobileNm" placeholder="Enter Mobile Number"/>
                                                <label id="errormobileNumb" style="font-size:10px"> </label>
                                            </div>

                                            <div class="form-group" style="float: right">
                                                <button style="width: 80px;" type="submit" name="submit" id="submit" class="btn btn-primary">Done</button>
                                            </div>

                                            <div class="form-group" style="float: right; padding-right: 10px;">
                                                <input class="btn btn-primary" style="width: 80px;" type="button" value="Cancel" onclick="window.location.href = 'ministryOfficerHome.php'"/>
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
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>

    </body>

</html>