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
                        $roletypeID = $designationId = $LoggedUsernic = '';
                        $roletypeID = 1;
                        $designationId = 1;
                        $LoggedUsernic = '921003072v';
                        require("../classes/Employee.php");
                        $employee = new Employee();

                        if (isset($_POST['submit'])) {
                            global $LoggedUsernic;
                            $searchUsernic = "";

                            $searchUsernic = $_POST['nic'];

                            //  echo $searchUsernic;
                            // echo $LoggedUsernic;

                            $result = $employee->findEmployee($searchUsernic, $roletypeID, $designationId, $LoggedUsernic);
                            $Address = $result['currentAddress'];
                            $roletype = $result['roleType'];
                            //echo $result['marrigeState']; 

                           // echo $roletype;
                        }
                        ?>

                        <div align="center" style="padding-bottom:10px;">
                            <h1>Update Employee</h1>
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="validationForm();">

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- NIC number-->
                                            <label for="firstName" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;">Enter NIC Number </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" required class="form-control" id="nic" name="nic" placeholder="Enter NIC number"/>
                                                <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Find</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>



                        </form>



                        <div style="">
                            <form >
                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- NIC number-->
                                                <label for="firstName" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> NIC Number </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="text" required class="form-control" value="<?php echo $result['nic']; ?>" id="nic" name="nic" placeholder="Enter NIC number"/>
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

                                                        <?php if ($result['roleType'] == 2) { ?>

                                                            <option value="">Select Role</option>
                                                            <option selected="true" value="2" >role2</option>
                                                            <option value="3">role3</option>
                                                            <option value="4">role4</option>
                                                            <option value="5">role5</option>

                                                        <?php } else if ($result['roleType'] == 3) { ?>

                                                            <option  value="2">role2</option>
                                                            <option selected="true" value="3">role3</option>
                                                            <option value="4">role4</option>
                                                            <option value="5">role5</option>

                                                        <?php } else if ($result['roleType'] == 4) { ?>

                                                            <option  value="2">role2</option>
                                                            <option  value="3">role3</option>
                                                            <option selected="true" value="4">role4</option>
                                                            <option value="5">role5</option>
                                                        <?php } else if ($result['roleType'] == 5) { ?>
                                                            <option  value="2">role2</option>
                                                            <option  value="3">role3</option>
                                                            <option  value="4">role4</option>
                                                            <option selected="true" value="5" >role5</option>
                                                        <?php } else {
                                                            
                                                        } ?>

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
                                                    <!--<label id="errorMain" style="font-size:10px;"></label>-->
                                                </div>
                                                <!--end hidden forms -->
                                                <label id="errorPkg" style="font-size: 10px"> </label>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="provinceHiddenForm" class="form-group">
                                                    <label for="province Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> province Office :  </label>

                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
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
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="zonalOfficeHidden" class="form-group">
                                                    <label for="province Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Zonal Office :  </label>
                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                        <select required class="form-control" name="zonalID"  id="abc" onchange="loadSchool(this.value)"> </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="schoolHidden" class="form-group">
                                                    <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> School : </label>
                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                        <select required class="form-control required" name="schoolId" id="abcd"  ></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="subjectHidden" class="form-group">
                                                    <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Appoinment Subject :</label>
                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
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
                                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $result['nameWithInitials']; ?>" placeholder="Enter name with Initials"/>
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                </div>

                                                <!-- Full Name-->
                                                <label for="fullName" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Full Name </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="text" class="form-control" id="fname"  name="fname" value="<?php echo $result['fullName']; ?>" placeholder="Enter full name"/>
                                                    <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- Employment ID-->
                                                <label for="employ_ID" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Employment ID </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="text" class="form-control" id="eId" name="eId" value="<?php echo $result['employeementID']; ?>" placeholder="Enter Emp ID"/>
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                </div>

                                                <!--Email-->
                                                <label for="email" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Email </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="email" class="form-control" id="email" value="<?php echo $result['email']; ?>" name="email" placeholder="Enter email" required/>
                                                    <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">


                                                <!--Email-->
                                                <label for="address" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required"  style="display: inline-block; text-align: left;"> Current Address </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="text" class="form-control" id="address" value="<?php echo $Address; ?>" name="address" placeholder="Enter address" />
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
<?php if (($result['gender']) == 2) { ?>

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
                                                    <select class="form-control" name = "marrrige" value="<?php echo $result['marrigeState']; ?>" id = "marrrige">
<?php if ($result['marrigeState'] == 2) { ?>
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
                                                    <input type="text" class="form-control" id="mobileNm" value="<?php echo $result['mobileNum']; ?>" name="mobileNm" placeholder="Enter mobile Number"/>
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


            <script src = "../assets/js/addEmployee.js"></script>

            <?php include 'footer.php' ?>

            <script src="../assets/js/jquery.js"></script>


            <script src="../assets/js/bootstrap.min.js"></script>
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>
            <script src = "../assets/js/addEmployee.js"></script>


        </div>
    </body>

</html>
