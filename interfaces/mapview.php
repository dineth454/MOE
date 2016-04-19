<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Map View</title>

        <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhSKzfElSK1IBSQgF1kGr2Iv6-JqeVUUA"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        

    </head>

    <body onload="load()">

        <div id="wrapper">

          <!-- Sidebar -->
            <?php include 'sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->
            
            <!-- include Navigation BAr -->
            <?php include 'navigationBar.php' ?>
            
            <!-- Finished NAvigation bar -->
            
            
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 550px;">

                <div class="container-fluid" >
                    <div id="map-canvas" style="width:500px;height:730px;"></div>



                </div>

            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!--footer-->
        <?php include 'footer.php' ?>
        <!-- jQuery -->
        <script src="../assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../assets/js/bootstrap.min.js"></script>

        <!-- google map Core JavaScript -->

        <script type="text/javascript" src="../assets/js/viewmapmarkers.js"></script>

    </body>

</html>
