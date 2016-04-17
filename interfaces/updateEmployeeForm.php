<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Home</title>


        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">


        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">
        <link href="../assets/css/fonts_styles.css" rel="stylesheet">

    </head>

    <body>

        <div id="wrapper" > 

            <!-- Sidebar -->
            <?php include 'sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->

            <!-- include Navigation BAr -->
            <?php include 'navigationBar.php' ?>

            <!-- Finished NAvigation bar -->
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">


                        <?php
                        //get session attribute Values

                        require '../classes/employee.php';
                        $employee = new Employee();

                        $designationTypeID = $_SESSION['designationType'];
                        $address = $_SESSION['Address'];
                        $roleType = $_SESSION['roleType'];
                        $nicNumber = $_SESSION['nicNumber'];
                        $nameWithInitials = $_SESSION['nameWithInitials'];
                        $fullName = $_SESSION['fullName'];
                        $employmentID = $_SESSION['employementID'];
                        $emailAddress = $_SESSION['emailAddress'];
                        $gender = $_SESSION['gender'];
                        $marrigeState = $_SESSION['marrigeState'];
                        $mobileNumber = $_SESSION['mobileNumber'];

                        // province Officer kenek nam
                        if ($designationTypeID == 2) {
                            $searchUserProvinceId = $_SESSION['proviceIDSearchUser'];
                        }
                        // zonal officer kenek nam
                        if ($designationTypeID == 3) {
                            $searchUserProvinceId = $_SESSION['proviceIDSearchUser'];
                            $searchUserZonalId = $_SESSION['zonalIdSearchUser'];
                        }
                        // principal kenek nam
                        if ($designationTypeID == 4) {

                            $searchUserProvinceId = $_SESSION['proviceIDSearchUser'];
                            $searchUserZonalId = $_SESSION['zonalIdSearchUser'];
                            $searchUserSchoolId = $_SESSION['schoolIdSearchUser'];
                        }
                        // teacher kenek nam
                        if ($designationTypeID == 5) {
                            $searchUserProvinceId = $_SESSION['proviceIDSearchUser'];
                            $searchUserZonalId = $_SESSION['zonalIdSearchUser'];
                            $searchUserSchoolId = $_SESSION['schoolIdSearchUser'];
                            $searchUserSubjectId = $_SESSION['subjectIdSearchUser'];
                        }



                        // echo $_SESSION['designationType'];
                        if (isset($_POST['submit'])) {
                            
                            //$nicSubmitted = $_POST['nic'];
                           
                           // echo $nicNumber;
                           // echo 'kalinga';
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
                            
                            $resultUpdated = $employee->updateEmployeeBasic($nicNumber,$role_subitted,$nameInitialsSubmitted,$nameFullUpdated,$eIDSubmitted,$emailUpdated,$addressUpdated,$genderUpdated,$merrageUpdated,$mobileUpdated);
                            if($resultUpdated == 1){
                                
                                echo '<script language="javascript">';
                                echo 'alert("Updated SuccessFully.Thankyou")';
                                echo '</script>';
                               // header("Location: updateEmployeeFront.php");
                            }else{
                                echo '<script language="javascript">';
                                echo 'alert("Error Occured While Updating.Thankyou")';
                                echo '</script>';
                            }
                            
                            
                        }
                        ?>

                        <div align="center" style="padding-bottom:10px;">
                            <h1>Update Employee Basic Details</h1>
                        </div>
                        <div style="">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- NIC number-->
                                                <label for="firstName" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> NIC Number </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="text" required class="form-control" value="<?php echo $nicNumber; ?>" id="nic" name="nic" placeholder="Enter NIC number" disabled="true" />
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <!-- Select role-->
                                                <label for="selec_trole" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Select Role </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <select required class="form-control" id="select_role" name="select_role" >

                                                        <?php if ($roleType == 2) { ?>

                                                            <option value="">Select Role</option>
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
                                                    <!--<label id="errorMain" style="font-size:10px;"></label>-->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-12  col-md-12 col-sm-12">
                                                <!-- Designation-->
                                                <label for="designation" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Designation </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <select disabled="true" required class="form-control" id="designation" name = "designation" >
                                                        <?php if ($designationTypeID == 1) { ?>
                                                            <option value="">Select Designation</option>
                                                            <option value="1" selected="true">ministryOfficer</option>
                                                            <option value="2">provincial Officer</option>
                                                            <option value="3">zonal Officer</option>
                                                            <option value="4">principal</option>
                                                            <option value="5">teacher</option>
                                                        <?php } else if ($designationTypeID == 2) { ?>
                                                            <option value="">Select Designation</option>
                                                            <option value="1" >ministryOfficer</option>
                                                            <option value="2" selected="true">provincial Officer</option>
                                                            <option value="3">zonal Officer</option>
                                                            <option value="4">principal</option>
                                                            <option value="5">teacher</option>
                                                        <?php } else if ($designationTypeID == 3) { ?>
                                                            <option value="">Select Designation</option>
                                                            <option value="1" >ministryOfficer</option>
                                                           <option value="2" >provincial Officer</option>
                                                            <option value="3" selected="true">zonal Officer</option>
                                                            <option value="4">principal</option>
                                                            <option value="5">teacher</option>
                                                        <?php } else if ($designationTypeID == 4) { ?>
                                                            <option value="">Select Designation</option>
                                                            <option value="1" >ministryOfficer</option>
                                                            <option value="2" >provincial Officer</option>
                                                            <option value="3" >zonal Officer</option>
                                                            <option value="4" selected="true">principal</option>
                                                            <option value="5">teacher</option>
                                                        <?php } else { ?>
                                                            <option value="">Select Designation</option>
                                                            <option value="1" >ministryOfficer</option>
                                                            <option value="2" >provincial Officer</option>
                                                            <option value="3" >zonal Officer</option>
                                                            <option value="4">principal</option>
                                                            <option value="5" selected="true">teacher</option>
                                                        <?php } ?>
                                                    </select>
                                                    <!--<label id="errorMain" style="font-size:10px;"></label>-->
                                                </div>
                                                <!--end hidden forms -->
                                                <label id="errorPkg" style="font-size: 10px"> </label>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div  id="provinceIDDiv" class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="provinceHiddenForm" class="form-group">
                                                    <label for="province Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> province Office :  </label>

                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">

                                                        <select required disabled="true" class="form-control " name="provinceID" id="provinceID" >

                                                            <?php if ($searchUserProvinceId == 1) { ?>
                                                                <option value="" >Select ProvinceOffice</option>

                                                                <option selected="true" value="1">centralProvince</option>
                                                                <option value="2">westernProvince</option>
                                                                <option value="3">sothernProvince</option>
                                                                <option value="4">NothernProvince</option>
                                                                <option value="5">esternProvince</option>
                                                            <?php } else if ($searchUserProvinceId == 2) { ?>
                                                                <option value="" >Select ProvinceOffice</option>

                                                                <option  value="1">centralProvince</option>
                                                                <option selected="true" value="2">westernProvince</option>
                                                                <option value="3">sothernProvince</option>
                                                                <option value="4">NothernProvince</option>
                                                                <option value="5">esternProvince</option>
                                                            <?php } else if ($searchUserProvinceId == 3) { ?>
                                                                <option value="" >Select ProvinceOffice</option>

                                                                <option  value="1">centralProvince</option>
                                                                <option  value="2">westernProvince</option>
                                                                <option selected="true"  value="3">sothernProvince</option>
                                                                <option value="4">NothernProvince</option>
                                                                <option value="5">esternProvince</option>
                                                            <?php } else if ($searchUserProvinceId == 4) { ?>
                                                                <option value="" >Select ProvinceOffice</option>

                                                                <option  value="1">centralProvince</option>
                                                                <option  value="2">westernProvince</option>
                                                                <option   value="3">sothernProvince</option>
                                                                <option selected="true" value="4">NothernProvince</option>
                                                                <option value="5">esternProvince</option>
                                                            <?php } else { ?>
                                                                <option value="" >Select ProvinceOffice</option>

                                                                <option  value="1">centralProvince</option>
                                                                <option  value="2">westernProvince</option>
                                                                <option   value="3">sothernProvince</option>
                                                                <option  value="4">NothernProvince</option>
                                                                <option selected="true" value="5">esternProvince</option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div id="zonalOfficeDiv"  class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="zonalOfficeHidden" class="form-group">
                                                    <label for="province Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Zonal Office :  </label>
                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                        <select disabled="true"  required class="form-control" name="zonalID"  id="abc" >  
                                                            <?php
                                                            
                                                            $result = $employee->loadZonalOffices();

                                                            foreach ($result as $array) {
                                                                if ($array['zonalID'] == $searchUserZonalId) {
                                                                    echo '<option selected = "true" value="' . $array['zonalID'] . '" >' . $array['zonalName'] . '</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div  id="schoolIdDiv"  class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="schoolHidden" class="form-group">
                                                    <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> School : </label>
                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                        <select disabled="true" class="form-control required" name="schoolId" id="abcd"  >
                                                            <?php
                                                           
                                                            $result = $employee->loadSchools();

                                                            foreach ($result as $array) {
                                                                if ($array['schoolID'] == $searchUserSchoolId) {
                                                                    echo '<option selected = "true" value="' . $array['schoolID'] . '" >' . $array['schoolName'] . '</option>';
                                                                }
                                                            }
                                                            
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div id="subjectHiddenDiv"  class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="subjectHidden" class="form-group">
                                                    <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Appoinment Subject :</label>
                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                        <select disabled="true" required class="form-control" name="subject" id="subject" >
                                                        
                                                          <!--  <?php if ($searchUserSubjectId == 1) { ?>
                                                                <option value="none">Select subject</option>
                                                                <option selected="true" value="1">Mathematics</option>
                                                                <option  value="2">Science</option>
                                                                <option  value="3">Buddhism</option>
                                                            <?php } else if ($searchUserSubjectId == 2) { ?>
                                                                <option  value="none">Select subject</option>
                                                                <option  value="1">Mathematics</option>
                                                                <option selected="true" value="2">Science</option>
                                                                <option  value="3">Buddhism</option>
                                                            <?php } else if ($searchUserSubjectId == 3) { ?>
                                                                <option  value="none">Select subject</option>
                                                                <option  value="1">Mathematics</option>
                                                                <option  value="2">Science</option>
                                                                <option selected="true"  value="3">Buddhism</option>
                                                            <?php } else { ?>
                                                                <option selected="true"  value="none">Select subject</option>
                                                                <option  value="1">Mathematics</option>
                                                                <option  value="2">Science</option>
                                                                <option   value="3">Buddhism</option>
                                                            <?php } ?> 
                                                            -->
                                                                <?php
                                                           
                                                            $result = $employee->loadSubjects();

                                                            foreach ($result as $array) {
                                                                if ($array['subjectID'] == $searchUserSubjectId) {
                                                                    echo '<option selected = "true" value="' . $array['subjectID'] . '" >' . $array['subject'] . '</option>';
                                                                }
                                                            }
                                                            
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!--___________________________________________________________-->

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- Name with initials-->
                                                <label for="ini_name" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Name with Initials </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $nameWithInitials; ?>" placeholder="Enter name with Initials"/>
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                </div>

                                                <!-- Full Name-->
                                                <label for="fullName" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Full Name </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="text" class="form-control" id="fname"  name="fname" value="<?php echo $fullName; ?>" placeholder="Enter full name"/>
                                                    <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- Employment ID-->
                                                <label for="employ_ID" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Employment ID </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="text" class="form-control" id="eId" name="eId" value="<?php echo $employmentID; ?>" placeholder="Enter Emp ID"/>
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                </div>

                                                <!--Email-->
                                                <label for="email" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Email </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="email" class="form-control" id="email" value="<?php echo $emailAddress; ?>" name="email" placeholder="Enter email" required/>
                                                    <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">


                                                <!--Email-->
                                                <label for="address" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required"  style="display: inline-block; text-align: left;"> Current Address </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="text" class="form-control" id="address" value="<?php echo $address; ?>" name="address" placeholder="Enter address" />
                                                    <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- Gender-->
                                                <label for="gender" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Gender </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <select class="form-control" name= "gender" value="" id = "gender">
                                                        <?php if ($gender == 2) { ?>

                                                            <option value="">Select Gender</option>
                                                            <option selected="true" value="2">Male</option>
                                                            <option  value="3">Female</option>
                                                        <?php } else { ?>
                                                            <option value="2">Male</option>
                                                            <option selected="true" value="3">Female</option>
                                                        <?php } ?>
                                                    </select> 

                                                </div>

                                                <!--Marrige-->
                                                <label for="marriage" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Marriage Status </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <select class="form-control" name = "marrrige" value="<?php echo $marrigeState; ?>" id = "marrrige">
                                                        <?php if ($marrigeState == 2) { ?>
                                                            <option value="">Select State</option>
                                                            <option selected="true" value="2">Yes</option>
                                                            <option value="3">No</option>
                                                        <?php } else { ?>
                                                            <option  value="2">Yes</option>
                                                            <option selected="true" value="3">No</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!--mobile_numb-->
                                                <label for="mobile_numb" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Mobile Number </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="text" class="form-control" id="mobileNm" value="<?php echo $mobileNumber; ?>" name="mobileNm" placeholder="Enter mobile Number"/>
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                </div>


                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>
            <!-- /#page-content-wrapper -->
           <?php #session_unset(); ?>
            <?php #session_destroy(); ?>

            

            <?php include 'footer.php' ?>


            <script src="../assets/js/jquery.js"></script>


            <script src="../assets/js/bootstrap.min.js"></script>
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>
            


        </div>
    </body>

</html>
