<?php
ob_start();
//session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>GTMS | Transfer</title>

        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">

         <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        
        <link href="../assets/css/footer.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">
        <!-- Alert start-->
        <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
        <script src="../alertify/lib/alertify.min.js"></script>
        <!-- Alert end-->   



    </head>

    <body>

        <div id="wrapper" > 

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
            $navTransfer = "background-color: #0A1A42;";
            $textTransfer = "color: white;";

            $navTransferTeach = "background-color: #091536;";
            $textTransferTeach = "color: white;";

            $colTransfer = "collapse in";

            include 'sidebar_min_off.php'; ?>
            <!-- /#sidebar-wrapper -->
            <!-- /.navbar-collapse -->
            </nav>
            
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid" style="">
                    <div class="col-lg-10 col-lg-offset-1" style="padding-top: 50px;">
                        <?php
                        //get session attribute Values
                        $designationTypeID = $_SESSION['transer']['designationType'];
                        // teacher kenek nam
                        if ($designationTypeID == 5) {
                            $nicNumber = $_SESSION['transer']['nicNumber'];
                            $nameWithInitials = $_SESSION['transer']['nameWithInitials'];

                            $searchUserCurrentAddress = $_SESSION['transer']['currentaddress'];
                            $searchUserCurrntSchool = $_SESSION['transer']['schoolName'];
                            $instituteIDOld = $_SESSION['transer']['instituteID'];

                            //echo $instituteIDOld;
                        }
                        ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 style="padding-bottom:25px;">Transfer From</h1>

                                <div class="row">
                                    <div class="form-group">

                                        <!-- NIC number-->
                                        <div class="form-group" >
                                            <div class="col-lg-5"><label for="firstName">NIC Number</label></div>
                                            <div class= "col-lg-6" style="display: inline-block;"><label id="nic"><?php echo $nicNumber; ?></label></div>
                                        </div>


                                        <!-- School Name -->
                                        <div class="form-group" >
                                            <div class="col-lg-5"><label for="SchoolName">School Name</label></div>
                                            <div class= "col-lg-6" style="display: inline-block;"><label id="School"><?php echo $searchUserCurrntSchool; ?></label></div>
                                        </div>


                                        <!-- Name with initials-->
                                        <div class="form-group" >
                                            <div class="col-lg-5"><label for="ini_name">Name with Initials</label></div>
                                            <div class= "col-lg-6" style="display: inline-block;"><label id="NamewithInitials"><?php echo $nameWithInitials; ?></label></div>
                                        </div>


                                        <!-- Current Address-->
                                        <div class="form-group" >
                                            <div class="col-lg-5"><label for="CurrentAddress">Current Address</label></div>
                                            <div class= "col-lg-6" style="display: inline-block;"><label id="currentAddress"><?php echo $searchUserCurrentAddress; ?></label></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <div class="col-lg-6">
                    <?php

                        if (isset($_POST['submit'])) {
                            require '../classes/employee.php';
                            $provinceID = $_POST['provinceID'];
                            $zoneID = $_POST['zonalID'];
                            $schoolId = $_POST['schoolId'];


                            $employee = new Employee();
                            $insertWorkingHistrySuccess = $employee->insertIntoWorkingHistory($nicNumber, $instituteIDOld);
                            $updateSuccess = $employee->transerUpdateTeacher($nicNumber,$schoolId,$zoneID,$provinceID);

                            if ($updateSuccess == 1) {

                                if ($insertWorkingHistrySuccess == 1) {
                                    echo '<script language="javascript">
                                            alertify.confirm("Teacher is transfered successfully!", function (e) {
                                            if (e) {
                                                window.location.href="min_off_transferFront.php";
                                            }
                                            });
                                        </script>';
                                } else {
                                    echo '<script language="javascript">';
                                    echo 'alertify.alert("not insert into working history")';
                                    echo '</script>';
                                }
                            } else {
                                echo '<script language="javascript">';
                                echo 'alertify.alert("error Occured While trnser")';
                                echo '</script>';
                            }
                        }
                        ?>
                        

                        <h1 style="padding-bottom:40px;">Transfer To</h1>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit="return(validateTranserForm())" novalidate>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                        <!-- Province -->
                                        <div class="form-group" id="provinceIDDiv">
                                            <label for="province Office">Province Office</label>
                                            <select class="form-control " name="provinceID" id="provinceID" onchange="showUser(this.value)">
                                                <option value="" >Select Province Office</option>
                                                <option value="1">Central Province</option>
                                                <option value="2">Western Province</option>
                                                <option value="3">Southern Province</option>
                                                <option value="4">Nothern Province</option>
                                                <option value="5">Eastern Province</option>
                                                </select>
                                            <label id="errorProvince" style="font-size: 10px"> </label>
                                        </div>

                                        <!-- Zonal Office-->
                                        <div class="form-group" id="zonalOfficeDiv">
                                            <label for="Zonal Office">Zonal Office</label>
                                            <select required class="form-control" name="zonalID"  id="abc" onchange="loadSchool(this.value)">
                                                <option value="" >Select Zonal Office</option>
                                            </select>
                                            <label id="errorZonal" style="font-size: 10px"> </label>
                                        </div>


                                        <!-- School-->
                                        <div class="form-group" id="schoolIdDiv">
                                            <label for="School">School</label>
                                            <select required class="form-control required" name="schoolId" id="abcd">
                                                <option value="" >Select School</option>
                                            </select>
                                            <label id="errorSchool" style="font-size: 10px"> </label>
                                        </div>


                                        <div class="form-group" style="float: right;">
                                            <button style="width: 80px;" type="submit" name="submit" id="submit" class="btn btn-primary">Done</button>
                                        </div>

                                        <div class="form-group" style="float: right; padding-right: 10px;">
                                            <input class="btn btn-primary" style="width: 80px;" type="button" value="Cancel" onclick="window.location.href='ministryOfficerHome.php'"/>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
            </div>
        </div>
            <!-- /#page-content-wrapper -->


</br></br>
            <?php include '../interfaces/footer.php' ?>
            <script src = "../assets/js/addEmployee.js"></script>
            <script src="../assets/js/validateTranserForm.js"></script>
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>
            <script src="../assets/js/transerTeacherFrontnicValidation.js"></script>
            <!-- jQuery -->
            <script src="../assets/js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="../assets/js/bootstrap.min.js"></script>
        </div>
    </body>
</html>