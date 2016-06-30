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

        <title>Map View</title>

        
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

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhSKzfElSK1IBSQgF1kGr2Iv6-JqeVUUA"></script>
        
        

    </head>

    <body onload="load()">

        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#020816;" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- include Navigation BAr -->
                <?php include '../interfaces/navigation_bar.php' ?>
                <!--____________________________________________________________________________-->
                <!-- Sidebar Menu Items-->
                <!-- Sidebar -->
                <?php 
                include 'Extended_principle_sidebar_activation.php';
                $navMap = "background-color: #0A1A42;";
                $textMap = "color: white;";
                include 'Extended_principle_sidebar.php' ?>
                <!-- /#sidebar-wrapper -->
                <!-- /.navbar-collapse -->
            </nav>
            
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 550px;">

                <div class="container-fluid" >
                    <div id="map-canvas" style="width:500px;height:730px;"></div>



                </div>

            </div>
            <!-- /#page-content-wrapper -->
            <div class="col-lg-5" style="position: fixed; top: 150px; left: 850px;"> 
                <img src="../images/map.png" width="430" height="430" style="opacity: 0.8;">
            </div>
        </div>
        <!-- /#wrapper -->

        <!--footer-->
        <?php include '../interfaces/footer.php' ?>
        <!-- jQuery -->
        <script src="../assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../assets/js/bootstrap.min.js"></script>

        <!-- google map Core JavaScript -->

        <script type="text/javascript" src="../assets/js/viewmapmarkers.js"></script>

    </body>

</html>
