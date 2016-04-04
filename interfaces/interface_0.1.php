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

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#" style="height: 80px;">
                        GTMS
                    </a>
                </li>
                <li>
                    <a class="active" href="interface_0.1.php">Home</a>
                </li>
                <li>
                    <a  data-toggle="collapse" href="#collapse1">Users</a>
                </li>
				<div id="collapse1" class="panel-collapse collapse">
					<li>
                                                <a class="active" href="addEmployee.php">Add User</a>
					</li>
					<li>
						<a class="active" href="">View User</a>
					</li>
					<li>
						<a class="active" href="#">Update User</a>
					</li>
					<li>
						<a class="active" href="#">Delete User</a>
					</li>
				</div>
				<li>
                    <a  data-toggle="collapse" href="#collapse2">Institutes</a>
                </li>
				
				<div id="collapse2" class="panel-collapse collapse">
					<li>
                    <a class="active" href="#">Add Zonal</a>
					</li>
					<li>
						<a class="active" href="#">Add School</a>
					</li>
					
				</div>
				<li>
                    <a  data-toggle="collapse" href="#collapse3">View</a>
                </li>
				
				<div id="collapse3" class="panel-collapse collapse">
					<li>
                    <a class="active" href="#">Province</a>
					</li>
					<li>
						<a class="active" href="#">Zonal</a>
					</li>
					<li>
						<a class="active" href="#">School</a>
					</li>
					
				</div>
				<li>
                    <a  data-toggle="collapse" href="#collapse4">Edit</a>
                </li>
				
				<div id="collapse4" class="panel-collapse collapse">
					<li>
                    <a class="active" href="#">Province</a>
					</li>
					<li>
						<a class="active" href="#">Zonal</a>
					</li>
					<li>
						<a class="active" href="#">School</a>
					</li>
					
				</div>
				<li>
                    <a  data-toggle="collapse" href="#collapse5">Search</a>
                </li>
                <li>
                    <a href="mapview.php">Map View</a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <nav class="navbar navbar-default" style="height: 65px; border-radius:0px;">
            <div class="col-md-3 pull-right" style="margin-top: 18px;">
                Nipuna Jayaweera 
            <div class="pull-right"><a href="../classes/signout.php">Sign out</a></div>
            </div>

        </nav>
        <!-- Page Content -->
        <div id="page-content-wrapper" style="min-height: 540px;">
            
            <div class="container-fluid">
                



                <div class="row">
                    <div class="col-lg-3">
                        <!-- small box -->
                        <div class="small-box aqua ">
                            <div class="inner newstyle">
                                <div class="e"><i>69</i>
                                    <div class="icon pull-right">
                                        <img src="../images/school.png">
                                    </div>
                                </div>
                                <p>Schools</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <!-- small box -->
                        <div class="small-box aqua ">
                            <div class="inner newstyle">
                                <div class="e"><i>298</i>
                                    <div class="icon pull-right">
                                        <img src="../images/mmm.png">
                                    </div>
                                </div>
                                <p>Teachers</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <!-- small box -->
                        <div class="small-box aqua ">
                            <div class="inner newstyle">
                                <div class="e"><i>173</i>
                                    <div class="icon pull-right">
                                        <img src="../images/school.png">
                                    </div>
                                </div>
                                <p>Users</p>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
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

    

</body>

</html>
