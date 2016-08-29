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

        <title>GTMS | Reports</title>

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
            <?php
                require("../classes/employee.php");
                $employee = new Employee();
            ?>

            <!-- include Navigation BAr -->
            <?php include '../interfaces/navigation_bar.php' ?>

            <!-- Sidebar -->
            <?php
            include 'sideBarActivation.php';
            //sideBar Activation
            $navReport = "background-color: #0A1A42;";
            $textReport = "color: white;";

            $navviewReport = "background-color: #091536;";
            $textviewReport = "color: white;";

            $colReport = "collapse in";

            include 'sidebar_min_off.php'; ?>

            </nav>
            <!-- /#sidebar-wrapper -->

            
            

            <!-- Finished NAvigation bar -->

            <!-- Page Content -->

            <div  id="page-content-wrapper" style="min-height: 540px;" >
                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">

                    <div class="row">
                            <div class="col-lg-7">

                        <h1 style="padding-bottom:40px;">Report Generation</h1>

                        <form name="addEmployeeForm" action="pdf.php" method = "post" onsubmit="return validateSubjectwiseReportForm();"  novalidate>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <!-- Designation-->
                                    <div class="form-group">
                                    <label for="designation" style="display: inline-block;">Designation</label>
                                    <select required class="form-control" id="designation" name = "designation" onchange="selectionForm(this.value)" autofocus>
                                        <option value="">Select Designation</option>
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
                                    
                                    <div class="form-group" style="float: right">
                                        <button style="width: 90px;" type="submit" name="submit" id="submit" class="btn btn-primary">Generate</button>
                                    </div>

                                    <div class="form-group" style="float: right; padding-right: 10px;">
                                        <input class="btn btn-primary" style="width: 80px;" type="button" value="Cancel" onclick="window.location.href='ministryOfficerHome.php'"/>
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


        </div>
</br></br>
        <?php include '../interfaces/footer.php' ?>
        <script src = "../assets/js/ValidatesubjectWiseReportForm.js"></script>
        <script src="../assets/js/addEmployee.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
    </body>
</html>
