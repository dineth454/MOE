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
        <link href="../assets/css/fonts_styles.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">

    </head>

    <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <?php include 'sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->

            <!-- include Navigation BAr -->
            <?php include 'navigationBar.php' ?>

            <!-- Finished NAvigation bar -->

            <!-- Page Content -->

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">


                        <?php
                        require("../classes/employee.php");
                        $employee = new Employee();

                        if (isset($_POST['submit'])) {
                            $nic = $roleType = $designation = $nameInitials = $fName = $empID = $email = $dob = $currentAddress = $gender = $marrigeState = $mobileNum = "";
                            $provinceID = $zoneID = $schoolId = $subjectID = "";
                            $nic = $_POST['nic'];
                            $roleType = $_POST['select_role'];
                            $designation = $_POST['designation'];
                            $nameInitials = $_POST['name'];
                            $fName = $_POST['fname'];
                            $empID = $_POST['eId'];
                            $email = $_POST['email'];
                            $dob = $_POST['dob'];
                            $currentAddress = $_POST['address'];
                            $gender = $_POST['gender'];
                            $marrigeState = $_POST['marrrige'];
                            $mobileNum = $_POST['mobileNm'];


                            //echo $designation;

                            if ($designation == '2') {
                                $provinceID = $_POST['provinceID'];
                            } else if ($designation == '3') {
                                $provinceID = $_POST['provinceID'];
                                $zoneID = $_POST['zonalID'];
                            } else if ($designation == '4') {
                                $provinceID = $_POST['provinceID'];
                                $zoneID = $_POST['zonalID'];
                                $schoolId = $_POST['schoolId'];
                            } else if ($designation == '5') {
                                $provinceID = $_POST['provinceID'];
                                $zoneID = $_POST['zonalID'];
                                $schoolId = $_POST['schoolId'];
                                $subjectID = $_POST['subject'];
                            } else {
                                $designation = $_POST['designation'];
                            }

                            $result = $employee->addEmployee($nic, $roleType, $designation, $nameInitials, $fName, $empID, $email, $dob, $currentAddress, $gender, $marrigeState, $mobileNum, $provinceID, $zoneID, $schoolId, $subjectID);






                            // echo $nic;
                        }
                        ?>

                        <div align="center" style="padding-bottom:10px;">
                            <h1 class="topic_font">Add Employee</h1>
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="validationForm();">

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- NIC number-->
                                            <label for="firstName" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> NIC Number </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" required class="form-control" id="nic" name="nic" placeholder="Enter NIC number"/>
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
                                                    <option value="">Select Role</option>
                                                    <option value="2">role2</option>
                                                    <option value="3">role3</option>
                                                    <option value="4">role4</option>
                                                    <option value="5">role5</option>

                                                    <?php
                                                    /*     $roleTypeResult = $employee->loadRoles();
                                                      if(mysqli_num_rows($roleTypeResult) > 0 ){
                                                      while($row = mysqli_fetch_assoc($roleTypeResult)){

                                                      echo $row['roleType'];
                                                      echo '<br>';
                                                      echo '<option value="'.$row['roleTypeID'].'" >'.$row['roleType'].'</option>';
                                                      }

                                                      }
                                                     */
                                                    ?>

                                                </select>
                                                <!--<label id="errorMain" style="font-size:10px;"></label>-->
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- Designation-->
                                            <label for="designation" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Designation </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <select required class="form-control" id="designation" name = "designation" onchange="selectionForm(this.value)">
                                                    <option value="">Select Designation</option>
                                                    <option value="1">ministryOfficer</option>
                                                    <option value="2">provincial Officer</option>
                                                    <option value="3">zonal Officer</option>
                                                    <option value="4">principal</option>
                                                    <option value="5">teacher</option>

                                                 </select>
                                                
                                            </div>

                                            <label id="errorPkg" style="font-size: 10px"> </label>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <span id="provinceHiddenForm">
                                                <div  class="form-group" style="display: none;" id="provinceIDDiv">

                                                    <label for="province Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="text-align: left;"> province Office :  </label>

                                                    <div   class="col-xs-6 col-sm-3 col-md-3 col-lg-3"  >
                                                        <select required class="form-control " name="provinceID" id="provinceID" onchange="showUser(this.value)">
                                                            <option value="" >Select ProvinceOffice</option>
                                                            <option value="1">centralProvince</option>
                                                            <option value="2">westernProvince</option>
                                                            <option value="3">sothernProvince</option>
                                                            <option value="4">NothernProvince</option>
                                                            <option value="5">esternProvince</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </span>

                                        </div>
                                    </div>

                                    <div  class="row">
                                        <div  style="display: none;" class="form-group col-lg-12 col-md-12 col-sm-12" id="zonalOfficeDiv">
                                            <div id="zonalOfficeHidden" class="form-group">
                                                
                                                <label for="Zonal Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style=" text-align: left;"> Zonal Office :  </label>
                                                <div  class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <select required class="form-control" name="zonalID"  id="abc" onchange="loadSchool(this.value)"> </select>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div id="schoolIdDiv" style="display: none; "class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div id="schoolHidden" class="form-group">
                                                <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="text-align: left;"> School : </label>
                                                <div  class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <select required class="form-control required" name="schoolId" id="abcd"  ></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div id="subjectHiddenDiv" style="display: none;" class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div id="subjectHidden" class="form-group">
                                                <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style=" text-align: left;"> Appoinment Subject :</label>
                                                <div id="subjectDiv" class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <select required class="form-control" name="subject" id="subject" >
                                                        <option value="none">Select subject</option>
                                                        <option value="1">Mathematics</option>
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
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name with Initials"/>
                                                <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                            </div>

                                            <!-- Full Name-->
                                            <label for="fullName" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Full Name </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter full name"/>
                                                <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Employment ID-->
                                            <label for="employ_ID" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Employment ID </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" class="form-control" id="eId" name="eId" placeholder="Enter Emp ID"/>
                                                <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                            </div>

                                            <!--Email-->
                                            <label for="email" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Email </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required/>
                                                <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Date of birth-->
                                            <label for="date_of_birth" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Date of Birth </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter DOB"/>
                                                <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                            </div>

                                            <!--Email-->
                                            <label for="address" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Current Address </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" />
                                                <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Gender-->
                                            <label for="gender" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Gender </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <select class="form-control" name= "gender" id = "gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="2">Male</option>
                                                    <option value="3">Female</option>
                                                </select> 
                                            </div>

                                            <!--Marrige-->
                                            <label for="marriage" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Marriage Status </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <select class="form-control" name = "marrrige" id = "marrrige">
                                                    <option value="">Select State</option>
                                                    <option value="2">Yes</option>
                                                    <option value="3">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!--mobile_numb-->
                                            <label for="mobile_numb" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Mobile Number </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" class="form-control" id="mobileNm" name="mobileNm" placeholder="Enter mobile Number"/>
                                                <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                            </div>


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </form>
                    </div>



                </div>
            </div>

            <!-- /#page-content-wrapper -->

        </div>

        <?php include 'footer.php' ?>
         
        <script src="../assets/js/jquery.js"></script>
        
        
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
        <script src = "../assets/js/addEmployee.js"></script>
        
        
        
        
        </body>
        
        </html>
