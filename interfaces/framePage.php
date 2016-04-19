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

    </head>

    <body>

        <div id="wrapper" >

            <!-- Sidebar -->
            <?php include 'sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->

            <!-- include Navigation BAr -->
            <?php include 'navigationBar.php' ?>

            <!-- Finished NAvigation bar -->

            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 540px ; ">

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">


                        <div align="center" style="padding-bottom:10px;">
                            <h1>Page Frame Page</h1>
                        </div>

                    </div>
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
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
        
        
        
        <script> 
            
            var loadDiv = $('#page-content-wrapper');
            
            $("a.ajax_load").on("click" ,function(e){
                e.preventDefault();
                loadDiv.empty();
               // loadDiv.prepend('<img src = "../images/visa.png"/>');
                loadDiv.load(this.href);
                //Onready();
           });
           
           
         </script>



    </body>

</html>
