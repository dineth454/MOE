
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

        <title>AddSchool</title>

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
                <?php include 'sidebar_min_off.php' ?>
                <!-- /#sidebar-wrapper -->
                <!-- /.navbar-collapse -->
            </nav>
            <div  id="page-content-wrapper" style="min-height: 540px;">
                <div class="row container-fluid" style="box-shadow: 1px 2px 5px #000000">
                    <div class="col-lg-7 " style="padding-left: 0px;">

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
                                    echo 'alert("School Added Succeccfully")';
                                    echo '</script>';
                                } else {
                                    echo '<script language = "javascript">';
                                    echo 'alert("error Occurd while inserting data")';
                                    echo '</script>';
                                }
                            }else{
                                
                                echo '<script language = "javascript">';
                                echo 'alert("Permission Denied")';
                                echo '</script>';
                            }
                        }
                        ?>

                        <div align="" style="padding-bottom:20px; padding-left:30px;">
                            <h1>Add School</h1>
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="return(validateForm())" novalidate>

                            <div class="row" >
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <div class="row">

                                    

                                        <div  class="form-group col-lg-12 col-md-12"  id="provinceIDDiv" style="margin-bottom:;">

                                            <label for="province Office" class="control-label  col-lg-5 col-xs-5  required" style="text-align: left; padding-left:30px;"> province Office :  </label>

                                            <div style="margin-bottom:;"   class="col-md-7 col-lg-7" >
                                                <select required class="form-control " name="provinceID" id="provinceID" onchange="showUser(this.value)">
                                                    <option value="" >Select Province Office</option>
                                                    <option value="1">centralProvince</option>
                                                    <option value="2">westernProvince</option>
                                                    <option value="3">sothernProvince</option>
                                                    <option value="4">NothernProvince</option>
                                                    <option value="5">esternProvince</option>
                                                </select>

                                                <label id="errorProvince" style="font-size:10px;"></label>
                                            </div>



                                        </div>


                                    
                                    </div>

                                    <div  class="row" style="padding-bottom:;">
                                        <div   class="form-group col-lg-12 col-md-12 col-sm-12" id="zonalOfficeDiv">
                                            <div id="zonalOfficeHidden" class="form-group">

                                                <label for="ZonalOffice" class="control-label col-lg-5 col-xs-5  required" style="text-align: left; padding-left:30px;"> Zonal Office :  </label>
                                                <div style="margin-bottom:;" class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                                    <select required class="form-control" name="zonalID"  id="zonalID" > </select>

                                                    <label id="errorZonal" style="font-size:10px;"></label>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- School Name-->
                                            <label for="School" class="control-label col-xs-5 col-lg-5 col-md-5  required" style="text-align: left; padding-left:30px;"> School Name/Address:  </label>
                                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="margin-top:">
                                                <input type="text" class="form-control" id="School" name="School"  placeholder="School Name"/>
                                                <label id="errorSchoolName" style="font-size:10px"> </label>

                                            </div>


                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                        <div  class="form-group"  id="SchoolType" style="margin-bottom:;">

                                            <label for="SchoolType" class="control-label col-xs-5 col-md-5 col-lg-5  required" style="text-align: left; padding-left:30px;"> SchoolType :  </label>

                                            <div style="margin-bottom:;"   class="col-xs-7 col-sm-7 col-md-7 col-lg-7" >
                                                <select required class="form-control " name="SchoolTypeSelect" id="SchoolTypeSelect">
                                                    <option value="">Select Type</option>
                                                    <option value="1">MIX</option>
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


                                        </div>


                                    </div>
                                    </div>
                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- No:OF:Students-->
                                            <label for="NoOfStudents" class="control-label col-xs-5 col-lg-5 col-md-5  required" style="text-align: left; padding-left:30px;"> No Of Students :  </label>
                                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="margin-top:">
                                                <input type="text" class="form-control" id="students" name="students"  placeholder="NOS"/>
                                                <label id="errorStudentNumber" style="font-size:10px"> </label>

                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Latitude-->
                                            <label for="Latitude" class="control-label col-xs-5 col-lg-5 col-md-5  required" style="text-align: left; padding-left:30px;"> Latitude :  </label>
                                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="margin-top:">
                                                <input type="text" class="form-control" id="latbox" name="lat"  placeholder="Latitude"/>

                                                <label id="errorLat" style="font-size:10px"> </label>

                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Longitude-->
                                            <label for="Longitude" class="control-label col-xs-5 col-lg-5 col-md-5 required" style="text-align: left; padding-left:30px;"> Longitude :  </label>
                                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="margin-top:">
                                                <input type="text" class="form-control" id="lngbox" name="lng"  placeholder="Longitude"/>

                                                <label id="errorLng" style="font-size:10px"> </label>

                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3"style="padding-left: 68px;">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                    <div style="height: 530px">
                        <!-- map -->
                        <div class="row" >
                            <div  class="form-group col-lg-5 col-md-5 col-sm-5" style="padding:0;">
                                <div class="container-fluid" style="padding-top:15px;">
                                    <div id="map-canvas" style="width:420px;height:530px;"></div>

                                </div>
                                <label style="font-size:10px; color: #146BA7;">Right Click on the map & drag to the place you want & get lat and long</label>
                            </div>
                        </div>

                        <!-- end map -->

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
                var pattern = /^[a-zA-Z_ ]*$/;
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

        
        <!-- Bootstrap Core JavaScript -->
        <script src = "../assets/js/addSchool.js"></script>
        <script src="../assets/js/jquery.js" ></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../assets/js/googlemap.js"></script>
        <script src="../assets/js/addSchoolMarker.js"></script>



    </body>
</html>