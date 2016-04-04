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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <?php include 'sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->
            <nav class="navbar navbar-default" style="height: 65px; border-radius:0px;">
                <div class="col-md-3 pull-right" style="margin-top: 18px;">
                    Nipuna Jayaweera 
                    <div class="pull-right"><a >Sign out</a></div>
                </div>

            </nav>
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 550px;">

                <div class="container-fluid">
                    <div id="googleMap" style="width:500px;height:500px;"></div>



                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!--footer-->
        <footer>
            <div class="footer">
                <div class="col-md-6 col-md-offset-2">
                    <ul class="footer-nav">
                        <li><a href="AboutUs.aspx">About</a></li>
                        <li><a href="Help.aspx">Help</a></li>
                        <li><a href="AdminSitemap.aspx">Site map</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-md-offset-2"> 
                    <div>
                        <a href="#" style="margin-left: 50px;">Developer site</a>
                        <img class="pull-right" src="../images/visa.png" style="width: 30px;">
                    </div>
                </div>
            </div>
        </footer>
        <!-- jQuery -->
        <script src="../assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../assets/js/bootstrap.min.js"></script>

        <script src="../assets/js/googlemap.js"></script>

    </body>

</html>
