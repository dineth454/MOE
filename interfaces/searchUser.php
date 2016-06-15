<?php
ob_start();
?>
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
                        //get session data of logged user
                        $roletypeID = $_SESSION["roleTypeID"];
                        $designationIdLoggedUser = $_SESSION["designationTypeID"];
                        $LoggedUsernic = $_SESSION["nic"];

                        //import employee class and related funcyions
                        require("../classes/employee.php");
                        $employee = new Employee();

                        $result1 = $employee->getProvinceIdOfLoggedUser($LoggedUsernic);
                        $provinceIdLoggedUser = $result1['provinceID'];

                        $result2 = $employee->getZonalIDLoggedUser($LoggedUsernic);
                        $zonalIdLoggedUser = $result2['zonalID'];

                        $result3 = $employee->getSchoolIDOfLoggedUser($LoggedUsernic);
                        $schoolIDLoggedUser = $result3['schoolID'];

                        ?>

                        


                        <div align="center" style="padding-bottom:10px;">
                            <h1 class="topic_font">Search User</h1>
                        </div>

                        <form name="addEmployeeForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit=""  novalidate>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- NIC number-->
                                            <label for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;">NIC Number </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input maxlength="10" type="text" required class="form-control" id="nic" name="nic" placeholder="Enter NIC number" autofocus/>
                                            </div>

                                            <!-- Name-->
                                            <label for="fullName" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Name </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter full name"/>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- Employement ID-->
                                            <label for="employ_ID" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Employment ID </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" class="form-control" id="eId" name="eId" placeholder="Enter Emp ID"/>
                                            </div> 

                                            <!--Email-->
                                            <label for="email" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Email </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required />
                                                    <label id="errorEmail" style="font-size:10px"> </label>
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
                                                    <option value="1">Ministry Officer</option>
                                                    <option value="2">Provincial Officer</option>
                                                    <option value="3">Zonal Officer</option>
                                                    <option value="4">Principal</option>
                                                    <option value="5">Teacher</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12" style="display: none;" id="provinceIDDiv">

                                            <div id="provinceOfficeHidden" class="form-group" >
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
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Find</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <?php
                        if (isset($_POST['submit'])) {

                            if($_POST["nic"] != '' || $_POST["fname"] != '' || $_POST["eId"] != '' ||
                                $_POST["email"] != '' || $_POST["designation"] != '' || $_POST["provinceID"] != '') {

                                $query = "";
                                $search_nic = "";
                                $search_fullName = "";
                                $search_eID = "";
                                $search_email = "";
                                $search_designation = "";
                                $search_designation_two = "";
                                $search_designation_three = "";
                                $search_designation_four = "";


                                if ($_POST["nic"] != '') {
                                    $nic = strtoupper(mysql_real_escape_string($_POST["nic"]));
                                    $search_nic = " AND (nic LIKE '%$nic%')";
                                }

                                if ($_POST["fname"] != '') {
                                    $fullName = mysql_real_escape_string($_POST["fname"]);
                                    $search_fullName = " AND (fullName LIKE '%$fullName%')";
                                }

                                if ($_POST["eId"] != '') {
                                    $eID = mysql_real_escape_string($_POST["eId"]);
                                    $search_eID = " AND (employeementID LIKE '%$eID%')";
                                }

                                if ($_POST["email"] != '') {
                                    $email = mysql_real_escape_string($_POST["email"]);
                                    $search_email = " AND (email LIKE '%$email%')";
                                }


                                if ($_POST["designation"] != '') {
                                    $designation = mysql_real_escape_string($_POST["designation"]);
                                    $search_designation = " AND (designationTypeID = '$designation')";


                                    if($_POST["designation"] == 1){
                                        $search_designation = " AND (designationTypeID = '$designation')";
                                    }
                                    else if($_POST["designation"] == 2){
                                        if($_POST["provinceID"] != ''){
                                            $provinceID = $_POST["provinceID"];
                                            $search_designation_two = " AND (province_OfficeID = '$provinceID')";
                                            
                                        }else{
                                            $search_designation_two = "";
                                        }
                                        
                                    }
                                    else if($_POST["designation"] == 3){
                                        if($_POST["provinceID"] != '' && $_POST["zonalID"] != ''){
                                            $provinceID = $_POST["provinceID"];
                                            $zonalID = $_POST["zonalID"];
                                            $search_designation_three = " AND (province_OfficeID = '$provinceID') AND (zonalOffics_ID = '$zonalID')";
                            
                                        }
                                        else if($_POST["provinceID"] != '' && $_POST["zonalID"] == ''){
                                            $provinceID = $_POST["provinceID"];
                                            $zonalID = $_POST["zonalID"];
                                            $search_designation_three = " AND (province_OfficeID = '$provinceID')";
                                        }
                                        else{
                                            $search_designation_three = "";
                                        }
                                        
                                    }
                                    else if($_POST["designation"] == 4 || $_POST["designation"] == 5){
                                        if($_POST["provinceID"] != '' && $_POST["zonalID"] != '' && $_POST["schoolId"] != ''){
                                            $provinceID = $_POST["provinceID"];
                                            $zonalID = $_POST["zonalID"];
                                            $schoolID = $_POST["schoolId"];
                                            $search_designation_four = " AND (province_OfficeID = '$provinceID') AND (zonalOffics_ID = '$zonalID') AND (SchoolID = '$schoolID')";
                                            
                                        }
                                        else if($_POST["provinceID"] != '' && $_POST["zonalID"] != '' && $_POST["schoolId"] == ''){
                                            $provinceID = $_POST["provinceID"];
                                            $zonalID = $_POST["zonalID"];
                                            $search_designation_four = " AND (province_OfficeID = '$provinceID') AND (zonalOffics_ID = '$zonalID')";

                                        }
                                        else if($_POST["provinceID"] != ''){
                                            $provinceID = $_POST["provinceID"];
                                            $search_designation_four = " AND (province_OfficeID = '$provinceID')";
                                        }
                                        else{
                                            $search_designation_four = "";
                                        }
                                        
                                    }
                                }

                                $query = "SELECT * FROM employee WHERE roleType > 0".$search_nic.$search_fullName.$search_eID.$search_email.$search_designation.$search_designation_two.$search_designation_three.$search_designation_four;

                                echo '<table width="700" border="1" cellspacing="0" cellpadding="4">';
                                echo '<tr><td width="90" bgcolor="#CCCCCC" align="center"><strong>NIC</strong></td>';
                                echo '<td width="95" bgcolor="#CCCCCC" align="center"><strong>Name</strong></td>';
                                echo '<td width="90" bgcolor="#CCCCCC" align="center"><strong>Employment ID</strong></td>';
                                echo '<td width="120" bgcolor="#CCCCCC" align="center"><strong>Email</strong></td>';
                                echo '<td width="90" bgcolor="#CCCCCC"><strong></strong></td></tr>';

                                $result = mysqli_query($mysqli, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        //to send results to searchResult page
                                        $rslt_ID = $row['nic'];
                                        
                                        echo '<tr>';
                                        echo "<td>{$row['nic']}</td>";
                                        echo "<td>{$row['fullName']}</td>";
                                        echo "<td>{$row['employeementID']}</td>";
                                        echo "<td>{$row['email']}</td>";
                                        echo "<td align='center'><a href='searchResult.php?rslt_ID=".$rslt_ID."'>more</a></td>";
                                        echo '</tr>';
                                    }
                                }else{
                                    echo '<tr><td colspan="5">No results found.</td></tr>';
                                }

                                echo '</table>';
                            }
                            else{
                                echo '<script language="javascript">';
                                echo 'alert("Please fill/select one or more details to search!!")';
                                echo '</script>';
                            }
                        }
                        ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php' ?>
        <script src = "../assets/js/addEmployee.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
    </body>
</html>
