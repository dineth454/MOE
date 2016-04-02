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
    <link href="../assets/css/smallbox.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-lg-3">
        
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Admin
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>



    <div class="col-lg-9">
        

        <?php 
    
            require("../classes/Employee.php");
            $employee = new Employee();

            if (isset($_POST['submit'])) {
                $nic = "";
                $nic = $_POST['nic'];
                echo $nic;
        
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
                                        <input type="text" class="form-control" id="nic" name="nic" placeholder="Enter NIC number"/>
                                        <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                    </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <!-- Select role-->
                                <label for="selec_trole" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Select Role </label>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                        <select class="form-control" id="select_role" name="select_role">
                                            <option value="">Select Role</option>
											<option value="1">sysAdmin</option>
											<option value="2">role2</option>
											<option value="3">role3</option>
											<option value="4">role5</option>
											<option value="5">role6</option>
                                                
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
                                    <select class="form-control" id="designation" name = "designation" onchange="selectionForm(this.value)">
                                        <option value="none">Select Designation</option>
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
                                            <select class="form-control">
                                                <option value="none">Select ProvinceOffice</option>
                                            </select>
                                        </div>
                                        <div id = "zonalOfficeHidden" class="form-group">
                                            <label>Zonal Office :</label> 
                                            <select class="form-control">
                                                <option value="none">Select Zonal Office</option>
                                            </select>
                                        </div>
                                        <div id = "schoolHidden" class="form-group">
                                            <label>School :</label>
                                            <select class="form-control">
                                                <option value="none">Select School</option>
                                            </select>
                                        </div>
										
										<div id = "subjectHidden">
											Appoinment Subject : <select class="form-control">
											<option value="none">Select subject</option>
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
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required/>
                                        <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                <!-- Gender-->
                                <label for="gender" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Gender </label>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                       <select class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="2">Male</option>
                                            <option value="3">Female</option>
                                        </select> 
                                    </div>

                                <!--Marrige-->
                                <label for="marriage" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Marriage Status </label>
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                        <select class="form-control">
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


<script src = "../assets/js/jquery-2.1.4.min.js"></script>
<script src = "../assets/js/addEmployee.js"></script>
    


</body>