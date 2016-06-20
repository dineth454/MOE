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
                <?php 
                    
                    $id = intval($_GET['id']);
                    
                    if (isset($_POST['submit'])) {
                        //require("../classes/Shownotification.php");
                        $reply = $_POST['reply'];
                        $reciever = $_SESSION["nic"];
                        $not = new Shownotification();
                        $not->reply($reply,$reciever,$id);
                        
                    }

                 ?>
                <form  method="post">
                <div class="container-fluid">
                    <div class="row">
                        <label>From :</label>
                        <label><?php echo $not->name($id); ?></label>

                    </div>
                    <br/>
                    <div class="row">
                        <label>Message :</label>
                        <div class="panel panel-default" style="width:750px;">
                          <div class="panel-body">
                            <?php echo $not->message($id); ?>
                          </div>
                        </div>

                    </div>
                    <br/>
                    <div class="row">
                        <label>Reply :</label>
                        <div class="panel panel-default" style="width:750px;">
                            <div class="panel-body">
                                <textarea name="reply" id="reply" rows="5" cols="40" style="border: 0px; margin: 0px; width: 719px; height: 191px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input class="btn btn-primary" type="submit" name="submit" value="Reply">
                    </div>

                </div>
                </form>
            </div>
            <!-- /#page-content-wrapper -->

        </div> 
        <!-- /#wrapper -->

        <?php include 'footer.php' ?>
        


    </body>

</html>
