<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Home</title>

        <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">

    </head>

    <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#" style="height: 80px;">
                            GTMS
                        </a>
                    </li>
                    <li>
                        <a class="active" href="interface_0.1.php">Home</a>
                    </li>
                    <li>
                        <a  data-toggle="collapse" href="#collapse1">Users</a>
                    </li>
                    <div id="collapse1" class="panel-collapse collapse">
                        <li>
                            <a class="active" href="addEmployee.php">Add User</a>
                        </li>
                        <li>
                            <a class="active" href="">View User</a>
                        </li>
                        <li>
                            <a class="active" href="#">Update User</a>
                        </li>
                        <li>
                            <a class="active" href="#">Delete User</a>
                        </li>
                    </div>
                    <li>
                        <a  data-toggle="collapse" href="#collapse2">Institutes</a>
                    </li>

                    <div id="collapse2" class="panel-collapse collapse">
                        <li>
                            <a class="active" href="#">Add Zonal</a>
                        </li>
                        <li>
                            <a class="active" href="#">Add School</a>
                        </li>

                    </div>
                    <li>
                        <a  data-toggle="collapse" href="#collapse3">View</a>
                    </li>

                    <div id="collapse3" class="panel-collapse collapse">
                        <li>
                            <a class="active" href="#">Province</a>
                        </li>
                        <li>
                            <a class="active" href="#">Zonal</a>
                        </li>
                        <li>
                            <a class="active" href="#">School</a>
                        </li>

                    </div>
                    <li>
                        <a  data-toggle="collapse" href="#collapse4">Edit</a>
                    </li>

                    <div id="collapse4" class="panel-collapse collapse">
                        <li>
                            <a class="active" href="#">Province</a>
                        </li>
                        <li>
                            <a class="active" href="#">Zonal</a>
                        </li>
                        <li>
                            <a class="active" href="#">School</a>
                        </li>

                    </div>
                    <li>
                        <a  data-toggle="collapse" href="#collapse5">Search</a>
                    </li>
                    <li>
                        <a href="mapview.php">Map View</a>
                    </li>

                </ul>
            </div>
            <!-- /#sidebar-wrapper -->
            <nav class="navbar navbar-default" style="height: 65px; border-radius:0px;">
                <div class="col-md-3 pull-right" style="margin-top: 18px;">
                    Nipuna Jayaweera 
                    <div class="pull-right"><a href="../classes/signout.php">Sign out</a></div>
                </div>

            </nav>
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">


                        <?php
                        require("../classes/Employee.php");
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
                            <h1>Add Employee</h1>
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

                                                    <?php
                                                    /*   //$sqlQuery = "select * from designation";

                                                      //$designationResult = $mysqli->query($sqlQuery);

                                                      $designationTypeResult = $employee->loadDesignation();

                                                      if(mysqli_num_rows($designationTypeResult) > 0 ){
                                                      while($row = mysqli_fetch_assoc($designationTypeResult)){
                                                      echo '<br>';
                                                      echo '<option value="'.$row['designationTypeID'].'" >'.$row['designation'].'</option>';
                                                      }

                                                      }
                                                     */
                                                    ?>


                                                </select>
                                                <!--<label id="errorMain" style="font-size:10px;"></label>-->
                                            </div>

                                            <!-- Packaging level-->

                                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <!-- hidden forms -->

                                                <div id="provinceHiddenForm" class="form-group">
                                                    <label>province Office : </label>
                                                    <select required class="form-control " name="provinceID" id="provinceID" onchange="showUser(this.value)">
                                                        <option value="" >Select ProvinceOffice</option>

                                                        <option value="1">centralProvince</option>
                                                        <option value="2">westernProvince</option>
                                                        <option value="3">sothernProvince</option>
                                                        <option value="4">NothernProvince</option>
                                                        <option value="5">esternProvince</option>
                                                    </select>
                                                </div>

                                                <div id="zonalOfficeHidden" class="form-group">
                                                    <label>Zonal Office :</label> 
                                                    <select required class="form-control" name="zonalID"  id="abc" onchange="loadSchool(this.value)"> </select>

                                                </div>
                                                <div id="schoolHidden" class="form-group">
                                                    <label>School :</label>
                                                    <select required class="form-control required" name="schoolId" id="abcd"  ></select>
                                                </div>

                                                <div id="subjectHidden">
                                                    Appoinment Subject : <select required class="form-control" name="subject" id="subject" >
                                                        <option value="none">Select subject</option>
                                                        <option value="1">Mathematics</option>
                                                    </select>
                                                </div>

                                                <!--end hidden forms -->
                                                <label id="errorPkg" style="font-size: 10px"> </label>
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

                                            <!-- Telephone-->
                                            <!--
            <label for="telephone" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Telephone </label>
                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    <input type="text" class="form-control" id="landNo" name="landNo" placeholder="Enter Telephone Number"/>
                                            <!--<label id="errorLastName" style="font-size:10px"> </label>
                                        </div>
                                                                            
                                            -->
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
        <!-- /#wrapper -->

        <!--footer-->
        <footer>
            <div class="footer">
                <div class="col-md-6 col-md-offset-2">
                    <ul class="footer-nav">
                        <li><a href="AboutUs.aspx">About</a></li>
                        <li><a href="Help.aspx">Help</a></li>
                        <li><a href="AdminSitemap.aspx">Site map</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-md-offset-2"> 
                    <div>
                        <a href="#" style="margin-left: 50px;">Developer site</a>
                        <img class="pull-right" src="../images/visa.png" style="width: 30px;">
                    </div>
                </div>
            </div>
        </footer>
        <!-- jQuery -->
        <script src="../assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
        <script src = "../assets/js/addEmployee.js"></script>



    </body>

</html>
