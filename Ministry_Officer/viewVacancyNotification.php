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

        <title>Notifications</title>
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
        
    </head>

    <body>

        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#020816;" role="navigation">

            

            <!-- include Navigation BAr -->
            <?php include '../interfaces/navigation_bar.php' ?>
            
            <!-- Finished NAvigation bar -->
            <!-- Sidebar -->
            <?php
            include 'sideBarActivation.php';
            

            include 'sidebar_min_off.php'; ?>
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            </nav>
            <div id="page-content-wrapper" style="min-height: 540px;">
                <?php 
                    
                    $id = $_GET['id'];
                    if (isset($_POST['submit'])) {
                        
                        $not = new Shownotification();
                        $not->deletenotificati($id);
                        
                    }

                 ?>
                <form  method="post">
                <div class="container-fluid" style="margin-left: 44px;margin-top: 90px;">
                    <div class="row">
                        <label>From :</label>
                        <?php echo $not->name($id); echo "; ";?>
                    </div>
                    <br/>
                    <div class="row">
                        <label>School :</label>
                        <?php echo $not->school($id); ?>
                    </div>
                    <br/>
                    <div class="row">
                        <label>Subject Name :</label>
                        <?php echo $not->getsubject($id); ?>

                    </div>
                    <br/>
                    <div class="row">
                        <label>Subject Code :</label>
                        <?php echo $not->getsubjectcode($id); ?>

                    </div>
                    <br/>
                    <div class="row">
                        <label>Number of Vacancies :</label>
                        <?php echo $not->getvacancy($id); ?>

                    </div>
                    <div class="row">
                        <input class="btn btn-primary" type="submit" name="submit" value="Accept">
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
