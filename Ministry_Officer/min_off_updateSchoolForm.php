
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Update School</title>

        <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">


        <!-- Custom CSS -->
        <link href="../assets/css/sb-admin.css" rel="stylesheet">

        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


        <!-- Custom CSS -->
        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhSKzfElSK1IBSQgF1kGr2Iv6-JqeVUUA"></script>
        <!-- Alert start-->
        <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
        <script src="../alertify/lib/alertify.min.js"></script>
        <!-- Alert end-->

    </head>

    <body onload="initialize()">

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

            <div  id="page-content-wrapper" style="min-height: 540px;">
                <div class="row container-fluid">
                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">

                        <?php
                        // echo $_SESSION['designationType'];
                        
                        
                        //Update School Details
                        $schoolID =  $_SESSION['updateSchool']['schoolID'];
                        $schoolName = $_SESSION['updateSchool']['schoolName'];
                        $noOfStudents = $_SESSION['updateSchool']['numOfStudents'];
                        $latitude =  $_SESSION['updateSchool']['lat'];
                        $longtitude = $_SESSION['updateSchool']['lng'];
                        if (isset($_POST['submit'])) {
                            require '../classes/institute.php';
                            
                            $updatedSchoolName=$_POST['School'];
                            $updatedNoOFStudents = $_POST['students'];
                            $updatesLatitude = $_POST['lat'];
                            $updatedLangitude = $_POST['lng'];
                            
                            $institute = new Institute();
                            $result =  $institute->updateInstitute($schoolID,$updatedSchoolName,$updatedNoOFStudents,$updatesLatitude,$updatedLangitude);
                            
                            if($result == 1){
                                echo '<script language="javascript">
                                        alertify.confirm("School details are updated successfully!", function (e) {
                                        if (e) {
                                            window.location.href="min_off_updateSchool.php";
                                        }
                                        });
                                    </script>';
                            }else{
                                echo '<script language = "javascript">';
                                echo 'alertify.alert("Error Occured While Updating Data")';
                                echo '</script>';
                                
                            }
                            
                        }
                        ?>

                        <div class="row">
                        <div class="col-lg-6">
                            <h1 style="padding-bottom:40px;">Update School Details</h1>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="return(validateForm())" novalidate>

                            <div class="row" >
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <div class="form-group">
                                        <label for="School">School Name/Address</label>
                                            <input type="text" class="form-control" id="School" name="School"  placeholder="Enter School Name or Address" value="<?php echo $schoolName ;?>"/>
                                        <label id="errorSchoolName" style="font-size:10px"> </label>
                                    </div>


                                    <div class="form-group">
                                        <label for="NoOfStudents">Number Of Students</label>
                                            <input type="text" class="form-control" id="students" name="students"  placeholder="Enter Number Of Students" value="<?php echo $noOfStudents; ?>"/>
                                        <label id="errorStudentNumber" style="font-size:10px"> </label>
                                    </div>


                                    <div class="form-group">
                                        <label for="Latitude">Latitude</label>
                                            <input type="text" class="form-control" id="latbox" name="lat"  placeholder="Select the location on the map" value="<?php echo $latitude;?>"/>
                                        <label id="errorLat" style="font-size:10px"> </label>
                                    </div>


                                    <div class="form-group">
                                        <label for="Longitude">Longitude</label>
                                            <input type="text" class="form-control" id="lngbox" name="lng"  placeholder="Select the location on the map" value="<?php echo $longtitude;?>"/>
                                        <label id="errorLng" style="font-size:10px"> </label>
                                    </div>


                                    <div  class="form-group" style="float: right;">
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

                    <div class="col-lg-6" style="height: 530px; position: fixed; top: 120px; left: 780px;">
                        <!-- map -->
                        <div class="row" >
                            <label style="padding-left: 15px; font-size:10px;">Right Click on the map and drag to the place you want then get latitude and langitude</label>
                            <div class="container-fluid" style="padding-top:10px;">
                                <div id="map-canvas" style="width:430px; height:480px; box-shadow: 0px 0px 15px #595959; "></div>
                            </div>
                        </div>
                        <!-- end map -->
                    </div>

                </div>
                </div>
            </div>
        </div>

        <!--______________________________________________________________________________________________________________-->
        <!-- Data validation-->
        <script type="text/javascript">
            function validateForm() {
                var errors = [];

                if (!validateSchoolName("School", "errorSchoolName")) {
                    errors.push("errorSchoolName");

                }
                if (!validateStudentNumber("students", "errorStudentNumber")) {
                    errors.push("errorStudentNumber");

                }
               
                if (!validateLatitude("latbox", "errorLat")) {
                    errors.push("errorLat");

                }
                if (!validateLongtitude("lngbox", "errorLng")) {
                    errors.push("errorLng");

                }
                if (errors.length > 0) {
                    return false;
                } else {
                    return true;
                }
            }

            /*___School name validation function___*/
            function validateSchoolName(text, errorLbl) {
                var pattern = /^[a-zA-Z_ /-,.]*$/;
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Please enter school name";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else if (!isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "School name can't be a number";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                }else if(!(pattern.test(document.getElementById(text).value))){
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Please don't enter both numbers and letters";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "green";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }

            /*____Number of students validation function_____*/
            function validateStudentNumber(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Please enter Number of students";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else if (!isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).style.borderColor = "green";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                } else {

                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Number of students can't be a letter";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                }
            }

          
            /*___School destination latitude validation function___*/
            function validateLatitude(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Please Select the Latitude";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else if (isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Invalid type";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "green";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }

            /*___School destination longtitude validation function___*/
            function validateLongtitude(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Please Select the Longitude";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else if (isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Invalid type";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "green";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }
        </script>

        <!--______________________end of validation______________________________________-->

        <?php include '../interfaces/footer.php' ?>
        <!-- Bootstrap Core JavaScript -->
        <script src = "../assets/js/addSchool.js"></script>
        <script src="../assets/js/jquery.js" ></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../assets/js/googlemap.js"></script>
        <script src="../assets/js/addSchoolMarker.js"></script>
        
    </body>
</html>