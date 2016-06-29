
<?php
ob_start();
//session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>GTMS | Institute</title>

        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">

         <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        
        <link href="../assets/css/footer.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">
        <!-- Alert start-->
        <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
        <script src="../alertify/lib/alertify.min.js"></script>
        <!-- Alert end-->



    </head>

    <body>

        <div id="wrapper" > 

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
            $navInstitute = "background-color: #0A1A42;";
            $textInstitute = "color: white;";

            $navAddZonalInstitute = "background-color: #091536;";
            $textAddZonalInstitute = "color: white;";

            $colInstitute = "collapse in";

            include 'sidebar_min_off.php'; ?>
            <!-- /#sidebar-wrapper -->
            <!-- /.navbar-collapse -->
            </nav>
            
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid" style="">
                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">
                        <?php
                        // echo $_SESSION['designationType'];
                        if (isset($_POST['submit'])) {
                            require '../classes/institute.php';


                            $provinceID = $_POST['provinceID'];
                            $zonlName = $_POST['zonalName'];
                            $LoggedUsernic = $_SESSION["nic"];
                            $institute = new Institute();
                            

                            $insertSuccess = $institute->addZonalOffice($provinceID, $zonlName);


                            if ($insertSuccess == 1) {
                                echo '<script language="javascript">';
                                echo 'alertify.alert("Zonal Added Successfully!")';
                                echo '</script>';
                            } else {
                                echo '<script language="javascript">';
                                echo 'alertify.alert("error Occured While Adding data.check")';
                                echo '</script>';
                            }
                        }
                        ?>

                        
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 style="padding-bottom:40px;">Add New Zonal Office</h1>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="return(addZonalOfficeValidation())">

                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                        <!-- Province Office-->
                                        <div class="form-group" id="provinceIDDiv">
                                            <label for="province Office">Province Office</label>
                                            <select class="form-control " name="provinceID" id="provinceID" autofocus>
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
                                            <div class="form-group">
                                                <label for="nic">Zonal Office</label>
                                                <input type="text" class="form-control" id="zonalName" name="zonalName" placeholder="Enter Zonal Office Name"/>
                                                <label id="errorZonalOfficeName" style="font-size:10px"></label>
                                            </div>

                                        <div class="form-group" style="float: right">
                                            <button style="width: 80px;" type="submit" name="submit" id="submit" class="btn btn-primary">Done</button>
                                        </div>

                                        <div class="form-group" style="float: right; padding-right: 10px;">
                                                <input class="btn btn-primary" style="width: 80px;" type="button" value="Cancel" onclick="window.location.href='ministryOfficerHome.php'"/>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="col-lg-5" style="position: fixed; top: 150px; left: 850px;"> 
                        <img src="../images/addInstitute.png" width="400" height="400">
                    </div>

                    </div>
                </div>
            <!-- /#page-content-wrapper -->
            </div>
        </div>
            <!-- /#page-content-wrapper -->

</br></br>
            <?php include '../interfaces/footer.php' ?>
            <script src = "../assets/js/instituteValidation.js"></script>
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>
            <!-- jQuery -->
            <script src="../assets/js/jquery.js"></script>
            <!-- Bootstrap Core JavaScript -->
            <script src="../assets/js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
