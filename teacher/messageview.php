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
    <style>
    body {
        background-image: url("../images/back4.jpg");
        background-repeat: no-repeat;
        background-position: 220px 50px;
        background-size: 1150px 700px;
    }
    </style>
        
    </head>
<?php $id = $_GET['id']; ?>

<script type="text/javascript">
$(".submit").click(function () {
    //alert(this.id);
    alertify.alert("Message ya ya yo");
});

</script>
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
                    if (isset($_POST['submit'])) {
                        $not->deletemsg($id);

                        //header("Location: teacher_home.php");
                    }

                 ?>
                <form  method="post">
                <div class="container-fluid" style="margin-left: 44px;margin-top: 90px;">
                    <div class="row">
                        <label>From :</label>
                        <?php echo $not->nameMOE($id); ?>
                    </div>
                    <br/>
                    <div class="row">
                        <label>Message :</label>
                        <div class="panel panel-default" style="width:750px;">
                          <div class="panel-body">
                            <?php echo $not->message($id); ?>
                          </div>
                        </div>
                        <div style="margin-left: 600px; color:#6495ED;"><?php echo $not->getmessagedate($id); ?>
                        </div>

                    </div>
                    <br/>
                    <div class="row">
                        <label>Reply :</label>
                        <div class="panel panel-default" style="width:750px;">
                            <div class="panel-body">
                                <?php echo $not->viewreply($id); ?>
                            </div>
                        </div>
                        <div style="margin-left: 600px; color:#6495ED;"><?php echo $not->getmessagereplydate($id); ?>
                        </div>
                    </div>
                    <div class="row">
                        <input class="btn btn-primary" type="button" onClick="history.go(-1);" value="Back">
                    
                        <input class="btn btn-primary" type="submit" name="submit" value="Delete">
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
