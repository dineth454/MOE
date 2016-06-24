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

        <title>Update School Front</title>

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

            <!-- Page Content -->

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">
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
                                    echo 'alert("You Dont Have Permission to Do this Action")';
                                    echo '</script>';
                                }
                            } else {
                                echo '<script language = "javascript">';
                                echo 'alert("You Dont Have Permission to Do this Action")';
                                echo '</script>';
                            }
                        }
                        ?>

                        <div class="row">
                            <div class="col-lg-7">
                                <div align="" style="padding-bottom:30px; padding-top:50px;">
                                <h1 class="topic_font">Find School</h1>
                                </div>

                        <form name="FindSchool" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit="return(validateForm())"  novalidate>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                        <div class="row">
                                            <div  class="form-group" style="" id="provinceIDDiv">

                                                <label for="province Office" class="control-label col-xs-5 col-sm-5 col-md-5 col-lg-5 required" style="text-align: left; padding-left:;"> province Office :  </label>

                                                <div   class="col-xs-7 col-sm-7 col-md-7 col-lg-7"  >
                                                    <select required class="form-control " name="provinceID" id="provinceID" onchange="showUser(this.value)">
                                                        <option value="" >Select ProvinceOffice</option>
                                                        <option value="1">centralProvince</option>
                                                        <option value="2">westernProvince</option>
                                                        <option value="3">sothernProvince</option>
                                                        <option value="4">NothernProvince</option>
                                                        <option value="5">esternProvince</option>
                                                    </select>
                                                    <label id="errorProvince" style="font-size: 10px"> </label>
                                                </div>

                                                
                                            </div>
                                        </div>    


                                        </div>


                                        <div  class="row">
                                            <div  style="" class="form-group col-lg-12 col-md-12 col-sm-12" id="zonalOfficeDiv">
                                                <div id="zonalOfficeHidden" class="form-group">

                                                    <label for="Zonal Office" class="control-label col-xs-5 col-sm-5 col-md-5 col-lg-5 required" style=" text-align: left;"> Zonal Office :  </label>
                                                    <div  class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="padding-left:;">
                                                        <select required class="form-control" name="zonalID"  id="abc" onchange="loadSchool(this.value)"> </select>
                                                        <label id="errorZonal" style="font-size: 10px"> </label>

                                                    </div>
                                                    

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div id="schoolIdDiv" class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="schoolHidden" class="form-group">
                                                    <label for="School" class="control-label col-xs-5 col-sm-5 col-md-5 col-lg-5 required" style="text-align: left;"> School : </label>
                                                    <div  class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="padding-left:;">
                                                        <select required class="form-control required" name="schoolId" id="abcd"  ></select>
                                                        <label id="errorSchool" style="font-size: 10px"> </label>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary" style="padding-right: 48px;padding-left: 40px;">Find</button>
                                                </div>

                                            </div>
                                        </div>
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
