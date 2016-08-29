
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

        <title>GTMS | Institute</title>

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
                include 'Extended_principle_sidebar_activation.php';

                //sideBar Activation
                $navInstitute = "background-color: #0A1A42;";
                $textInstitute = "color: white;";

                $navAddSchoolInstitute = "background-color: #091536";
                $textAddSchoolInstitute = "color: white;";

                $colInstitute = "collapse in";

                include 'Extended_principle_sidebar.php'; ?>
                <!-- /#sidebar-wrapper -->
                <!-- /.navbar-collapse -->
            </nav>
            <div  id="page-content-wrapper" style="min-height: 540px;">
                <div class="row container-fluid">
                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">
                    

                        <?php
                        // echo $_SESSION['designationType'];
                        if (isset($_POST['submit'])) {
                            require '../classes/institute.php';
                            // get logged User details
                          
                            $designationTypeID = $_SESSION["designationTypeID"];
                            //echo $designationTypeID;
                            // $nic = $_POST['nic'];
                            $provinceId = $_POST['provinceID'];
                            $zonalId = $_POST['zonalID'];
                            $school = $_POST['School'];
                            $SchoolType = $_POST['SchoolTypeSelect'];
                            $NoOfStudents = $_POST['students'];
                            $lat = $_POST['lat'];
                            $lang = $_POST['lng'];

                            $institute = new Institute();
                            // check sysadmin or ministry officer    
                            if ($designationTypeID == 1) {
                                $insertSuccess = $institute->addschool($provinceId, $zonalId, $school, $SchoolType, $NoOfStudents, $lat, $lang);

                                if ($insertSuccess == 1) {
                                    echo '<script language = "javascript">';
                                    echo 'alertify.alert("School Added Succeccfully")';
                                    echo '</script>';
                                } else {
                                    echo '<script language = "javascript">';
                                    echo 'alertify.alert("error Occurd while inserting data")';
                                    echo '</script>';
                                }
                            }else{
                                
                                echo '<script language = "javascript">';
                                echo 'alertify.alert("Permission Denied")';
                                echo '</script>';
                            }
                        }
                        ?>

                        <div class="row">
                            <div class="col-lg-6">
                            <h1 style="padding-bottom:40px;">Add New School</h1>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="return(validateForm())" novalidate>

                            <div class="row" >
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <div class="form-group"  id="provinceIDDiv">
                                        <label for="province Office">province Office</label>
                                            <select class="form-control " name="provinceID" id="provinceID" onchange="showUser(this.value)">
                                                <option value="" >Select Province Office</option>
                                                <option value="1">Central Province</option>
                                                <option value="2">Western Province</option>
                                                <option value="3">Southern Province</option>
                                                <option value="4">Northern Province</option>
                                                <option value="5">Estern Province</option>
                                            </select>
                                        <label id="errorProvince" style="font-size:10px;"></label>
                                    </div>

                                    <div class="form-group" id="zonalOfficeDiv">
                                        <label for="ZonalOffice">Zonal Office</label>
                                            <select required class="form-control" name="zonalID" id="zonalID"> 
                                                <option value="" >Select Zonal Office</option>
                                            </select>
                                        <label id="errorZonal" style="font-size: 10px"> </label>
                                    </div>



                                    <div class="form-group">
                                        <label for="School">School Name/Address</label>
                                            <input type="text" class="form-control" id="School" name="School"  placeholder="Enter School Name or Address"/>
                                        <label id="errorSchoolName" style="font-size:10px"> </label>
                                    </div>


                                    <div class="form-group">
                                        <label for="SchoolType">School Type</label>
                                            <select required class="form-control " name="SchoolTypeSelect" id="SchoolTypeSelect">
                                                    <option value="">Select School Type</option>
                                                    <option value="1">Mix</option>
                                                    <option value="2">Girls'</option>
                                                    <option value="3">Boys'</option>
                                                    <option value="4">Primary Girls'</option>
                                                    <option value="5">Primary Boys'</option>
                                                    <option value="6">Primary Mix</option>
                                                    <option value="7">Secondary Girls'</option>
                                                    <option value="8">Secondary Boys'</option>
                                                    <option value="9">Secondary Mix</option>
                                            </select>
                                        <label id="errorSchoolType" style="font-size:10px;"> </label>
                                    </div>


                                    <div class="form-group">
                                        <label for="NoOfStudents">Number Of Students</label>
                                            <input type="text" class="form-control" id="students" name="students"  placeholder="Enter Number Of Students"/>
                                        <label id="errorStudentNumber" style="font-size:10px"> </label>
                                    </div>


                                    <div class="form-group">
                                        <label for="Latitude">Latitude</label>
                                            <input type="text" class="form-control" id="latbox" name="lat"  placeholder="Select the location on the map"/>
                                        <label id="errorLat" style="font-size:10px"> </label>
                                    </div>


                                    <div class="form-group">
                                        <label for="Longitude">Longitude</label>
                                            <input type="text" class="form-control" id="lngbox" name="lng"  placeholder="Select the location on the map"/>
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
                if (!validateProvince("provinceID", "errorProvince")) {
                    errors.push("errorProvince");

                }
                if (!validateZonal("zonalID", "errorZonal")) {
                    errors.push("errorZonal");

                }
                if (!validateSchoolType("SchoolTypeSelect", "errorSchoolType")) {
                    errors.push("errorSchoolType");

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
                var pattern = /^[a-zA-Z_ -,.]*$/;
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please enter school name";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else if (!isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "School name can't be a number";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                }else if(!(pattern.test(document.getElementById(text).value))){
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please don't enter both numbers and letters";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }

            /*____Number of students validation function_____*/
            function validateStudentNumber(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please enter Number of students";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else if (!isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                } else {

                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Number of students can't be a letter";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                }
            }

            /*___Provine selection validation function___*/
            function validateProvince(text, errorLbl) {
                if (document.getElementById(text).value == "") {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "please select a Province";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }

            /*___Zonal selection validation function___*/
            function validateZonal(text, errorLbl) {
                if (document.getElementById(text).value == "") {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "please select a Zonal";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }

            /*___School Type selection validation function___*/
            function validateSchoolType(text, errorLbl) {
                if (document.getElementById(text).value == "") {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "please select a schoolType";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }


            /*___School destination latitude validation function___*/
            function validateLatitude(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please Select the Latitude";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else if (isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Invalid type";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }

            /*___School destination longtitude validation function___*/
            function validateLongtitude(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please Select the Longitude";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else if (isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Invalid type";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
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