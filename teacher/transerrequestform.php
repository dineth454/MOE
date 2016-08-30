<!DOCTYPE html>
<?php 
    ob_start();
    
    
    require("../classes/home.php");
    //shownotification.php class alway include in navigetion.php file 
    //require("../classes/Shownotification.php");
    
 ?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Request Transer</title>
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
    <!-- Alert start-->
    <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
    <script src="../alertify/lib/alertify.min.js"></script>
    <!-- Alert end-->


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

            

            <!-- include Navigation BAr -->
            <?php include 'navigation_bar_teacher.php' ?>
            
            <!-- Finished NAvigation bar -->
            <!-- Sidebar -->
            <?php 
            include 'sideBarActivation.php';

            //sideBar Activation
            $navTransfer = "background-color: #0A1A42;";
            $textTransfer = "color: white;";

            $navTransferTeach = "background-color: #091536;";
            $textTransferTeach = "color: white;";

            $colTransfer = "collapse in";
            
            include 'sidebar_teacher.php' ?>
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            </nav>
            <div id="page-content-wrapper" style="min-height: 540px;">

                <?php 
                    
                    
                    if (isset($_POST['submit'])) {
                        //require("../classes/Shownotification.php");
                        $des = $_POST['description'];
                        $sender = $_SESSION["nic"];
                        $not = new Shownotification();
                        $id = $not->gennotid();
                        $not->sendrequest($id,$des,$sender);
                        //header("Location: teacher_home.php");
                        
                    }

                 ?>

                <form  method="post">
                <div class="container-fluid" style="margin-left: 44px;margin-top: 90px;">

                    <div align="center" style="padding-bottom:10px;">
                            <h1 class="topic_font">Transer Request</h1>
                    </div>
                    
                    <div class="row">
                        <label>Message :</label>
                        <div class="panel panel-default" style="width:750px;">
                          <div class="panel-body">
                            <textarea name="description" id="description" rows="5" cols="40" style="border: 0px; margin: 0px; width: 719px; height: 191px;"></textarea>
                          </div>
                        </div>

                    </div>
                    <div class="row">
                        <input class="btn btn-primary" type="submit" name="submit" value="Send">
                    </div>

                </div>
                </form>
            </div>
            <!-- /#page-content-wrapper -->

        </div> 
        <!-- /#wrapper -->

        <?php include '../interfaces/footer.php' ?>

            
        
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>

            <!-- jQuery -->
            <script src="../assets/js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="../assets/js/bootstrap.min.js"></script>


    </body>

</html>
