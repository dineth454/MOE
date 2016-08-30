    
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

        <div id="wrapper" > 

            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#020816;" role="navigation">

            

            <!-- include Navigation BAr -->
            <?php include 'navigation_bar_teacher.php' ?>
            
            <!-- Finished NAvigation bar -->
            <!-- Sidebar -->
            <?php include 'sidebar_teacher.php' ?>
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            </nav>
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">


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

                        <div align="center" style="padding-bottom:10px;">
                            <h1>My Profile</h1>
                        </div>
                        <!-- Check System admin or not -->
                        
                        
                        <div style="">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- NIC number-->
                                                <label for="firstName" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> NIC Number </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                   <!-- <input type="text" required class="form-control" value="<?php //echo $nicNumber; ?>" id="nic" name="nic" placeholder="Enter NIC number" disabled="true" /> -->
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                    <label> <?php echo $nicNumber; ?> </label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <!-- Select role-->
                                                <label for="selec_trole" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;">  Designation </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                  <?php if($designationTypeID == 1) { ?>
                                                    <?php if($nicNumber == '921003072V') {?>
                                                    <label > System Admin</label>
                                                    <?php } else {?>
                                                    <label > Ministry Officer</label>
                                                    
                                                    <?php }?>
                                                  <?php }else if($designationTypeID == 2) {?>
                                                        <label > Province Officer</label>
                                                        
                                                  <?php } else if($designationTypeID == 3) {?>
                                                        <label > Zonal Officer</label>
                                                        
                                                  <?php } else if( $designationTypeID == 4) {?>
                                                        <label > Principal</label>
                                                        
                                                  <?php } else {?>
                                                        <label > Teacher</label>
                                                       
                                                  <?php } ?>
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <?php if($searchUserProvinceId > 0) {?>
                                        
                                            <div class="row">
                                            <div  id="provinceIDDiv" class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="provinceHiddenForm" class="form-group">
                                                    <label for="province Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> province Office :  </label>

                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">

                                                        

                                                            <?php if ($searchUserProvinceId == 1) { ?>
                                                                <!--<option selected="true" value="1">centralProvince</option>-->
                                                                
                                                                <label >centralProvince</label>
                                                            <?php } else if ($searchUserProvinceId == 2) { ?>
                                                                
                                                                <label >westernProvince</label>
                                                                
                                                            <?php } else if ($searchUserProvinceId == 3) { ?>
                                                                
                                                                <label >sothernProvince</label>
                                                                
                                                            <?php } else if ($searchUserProvinceId == 4) { ?>
                                                                 <label >NothernProvince</label>
                                                              
                                                            <?php } else if ($searchUserProvinceId == 5) { ?>
                                                                 
                                                                 <label >esternProvince</label>
                                                                
                                                            <?php } else {
                                                                
                                                            }
                                                            ?>

                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php } ?>
                                        
                                        <?php if($searchUserZonalId > 0) { ?>
                                            
                                        <div class="row">
                                            <div id="zonalOfficeDiv"  class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="zonalOfficeHidden" class="form-group">
                                                    <label for="province Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Zonal Office :  </label>
                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
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
                                            </div>
                                        </div>
                                        <?php } ?>
                                        
                                        <?php if($searchUserSchoolId > 0) {?>
                                        <div class="row">
                                            <div  id="schoolIdDiv"  class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="schoolHidden" class="form-group">
                                                    <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> School : </label>
                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
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
                                            </div>
                                        </div>
                                        <?php } ?>
                                        
                                        <?php if($searchUserSubjectId > 0) {?>
                                        <div class="row">
                                            <div id="subjectHiddenDiv"  class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="subjectHidden" class="form-group">
                                                    <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Appoinment Subject :</label>
                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                       
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
                                            </div>
                                        </div>
                                        
                                        <?php  } ?>
                                        
                                        
                                        
   
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- Name with initials-->
                                                <label for="ini_name" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Name with Initials :</label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                   <!-- <input type="text" class="form-control" id="name" name="name" value="<?php echo $nameWithInitials; ?>" placeholder="Enter name with Initials"/>-->
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                    <label ><?php echo $nameWithInitials; ?></label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- Full Name-->
                                                <label for="fullName" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Full Name :</label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <!--<input type="text" class="form-control" id="fname"  name="fname" value="<?php echo $fullName; ?>" placeholder="Enter full name"/>-->
                                                    <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                                                    <label><?php echo $fullName; ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- Employment ID-->
                                                <label for="employ_ID" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Employment ID :</label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <!--<input type="text" class="form-control" id="eId" name="eId" value="<?php echo $employmentID; ?>" placeholder="Enter Emp ID"/>-->
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                    <label ><?php echo $employmentID; ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!--Email-->
                                                <label for="email" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Email :</label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                   <!-- <input type="email" class="form-control" id="email" value="<?php echo $emailAddress; ?>" name="email" placeholder="Enter email" required/> -->
                                                    <label><?php echo $emailAddress; ?></label>
                                                    <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">


                                                <!--Email-->
                                                <label for="address" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required"  style="display: inline-block; text-align: left;"> Current Address :</label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <!-- <input type="text" class="form-control" id="address" value="<?php echo $address; ?>" name="address" placeholder="Enter address" />-->
                                                    <label ><?php echo $address; ?></label>
                                                    <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- Gender-->
                                                <label for="gender" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Gender :</label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                     <?php if ($gender == 2) { ?>
                                                    
                                                    <label> Male </label>
                                                            
                                                           
                                                            
                                                            
                                                            <?php } else { ?>
                                                           
                                                    <label > Female </label>
                                                            <?php } ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!--Marrige-->
                                                <label for="marriage" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Marriage Status :</label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    
                                                            <?php if ($marrigeState == 2) { ?>
                                                    
                                                    <label> Yes </label>
                                                            
                                                           
                                                            
                                                            
                                                            <?php } else { ?>
                                                           
                                                    <label> No </label>
                                                            <?php } ?>
                                                   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!--mobile_numb-->
                                                <label for="mobile_numb" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Mobile Number :</label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                   <!--  <input type="text" class="form-control" id="mobileNm" value="<?php echo $mobileNumber; ?>" name="mobileNm" placeholder="Enter mobile Number"/>--
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                    <label> <?php echo $mobileNumber; ?></label>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-lg-5" style="position: fixed; top: 150px; left: 850px;"> 
                                                <img src="../images/addPerson.png" width="400" height="400">
                                        </div>
                                        

                                    </div>

                                </div>
                            </form>
                        </div>
                   </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
            <?php #session_unset();  ?>
<?php #session_destroy();   ?>



<?php include '../interfaces/footer.php' ?>

            <script src = "../assets/js/jquery-2.1.4.min.js"></script>
            <script src="../assets/js/jquery.js"></script>


            <script src="../assets/js/bootstrap.min.js"></script>
            


        </div>
    </body>

</html>
