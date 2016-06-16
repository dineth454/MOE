<!DOCTYPE html>
<?php 
    //ob_start();
    require("../classes/home.php");
    
    $home = new Home();

    $schools = $home->schools();
    $teachers = $home->teachers();
    $users = $home->users();
 ?>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Home</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">
        <link href="../assets/css/fonts_styles.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">
        
    </head>

    <body>

        <div id="wrapper">

           <!-- Sidebar -->
            <?php include 'sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->

            <!-- include Navigation BAr -->
            <?php include 'navigationBar.php' ?>

            <!-- Finished NAvigation bar -->

            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid">




                    <div class="row">
                        <div class="col-lg-3">
                            <!-- small box -->
                            <div class="small-box aqua ">
                                <div class="inner newstyle">
                                    <div class="e"><i><?php echo $schools; ?></i>
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
                                    <div class="e"><i><?php echo $teachers; ?></i>
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
                                    <div class="e"><i><?php echo $users; ?></i>
                                        <div class="icon pull-right">
                                            <img src="../images/school.png">
                                        </div>
                                    </div>
                                    <p>Users</p>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
<!--
                        <div>
                            <?php 
                               # include '../classes/jpbar.php';
                               # GenGraph();
                            ?>
                            <img src="fff.png">
                        </div>
-->
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div> 
        <!-- /#wrapper -->

        <?php include 'footer.php' ?>



         <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>
        


    </body>

</html>
