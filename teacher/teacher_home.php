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
        background-image: url("../images/back3.jpg");
        background-repeat: no-repeat;
        background-position: 220px 50px;
        background-size: 1150px 700px;
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
            <?php include 'sidebar_teacher.php' ?>
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            </nav>
            <div id="page-content-wrapper" style="min-height: 540px;">

                <?php
                    require("../classes/vacansies.php");
                    $vacancy = new Vacancy();
                ?>


                
            </div>
            <!-- /#page-content-wrapper -->

        </div> 
        <!-- /#wrapper -->

        	
        
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>

            <!-- jQuery -->
            <script src="../assets/js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="../assets/js/bootstrap.min.js"></script>


    </body>

</html>
