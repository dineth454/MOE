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

        <title>GTMS | Institute</title>

        <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/sb-admin.css" rel="stylesheet">

        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <!-- <link href="../assets/css/smallbox.css" rel="stylesheet"> -->
        <link href="../assets/css/footer.css" rel="stylesheet">
        <link href="../assets/css/fonts_styles.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">
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
                $navInstitute = "background-color: #0A1A42;";
                $textInstitute = "color: white;";

                $navUpdateSchoolInstitute = "background-color: #091536;";
                $textUpdateSchoolInstitute = "color: white;";

                $colInstitute = "collapse in";

                include 'sidebar_min_off.php'; ?>
                <!-- /#sidebar-wrapper -->
                <!-- /.navbar-collapse -->
            </nav>

            <!-- Page Content -->

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">
                        <?php
                        require("../classes/institute.php");

                        $institute = new Institute();

                        // logged User Details
                        $LoggedUsernic = $_SESSION["nic"];
                        $designationIdLoggedUser = $_SESSION['designationTypeID'];
                        if (isset($_POST['submit'])) {
                            $schoolID = $_POST['schoolId'];
                            // echo $schoolID;

                            $resultFindschool = $institute->findSchool($schoolID);

                            $schoolName = $resultFindschool['schoolName'];
                            // echo $schoolName;
                            $numOfStudents = $resultFindschool['numOfStudents'];
                            $latitude = $resultFindschool['lat'];
                            $langitude = $resultFindschool['lng'];
                            $instituteIdSearchSchool = $resultFindschool['instituteID'];
                            $instituteIDLoggedUser = $institute->getInstituteIDLoggedUser($LoggedUsernic);

                            if ($designationIdLoggedUser == 1) {
                                $_SESSION['updateSchool']['schoolID'] = $schoolID;
                                $_SESSION['updateSchool']['schoolName'] = $schoolName;
                                $_SESSION['updateSchool']['numOfStudents'] = $numOfStudents;
                                $_SESSION['updateSchool']['lat'] = $latitude;
                                $_SESSION['updateSchool']['lng'] = $langitude;
                                // echo 'kalinga';
                                header("Location: min_off_updateSchoolForm.php");
                                // echo 'yapa' ; 
                                //Principal kenekda kiyala balanawa
                            } elseif ($designationIdLoggedUser == 4) {
                                //principalge School ekama wenna oni search karana school ekath
                                if ($instituteIdSearchSchool == $instituteIDLoggedUser) {
                                    $_SESSION['updateSchool']['schoolID'] = $schoolID;
                                    $_SESSION['updateSchool']['schoolName'] = $schoolName;
                                    $_SESSION['updateSchool']['numOfStudents'] = $numOfStudents;
                                    $_SESSION['updateSchool']['lat'] = $latitude;
                                    $_SESSION['updateSchool']['lng'] = $langitude;
                                    // echo 'kalinga';
                                    header("Location: min_off_updateSchoolForm.php");
                                    // echo 'yapa' ; 
                                } else {
                                    echo '<script language = "javascript">';
                                    echo 'alertify.alert("You Dont Have Permission to Do this Action")';
                                    echo '</script>';
                                }
                            } else {
                                echo '<script language = "javascript">';
                                echo 'alertify.alert("You Dont Have Permission to Do this Action")';
                                echo '</script>';
                            }
                        }
                        ?>

                        <div class="row">
                            <div class="col-lg-7">
                                <h1 style="padding-bottom:40px;">Find School</h1>

                        <form name="FindSchool" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit="return(validateForm())"  novalidate>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">


                                            <div  class="form-group" id="provinceIDDiv">
                                                <label for="province Office" style="text-align: left; padding-left:;">province Office </label>
                                                <select required class="form-control " name="provinceID" id="provinceID" onchange="showUser(this.value)" autofocus>
                                                    <option value="" >Select Province Office</option>
                                                    <option value="1">Central Province</option>
                                                    <option value="2">Western Province</option>
                                                    <option value="3">Sothern Province</option>
                                                    <option value="4">Northern Province</option>
                                                    <option value="5">Estern Province</option>
                                                </select>
                                                <label id="errorProvince" style="font-size: 10px"> </label>
                                            </div>  


                                            <div class="form-group" id="zonalOfficeDiv">
                                                <label for="Zonal Office" style=" text-align: left;">Zonal Office </label>
                                                <select required class="form-control" name="zonalID"  id="abc" onchange="loadSchool(this.value)"> 
                                                    <option value="" >Select Zonal Office</option>
                                                </select>
                                                <label id="errorZonal" style="font-size: 10px"> </label>
                                            </div>


                                            <div id="schoolIdDiv" class="form-group">
                                                <label for="School" style="text-align: left;">School</label>
                                                <select required class="form-control required" name="schoolId" id="abcd"  >
                                                    <option value="" >Select School</option>
                                                </select>
                                                <label id="errorSchool" style="font-size: 10px"> </label>
                                            </div>


                                            <div class="form-group" style="float: right;">
                                                <button style="width: 80px;" type="submit" name="submit" id="submit" class="btn btn-primary" style="float: right;">Find</button>
                                            </div>

                                            <div class="form-group" style="float: right; padding-right: 10px;">
                                                <input class="btn btn-primary" style="width: 80px;" type="button" value="Cancel" onclick="window.location.href='ministryOfficerHome.php'"/>
                                            </div>
                                    </div>
                                </div>
                        </form>
                        </div>
                        <div class="col-lg-5" style="position: fixed; top: 150px; left: 850px;"> 
                                <img src="../images/updateInstitute.png" width="400" height="400">
                        </div>
                    </div>

                    </div>

                </div>
            </div>

            <!-- /#page-content-wrapper -->

        </div>
        <br><br><br>

        

        <?php include '../interfaces/footer.php' ?>
        <script src = "../assets/js/addEmployee.js"></script>

        <script src="../assets/js/jquery.js"></script>


        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>

        <script type="text/javascript">

                                                            function validateForm() {
                                                                var errors = [];
                                                                if (!validateDropDown("provinceID", "errorProvince")) {
                                                                    errors.push("errorProvince");
                                                                }


                                                                if (!validateDropDown("abc", "errorZonal")) {
                                                                    errors.push("errorZonal");
                                                                }

                                                                if (!validateDropDown("abcd", "errorSchool")) {
                                                                    errors.push("errorSchool");
                                                                }
                                                                if (errors.length > 0) {
                                                                    return false;
                                                                } else {
                                                                    return true;
                                                                }

                                                            }

                                                            //method to validate a dropdown is selected or not
                                                            function validateDropDown(text, errorLbl) {
                                                                if (document.getElementById(text).value == "") {
                                                                    document.getElementById(text).focus();
                                                                    document.getElementById(text).style.borderColor = "red";
                                                                    document.getElementById(errorLbl).innerHTML = "please select a value";
                                                                    document.getElementById(errorLbl).style.color = "red";

                                                                    return false;
                                                                } else {
                                                                    document.getElementById(text).style.borderColor = "green";
                                                                    document.getElementById(errorLbl).innerHTML = "";
                                                                    return true;
                                                                }
                                                            }


        </script>



    </body>

</html>
