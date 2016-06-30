    
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>View Profile Details</title>
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
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">


    </head>

    <body>

        <div id="wrapper" > 
            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#020816;" role="navigation">

            

            <!-- include Navigation BAr -->
            <?php include '../interfaces/navigation_bar.php' ?>
            
            <!-- Finished NAvigation bar -->
            <!-- Sidebar -->
            <?php 
            include 'Extended_principle_sidebar_activation.php';
            include 'Extended_principle_sidebar.php';?>
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            </nav>
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid";>
                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">


                        <?php
                        //get session attribute Values

                        require '../classes/employee.php';
                        $employee = new Employee();

                        $designationTypeID = $_SESSION["designationTypeID"];
                       // echo $designationTypeID;
                        $nicNumber = $_SESSION["nic"];
                        $roleType = $_SESSION["roleTypeID"];
                        $fullName = $_SESSION["fullName"];
                        $nameWithInitials = $_SESSION["nameWithInitials"];
                       // echo  $nameWithInitials;
                        $employmentID = $_SESSION["employementID"];
                        $emailAddress = $_SESSION["email"];
                        $address = $_SESSION["currentAdderss"];
                         $gender = $_SESSION["gender"];
                        $marrigeState = $_SESSION["marrageState"];
                        $mobileNumber = $_SESSION["mobile"];
                        
                        // Initialize Variables
                        $searchUserSubjectId = 0;
                        $searchUserSchoolId = 0;
                        $searchUserZonalId = 0;
                        $searchUserProvinceId = 0;
                        
                        // Get The result
                        
                            $result1 = $employee->findProvinceOfficerDetails($nicNumber);
                            $result2 = $employee->getZonalOfficerDetails($nicNumber);
                            $result3 = $employee->getPrincipalTeacherBasicDetails($nicNumber);
                            $result4 = $employee->getTeacherSubjectDetails($nicNumber);
                        
                        
                        //$searchUserProvinceId =  $result3['provinceOfficeID'];
                        
                        //Sys admin or ministry Officer
                        if($designationTypeID == 1){
                            $designationTypeID = $_SESSION["designationTypeID"];
                       // echo $designationTypeID;
                            $nicNumber = $_SESSION["nic"];
                            $roleType = $_SESSION["roleTypeID"];
                            $fullName = $_SESSION["fullName"];
                            $nameWithInitials = $_SESSION["nameWithInitials"];
                           // echo  $nameWithInitials;
                            $employmentID = $_SESSION["employementID"];
                            $emailAddress = $_SESSION["email"];
                            $address = $_SESSION["currentAdderss"];
                             $gender = $_SESSION["gender"];
                            $marrigeState = $_SESSION["marrageState"];
                            $mobileNumber = $_SESSION["mobile"];

                            //Province Officer
                        }else if($designationTypeID == 2){
                            $searchUserProvinceId = $result1['provinceID'];
                        
                            //zonal Officer
                        }else if($designationTypeID == 3){
                            $searchUserProvinceId = $result2['provinceOfficeID'];
                            $searchUserZonalId= $result2['zonalID'];
                           //Principal 
                        }else if($designationTypeID == 4){
                            $searchUserProvinceId =  $result3['provinceOfficeID'];
                            $searchUserZonalId =  $result3['zonalOfficeID'];
                            $searchUserSchoolId =  $result3['schoolID'];
                            //teacher
                        }else{
                            $searchUserProvinceId =  $result3['provinceOfficeID'];
                            $searchUserZonalId =  $result3['zonalOfficeID'];
                            $searchUserSchoolId =  $result3['schoolID'];
                            $searchUserSubjectId = $result4['appoinmentSubject'];
                        }

                       
                        if (isset($_POST['submit'])) {

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

                            $resultUpdated = $employee->updateEmployeeBasic($nicNumber, $role_subitted, $nameInitialsSubmitted, $nameFullUpdated, $eIDSubmitted, $emailUpdated, $addressUpdated, $genderUpdated, $merrageUpdated, $mobileUpdated);
                            if ($resultUpdated == 1) {

                                echo '<script language="javascript">';
                                echo 'alert("Updated SuccessFully.Thankyou")';
                                echo '</script>';
                                // header("Location: updateEmployeeFront.php");
                            } else {
                                echo '<script language="javascript">';
                                echo 'alert("Error Occured While Updating.Thankyou")';
                                echo '</script>';
                            }
                        }
                        ?>

                        <div class="row">
                            <div class="col-lg-7">
                                <h1 style="padding-bottom:40px; padding-left: 28px;"><strong>My Profile</strong></h1>

                        <!-- Check System admin or not -->   
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <div class="form-group col-lg-12">
                                                <!-- NIC number-->
                                                <div class="col-lg-6"><label> NIC Number </label></div>
                                                <div class="col-lg-6"><label><?php echo $nicNumber; ?></label></div>
                                            </div>


                                            <div class="form-group col-lg-12">
                                                <!-- Designation-->
                                                <div class="col-lg-6"><label>Designation</label></div>
                                                <div class="col-lg-6">
                                                  <?php if($designationTypeID == 1) { ?>
                                                    <?php if($nicNumber == '921003072V') {?>
                                                    <label>System Admin</label>
                                                    <?php } else {?>
                                                    <label>Ministry Officer</label>
                                                    <label><?php echo '(role'. $roleType . ')'; ?></label>
                                                    <?php }?>
                                                  <?php }else if($designationTypeID == 2) {?>
                                                        <label>Province Officer</label>
                                                        <label><?php echo '(role'. $roleType . ')'; ?></label>
                                                  <?php } else if($designationTypeID == 3) {?>
                                                        <label>Zonal Officer</label>
                                                        <label><?php echo '(role'. $roleType . ')'; ?></label>
                                                  <?php } else if( $designationTypeID == 4) {?>
                                                        <label>Principal</label>
                                                        <label><?php echo '(role'. $roleType . ')'; ?></label>
                                                  <?php } else {?>
                                                        <label>Teacher</label>
                                                        <label><?php echo '(role'. $roleType . ')'; ?></label>
                                                  <?php } ?>
                                                </div>
                                            </div>

                                        
                                        <?php if($searchUserProvinceId > 0) {?>
                                        
                                            <div  id="provinceIDDiv" class="form-group col-lg-12">
                                                <div id="provinceHiddenForm" class="col-lg-6">
                                                    <label>Province Office</label></div>
                                                    <div class="col-lg-6">
                                                            <?php if ($searchUserProvinceId == 1) { ?>
                                                                <!--<option selected="true" value="1">centralProvince</option>-->
                                                                
                                                                <label>Central Province</label>
                                                            <?php } else if ($searchUserProvinceId == 2) { ?>
                                                                
                                                                <label>Western Province</label>
                                                                
                                                            <?php } else if ($searchUserProvinceId == 3) { ?>
                                                                
                                                                <label>Southern Province</label>
                                                                
                                                            <?php } else if ($searchUserProvinceId == 4) { ?>
                                                                 <label>Northern Province</label>
                                                              
                                                            <?php } else if ($searchUserProvinceId == 5) { ?>
                                                                 
                                                                 <label>Eastern Province</label>
                                                                
                                                            <?php } else {
                                                                
                                                            }
                                                            ?>
                                                    </div>
                                            </div>
                                        
                                        <?php } ?>
                                        
                                        <?php if($searchUserZonalId > 0) { ?>
                                            
                                            <div id="zonalOfficeDiv"  class="form-group col-lg-12">
                                                <div id="zonalOfficeHidden" class="col-lg-6">
                                                    <label>Zonal Office</label></div>
                                                    <div class="col-lg-6">
                                                        <?php
                                                            $result = $employee->loadZonalOffices();

                                                            foreach ($result as $array) {
                                                                if ($array['zonalID'] == $searchUserZonalId) {
                                                                    echo '<label selected = "true" value="' . $array['zonalID'] . '" >' . $array['zonalName'] . '</label>';
                                                                }
                                                            }
                                                            ?>
                                                    </div>
                                            </div>

                                        <?php } ?>
                                        
                                        <?php if($searchUserSchoolId > 0) {?>

                                            <div  id="schoolIdDiv"  class="form-group col-lg-12">
                                                <div id="schoolHidden" class="col-lg-6">
                                                    <label>School</label></div>
                                                    <div class="col-lg-6">
                                                          <?php
                                                            $result = $employee->loadSchools();

                                                            foreach ($result as $array) {
                                                                if ($array['schoolID'] == $searchUserSchoolId) {
                                                                    echo '<label selected = "true" value="' . $array['schoolID'] . '" >' . $array['schoolName'] . '</label>';
                                                                }
                                                            }
                                                            ?>
                                                    </div>
                                            </div>

                                        <?php } ?>
                                        
                                        <?php if($searchUserSubjectId > 0) {?>
                                            <div id="subjectHiddenDiv"  class="form-group col-lg-12">
                                                <div id="subjectHidden" class="col-lg-6">
                                                    <label>Appoinment Subject</label></div>
                                                    <div class="col-lg-6">
                                                       
                                                            <?php
                                                            $result = $employee->loadSubjects();

                                                            foreach ($result as $array) {
                                                                if ($array['subjectID'] == $searchUserSubjectId) {
                                                                    echo '<label selected = "true" value="' . $array['subjectID'] . '" >' . $array['subject'] . '</label>';
                                                                    
                                                                    
                                                                    
                                                                }
                                                            }
                                                            ?>
                                                    </div>
                                                
                                            </div>

                                        
                                        <?php  } ?>
                                        

                                            <div class="form-group col-lg-12">
                                                <!-- Name with initials-->
                                                <div class="col-lg-6"><label>Name with Initials</label></div>
                                                <div class="col-lg-6">
                                                    <label><?php echo $nameWithInitials; ?></label>
                                                </div>
                                            </div>


                                            <div class="form-group col-lg-12">
                                                <!-- Full Name-->
                                                <div class="col-lg-6"><label>Full Name</label></div>
                                                <div class="col-lg-6">
                                                    <label ><?php echo $fullName; ?></label>
                                                </div>
                                            </div>


                                            <div class="form-group col-lg-12">
                                                <!--Email-->
                                                <div class="col-lg-6"><label>Email</label></div>
                                                <div class="col-lg-6">
                                                    <label ><?php echo $emailAddress; ?></label>
                                                </div>
                                            </div>


                                            <div class="form-group col-lg-12">
                                                <!-- Employment ID-->
                                                <div class="col-lg-6"><label>Employment ID</label></div>
                                                <div class="col-lg-6">
                                                    <label ><?php echo $employmentID; ?></label>
                                                </div>
                                            </div>


                                            <div class="form-group col-lg-12">
                                                <!--Email-->
                                                <div class="col-lg-6"><label>Current Address</label></div>
                                                <div class="col-lg-6">
                                                    <label> <?php echo $address; ?></label>
                                                </div>
                                            </div>


                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <!-- Gender-->
                                                <div class="col-lg-6"><label>Gender</label></div>
                                                <div class="col-lg-6">
                                                     <?php if ($gender == 2) { ?>
                                                    
                                                    <label>Male</label>
                                                            <?php } else { ?>
                                                           
                                                    <label>Female</label>
                                                            <?php } ?>
                                                </div>
                                            </div>


                                            <div class="form-group col-lg-12">
                                                <!--Marrige-->
                                                <div class="col-lg-6"><label>Marriage Status</label></div>
                                                <div class="col-lg-6">
                                                            <?php if ($marrigeState == 2) { ?>
                                                    <label>Yes</label>

                                                            <?php } else { ?>   
                                                    <label>No</label>
                                                            <?php } ?>  
                                                </div>
                                            </div>


                                            <div class="form-group col-lg-12">
                                                <!--mobile_numb-->
                                                <div class="col-lg-6"><label>Mobile Number</label></div>
                                                <div class="col-lg-6">
                                                   <!--  <input type="text" class="form-control" id="mobileNm" value="<?php echo $mobileNumber; ?>" name="mobileNm" placeholder="Enter mobile Number"/>--
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                    <label> <?php echo $mobileNumber; ?></label>
                                                </div>
                                            </div>

                                        <div class="col-lg-5" style="position: fixed; top: 150px; left: 850px;"> 
                                                <img src="../images/personDetails.png" width="400" height="400">
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                   </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
            <?php #session_unset();  ?>
<?php #session_destroy();   ?>


</br></br>
<?php include '../interfaces/footer.php' ?>

            <script src = "../assets/js/jquery-2.1.4.min.js"></script>
            <script src="../assets/js/jquery.js"></script>
            <script src="../assets/js/bootstrap.min.js"></script>


        </div>
    </body>

</html>
