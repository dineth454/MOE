
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
                <div class="row container-fluid" style="padding-left: 15px;">
                    <div class="col-lg-7 " style="padding-left: 0px;">

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
                                echo '<script language = "javascript">';
                                echo 'alert("updated successfully")';
                                echo '</script>';
                            }else{
                                echo '<script language = "javascript">';
                                echo 'alert("Error Occured While Updating Data")';
                                echo '</script>';
                                
                            }
                            
                        }
                        ?>

                        <div align="" style="padding-bottom:30px; padding-left:15px; paadding-top:50px;">
                            <h1>Update School</h1>
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="return(validateForm())" novalidate>

                            <div class="row" >
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    

                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- School Name-->
                                            <label for="School" class="control-label col-xs-5 col-lg-5 col-md-5  required" style="text-align: left; padding-left:;"> School Name/Address:  </label>
                                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="margin-top: 0px">
                                                <input type="text" class="form-control" id="School" name="School" value="<?php echo $schoolName ;?>" placeholder="School Name"/>
                                                <label id="errorSchoolName" style="font-size:10px"> </label>

                                            </div>


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- No:OF:Students-->
                                            <label for="NoOfStudents" class="control-label col-xs-5 col-md-5 col-lg-5 required" style="text-align: left; padding-left:"> No Of Students :  </label>
                                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="margin-top: 0px">
                                                <input type="text" class="form-control" id="students" name="students" value="<?php echo $noOfStudents; ?>" placeholder="NOS"/>
                                                <label id="errorStudentNumber" style="font-size:10px"> </label>

                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Latitude-->
                                            <label for="Latitude" class="control-label col-xs-5 col-md-5 col-lg-5  required" style="text-align: left; padding-left:"> Latitude :  </label>
                                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="margin-top: 0px">
                                                <input type="text" class="form-control" id="latbox" name="lat" value="<?php echo $latitude;?>"  placeholder="Latitude"/>

                                                <label id="errorLat" style="font-size:10px"> </label>

                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Longitude-->
                                            <label for="Longitude" class="control-label col-xs-5 col-md-5 col-lg-5  required" style="text-align: left; padding-left:"> Longitude :  </label>
                                            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="margin-top: 0px">
                                                <input type="text" class="form-control" id="lngbox" name="lng" value="<?php echo $longtitude;?>" placeholder="Longitude"/>

                                                <label id="errorLng" style="font-size:10px"> </label>

                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-6 col-lg-6"style="padding-left: ;">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                    <div style="height: 530px">
                        <!-- map -->
                        <div  >
                            <div  class="form-group col-lg-4 col-md-4 col-sm-4" style="padding:0;">
                                <div class="container-fluid" style="padding:0;">
                                    <div id="map-canvas" style="width:420px;height:530px;"></div>

                                </div>
                                <label style="font-size:10px; color: #146BA7;">
                                Right Click on the map & drag to the place you want & get lat and long</label>
                            </div>
                        </div>

                        <!-- end map -->

                    </div>

                </div>

            </div>

        </div>

        <?php include '../interfaces/footer.php' ?>

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