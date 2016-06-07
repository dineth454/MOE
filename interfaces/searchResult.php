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

        <title>Transer Teacher Form Front</title>


        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">
        <!--<link href="../assets/css/fonts_styles.css" rel="stylesheet">-->


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

                        <div align="center" style="padding-bottom:10px;">
                            <h1>User Information</h1>
                        </div>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- NIC number-->
                                            <label  for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3" style="display: inline-block; text-align: left;">NIC Number </label>
                                            
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                            <label><?php echo $rcvd_nic; ?></label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- NIC number-->
                                            <label  for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3" style="display: inline-block; text-align: left;">Name With Initials </label>
                                            
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                            	<label><?php echo $nameWithInitials; ?></label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- NIC number-->
                                            <label  for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3" style="display: inline-block; text-align: left;">Full Name</label>
                                            
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                            	<label><?php echo $fullName; ?></label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- NIC number-->
                                            <label  for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3" style="display: inline-block; text-align: left;">Designation </label>
                                            
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                            	<label><?php echo $designationName; ?></label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- NIC number-->
                                            <label  for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3" style="display: inline-block; text-align: left;">Institute </label>
                                            
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                            	<label><?php echo $instituteName; ?></label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- NIC number-->
                                            <label  for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3" style="display: inline-block; text-align: left;">Current Address</label>
                                            
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                            	<label><?php echo $currentAddress; ?></label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- NIC number-->
                                            <label  for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3" style="display: inline-block; text-align: left;">Email</label>
                                            
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                            	<label><?php echo $email; ?></label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- NIC number-->
                                            <label  for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3" style="display: inline-block; text-align: left;">Phone No </label>
                                            
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                            	<label><?php echo $mobileNum; ?></label>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->




            <?php include 'footer.php' ?>
            <script src="../assets/js/transerTeacherFrontnicValidation.js"></script>

            <script src="../assets/js/jquery.js"></script>



            <script src="../assets/js/bootstrap.min.js"></script>
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>



        </div>
    </body>

</html>
