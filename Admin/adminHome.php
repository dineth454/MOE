
<!DOCTYPE html>
<?php
     require("../classes/home.php");
    
    $home = new Home();

    $schools = $home->schools();
    $teachers = $home->teachers();
    $users = $home->users();

?>
<html lang="en">

<head>


<style type="text/css">
    
    .panel-heading {
     background-color: #ffffff;
}
</style>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GTMS | Home</title>

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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

    <div id="row">
        <div class="col-lg-2">

        <!-- Navigation -->
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
            $navHome = "background-color: #0A1A42;";
            $textHome = "color: white;";

            include 'sidebar_admin.php'; ?>
            <!-- /#sidebar-wrapper -->
            <!-- /.navbar-collapse -->
        </nav>
        </div>


        <div class="col-lg-10">
            
            <div class="col-lg-9">
                <br>
                <!-- <marquee direction="left">GTMS    Government Teacher Management System</marquee> -->
            </div>
            <div class="col-lg-3">

                <br>
                
                <div class="row">
                    <div class="col-lg-12">
                       
                        <!-- <div class="panel panel-primary ">
                            <div class="panel-heading" style="background-color:#0A1A42"> --> 
                                <div class="row">
                                    <div class="col-lg-3">
                                        <!-- <div class="col-lg-3">
                                        <i class="fa fa-university fa-5x" aria-hidden="true"></i>
                                    </div> -->
                                    </div>
                                    <div class="col-lg-9 text-right">
                                        <div class="huge"><i><?php echo $schools; ?></i></div>
                                        <div>Schools</div>
                                    </div>
                                </div>
                            <!-- </div> -->
                            
                        <!-- </div> -->
                     
                    </div>
                    
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-12">
                        
                       
                        <!-- <div class="panel panel-primary ">
                            <div class="panel-heading" style="background-color:#0A1A42"> --> 
                                <div class="row">
                                    <div class="col-lg-3">
                                        <!-- <i class="fa fa-user fa-5x" aria-hidden="true"></i> -->
                                    </div>
                                    <div class="col-lg-9 text-right">
                                        <div class="huge"><i><?php echo $teachers; ?></i></div>
                                        <div>Teachers</div>
                                    </div>
                                </div>
                            <!-- </div> -->
                            
                        <!-- </div> -->
                     
                  
                    </div>
                    
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                                    <div class="col-lg-3">
                                        <!-- <i class="fa fa-users fa-5x" aria-hidden="true"></i> -->
                                    </div>
                                    <div class="col-lg-9 text-right">
                                        <div class="huge"><i><?php echo $users; ?></i></div>
                                        <div>Users</div>
                                    </div>
                                </div>
                    </div>
                    
                </div>

               
            </div>
        </div>
    </div>
       
        <!--___________________________________________________________________________________________________________________-->

        
   


    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../assets/js/plugins/morris/raphael.min.js"></script>
    <script src="../assets/js/plugins/morris/morris.min.js"></script>
    <script src="../assets/js/plugins/morris/morris-data.js"></script>



</body>

</html>
