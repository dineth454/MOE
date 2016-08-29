<?php 

require("../classes/dbcon.php");
$con = new DBCon();
$conn = $con->connection();

$nameWithInitials = $fullName = $email = $currentAddress = $gender = $mobileNum = $instituteName = $designationName = "";

$rcvd_nic = $_GET['rslt_ID'];

$query = "SELECT * FROM employee WHERE nic = '" . $rcvd_nic . "' LIMIT 1 ";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $instituteID = $row["instituteID"];
                $designationTypeID = $row["designationTypeID"];
                $nameWithInitials = $row["nameWithInitials"];
                $fullName = $row["fullName"];
                $email = $row["email"];
                $currentAddress = $row["currentAddress"];
                $gender = $row["gender"];
                $mobileNum = $row["mobileNum"];
            }

            $query2 = "SELECT * FROM province_office WHERE instituteID = '" . $instituteID . "' LIMIT 1 ";
            $result2 = mysqli_query($conn, $query2);

            $query3 = "SELECT * FROM zonal_office WHERE instituteID = '" . $instituteID . "' LIMIT 1 ";
            $result3 = mysqli_query($conn, $query3);

            $query4 = "SELECT * FROM school WHERE instituteID = '" . $instituteID . "' LIMIT 1 ";
            $result4 = mysqli_query($conn, $query4);

            if (mysqli_num_rows($result2) == 1) {
                while ($row = mysqli_fetch_assoc($result2)) {
                    $instituteName = $row["province"];
                }
            }
            else if(mysqli_num_rows($result3) == 1){
                while ($row = mysqli_fetch_assoc($result3)) {
                    $instituteName = $row["zonalName"];
                }
            }
            else if(mysqli_num_rows($result4) == 1){
                while ($row = mysqli_fetch_assoc($result4)) {
                    $instituteName = $row["schoolName"];
                }
            }
            else{
                $instituteName = "Ministry of Education";
            }

            $query5 = "SELECT * FROM designation WHERE designationTypeID = '" . $designationTypeID . "' LIMIT 1 ";
            $result5 = mysqli_query($conn, $query5);

            if (mysqli_num_rows($result5) == 1) {
                while ($row = mysqli_fetch_assoc($result5)) {
                    $designationName = $row["designation"];
                }
            }
}

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

                include 'sidebar_admin.php';?>
                <!-- /#sidebar-wrapper -->
                <!-- /.navbar-collapse -->
            </nav>

            <div  id="page-content-wrapper" style="min-height: 540px;" >
                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">

                        <!-- New Part-->
                        <div class="row">
                            <div class="col-lg-7">

                                <h1 style="padding-bottom:40px; padding-left: 12px;">Member Details</h1>

                                <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                <div class="row">

                                <!-- NIC number-->
                                <div class="form-group col-lg-12">
                                        <div class="col-lg-6">
                                            <label style="display: inline-block; text-align: left;">NIC Number </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label><?php echo $rcvd_nic; ?></label>
                                        </div>    
                                </div>

                                <!-- Name-->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <div class="col-lg-6">  
                                            <label style="display: inline-block; text-align: left;">Name With Initials </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label><?php echo $nameWithInitials; ?></label>
                                        </div>  
                                </div>

                                <!-- Full Name -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <div class="col-lg-6">
                                            <label style="display: inline-block; text-align: left;">Full Name</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label><?php echo $fullName; ?></label>
                                        </div>
                                </div>

                                <!-- Designation-->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <div class="col-lg-6">
                                            <label style="display: inline-block; text-align: left;">Designation </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label><?php echo $designationName; ?></label>
                                        </div>
                                </div>

                                <!-- Institute Name-->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <div class="col-lg-6">
                                            <label style="display: inline-block; text-align: left;">Institute </label>
                                        </div>
                                        <div class="col-lg-6">
                                                <label><?php echo $instituteName; ?></label>
                                        </div>
                                </div>

                                <!-- Address-->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <div class="col-lg-6">
                                            <label style="display: inline-block; text-align: left;">Current Address</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label><?php echo $currentAddress; ?></label>
                                        </div> 
                                </div>

                                <!-- Email -->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <div class="col-lg-6">
                                            <label style="display: inline-block; text-align: left;">Email</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label><?php echo $email; ?></label>
                                        </div>
                                </div>

                                <!-- Mobile Number-->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <div class="col-lg-6">
                                            <label style="display: inline-block; text-align: left;">Phone No </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label><?php echo $mobileNum; ?></label>
                                        </div>
                                </div>

                                <!-- back button-->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                     <form>
                                        <input class="btn btn-primary" type="button" value="Back" onclick="window.location.href='admin_searchUser.php'"/>
                                    </form> 
                                </div>
                            </div>
                            </div>
                        </div>    
                        </div>
                            <div class="col-lg-5" style="position: fixed; top: 150px; left: 850px;"> 
                                <img src="../images/personDetails.png" width="400" height="400">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>

        <?php include '../interfaces/footer.php' ?>

        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>

</html>
