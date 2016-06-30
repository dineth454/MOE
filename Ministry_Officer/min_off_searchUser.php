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

        <title>GTMS | Search</title>



        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">

        <link href="../assets/css/fonts_styles.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="..assets/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">
        <!-- Alert start-->
        <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
        <script src="../alertify/lib/alertify.min.js"></script>
        <!-- Alert end-->


    </head>

    <body>
        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#020816;" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- include Navigation BAr -->
                <?php include '../interfaces/navigation_bar.php' ?>
                <!--____________________________________________________________________________-->
                <!-- Sidebar Menu Items-->
                <!-- Sidebar -->

                <?php
                include 'sideBarActivation.php';

                //sideBar Activation
                $navSearch = "background-color: #0A1A42;";
                $textSearch = "color: white;";

                $navSearchMembers = "background-color: #091536;";
                $textSearchMembers = "color: white;";

                $colSearch = "collapse in";

                include 'sidebar_min_off.php'; ?>
                <!-- /#sidebar-wrapper -->
                <!-- /.navbar-collapse -->
            </nav>

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">

                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">

                        <?php
                        //get session data of logged user
                        $roletypeID = $_SESSION["roleTypeID"];
                        $designationIdLoggedUser = $_SESSION["designationTypeID"];
                        $LoggedUsernic = $_SESSION["nic"];

                        //variables
                        $display = "padding-bottom:40px; display: none;";


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

                        <!-- New Part-->
                        <div class="row">
                            <div class="col-lg-7">

                            <h1 style="padding-bottom:40px;">Search Members</h1>
                        
                        <?php
                        if (isset($_POST['submit'])) { 
                                $display = "padding-bottom:40px;";
                            ?>
                            <div style="<?php echo $display ?>">
                            <label>Search Results</label></br>

                            <?php
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
                                        echo "<td align='center'><a href='min_off_searchResult.php?rslt_ID=".$rslt_ID."'>more</a></td>";
                                        echo '</tr>';
                                    }
                                }else{
                                    echo '<tr><td colspan="5">No results found.</td></tr>';
                                }

                                echo '</table>';
                            }
                            else{
                                echo '<script language="javascript">
                                        alertify.confirm("Please fill/select one or more details to search!!", function (e) {
                                        if (e) {
                                            window.location.href="min_off_searchUser.php";
                                        }
                                        });
                                    </script>';
                            }?>
                        </div>
                        <?php } ?>

                                <form name="addEmployeeForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit="return(validateForm())"  novalidate>

                                <?php
                                // when click find button form is hidden
                                    if (isset($_POST['submit'])) {   
                                    ?>              
                                    <div class="row" style="display: none;">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- NIC number-->
                                            <div class="form-group">
                                                <label for="nic" style="display: inline-block;">NIC Number</label>
                                                <input maxlength="10" type="text" required class="form-control" id="nic" name="nic" placeholder="Enter NIC Number" autofocus/>
                                                <label id="errornicNum" style="font-size:10px"></label>
                                            </div>

                                            <!-- Designation-->
                                            <div class="form-group">
                                                <label for="designation" style="display: inline-block;">Designation</label>
                                                <select required class="form-control" id="designation" name = "designation" onchange="selectionForm(this.value)">
                                                    <option value="">Select Designation</option>
                                                    <option value="1">Ministry Officer</option>
                                                    <option value="2">Province Officer</option>
                                                    <option value="3">Zonal Officer</option>
                                                    <option value="4">Principal</option>
                                                    <option value="5">Teacher</option>
                                                </select>
                                                <label id="errorDesignation" style="font-size: 10px"> </label>
                                            </div>

                                            <!-- Province Office-->
                                            <div class="form-group" style="display: none;" id="provinceIDDiv">
                                                <label for="province Office">Province Office</label>
                                                <select required class="form-control " name="provinceID" id="provinceID" onchange="showUser(this.value)">
                                                    <option value="" >Select Province Office</option>
                                                    <option value="1">Central Province</option>
                                                    <option value="2">Western Province</option>
                                                    <option value="3">Southern Province</option>
                                                    <option value="4">Nothern Province</option>
                                                    <option value="5">Eastern Province</option>
                                                </select>
                                                <label id="errorProvince" style="font-size: 10px"> </label>
                                            </div>

                                            <!-- Zonal Office-->
                                            <div class="form-group" style="display: none;" id="zonalOfficeDiv">
                                                <label for="Zonal Office">Zonal Office</label>
                                                <select required class="form-control" name="zonalID"  id="abc" onchange="loadSchool(this.value)">
                                                    <option value="" >Select Zonal Office</option>
                                                </select>
                                                <label id="errorZonal" style="font-size: 10px"> </label>
                                            </div>

                                            <!-- School-->
                                            <div class="form-group" style="display: none;" id="schoolIdDiv">
                                                <label for="School">School</label>
                                                <select required class="form-control required" name="schoolId" id="abcd">
                                                    <option value="" >Select School</option>
                                                </select>
                                                <label id="errorSchool" style="font-size: 10px"> </label>
                                            </div>

                                            <!-- Full Name-->
                                            <div class="form-group">
                                                <label for="fullName">Full Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Full Name"/>
                                                <label id="errorLastName" style="font-size:10px"> </label>
                                            </div>

                                            <!-- Employment ID-->
                                            <div class="form-group">
                                                <label for="employ_ID">Employee ID</label>
                                                <input type="text" class="form-control" id="eId" name="eId" placeholder="Enter Employment ID"/>
                                                <label id="errorEmployID" style="font-size:10px"> </label>
                                            </div>

                                            <!-- Email-->
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required />
                                                <label id="errorEmail" style="font-size:10px"> </label>
                                            </div>

                                            <div class="form-group" style="float: right">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Find</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- to show the form before click find button -->
                                    <?php }else{ ?>
                                        <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- NIC number-->
                                            <div class="form-group">
                                                <label for="nic" style="display: inline-block;">NIC Number</label>
                                                <input maxlength="10" type="text" required class="form-control" id="nic" name="nic" placeholder="Enter NIC Number" autofocus/>
                                                <label id="errornicNum" style="font-size:10px"></label>
                                            </div>

                                            <!-- Designation-->
                                            <div class="form-group">
                                                <label for="designation" style="display: inline-block;">Designation</label>
                                                <select required class="form-control" id="designation" name = "designation" onchange="selectionForm(this.value)">
                                                    <option value="">Select Designation</option>
                                                    <option value="1">Ministry Officer</option>
                                                    <option value="2">Province Officer</option>
                                                    <option value="3">Zonal Officer</option>
                                                    <option value="4">Principal</option>
                                                    <option value="5">Teacher</option>
                                                </select>
                                                <label id="errorDesignation" style="font-size: 10px"> </label>
                                            </div>

                                            <!-- Province Office-->
                                            <div class="form-group" style="display: none;" id="provinceIDDiv">
                                                <label for="province Office">Province Office</label>
                                                <select required class="form-control " name="provinceID" id="provinceID" onchange="showUser(this.value)">
                                                    <option value="" >-- Select Province Office --</option>
                                                    <option value="1">Central Province</option>
                                                    <option value="2">Western Province</option>
                                                    <option value="3">Southern Province</option>
                                                    <option value="4">Nothern Province</option>
                                                    <option value="5">Eastern Province</option>
                                                </select>
                                                <label id="errorProvince" style="font-size: 10px"> </label>
                                            </div>

                                            <!-- Zonal Office-->
                                            <div class="form-group" style="display: none;" id="zonalOfficeDiv">
                                                <label for="Zonal Office">Zonal Office</label>
                                                <select required class="form-control" name="zonalID"  id="abc" onchange="loadSchool(this.value)">
                                                    <option value="" >Select Zonal Office</option>
                                                </select>
                                                <label id="errorZonal" style="font-size: 10px"> </label>
                                            </div>

                                            <!-- School-->
                                            <div class="form-group" style="display: none;" id="schoolIdDiv">
                                                <label for="School">School</label>
                                                <select required class="form-control required" name="schoolId" id="abcd">
                                                    <option value="" >Select School</option>
                                                </select>
                                                <label id="errorSchool" style="font-size: 10px"> </label>
                                            </div>

                                            <!-- Full Name-->
                                            <div class="form-group">
                                                <label for="fullName">Full Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Full Name"/>
                                                <label id="errorLastName" style="font-size:10px"> </label>
                                            </div>

                                            <!-- Employment ID-->
                                            <div class="form-group">
                                                <label for="employ_ID">Employee ID</label>
                                                <input type="text" class="form-control" id="eId" name="eId" placeholder="Enter Employment ID"/>
                                                <label id="errorEmployID" style="font-size:10px"> </label>
                                            </div>

                                            <!-- Email-->
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required />
                                                <label id="errorEmail" style="font-size:10px"> </label>
                                            </div>

                                            <div class="form-group" style="float: right">
                                                <button type="submit" style="width: 80px;" name="submit" id="submit" class="btn btn-primary">Find</button>
                                            </div>

                                            <div class="form-group" style="float: right; padding-right: 10px;">
                                                <input class="btn btn-primary" style="width: 80px;" type="button" value="Cancel" onclick="window.location.href='ministryOfficerHome.php'"/>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <!-- hidden/ show Back button -->
                                    <?php
                                    if (isset($_POST['submit'])) { ?>

                                        <div class="form-group">
                                            <button class="btn btn-primary" href="min_off_searchUser.php">Back</button>
                                        </div>

                                    <?php }else{ ?>

                                        <div class="form-group">
                                            <button class="btn btn-primary" style="display: none;">Back</button>
                                        </div>

                                    <?php } ?>

                                </form>
                            </div>

                            <!-- hidden/ show image button -->
                            <?php
                            if (isset($_POST['submit'])) { ?>

                            <div class="col-lg-5" style="display: none;"> 
                                <img src="../images/search.png" width="400" height="400">
                            </div>

                            <?php }else{ ?>

                            <div class="col-lg-5" style="position: fixed; top: 150px; left: 850px;"> 
                                <img src="../images/search.png" width="400" height="400">
                            </div>

                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>

            <!-- /#page-content-wrapper -->

        </div>
</br></br>
<?php include '../interfaces/footer.php' ?>

        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>

</html>
