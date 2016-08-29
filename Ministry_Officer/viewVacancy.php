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

        <title>Home</title>

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
        background-position: 220px 330px;
        background-attachment: fixed;
        background-size: 1150px 350px;
        }
        </style>
    </head>

    <body>
        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#020816;" role="navigation">

            

            <!-- include Navigation BAr -->
             <?php include '../interfaces/navigation_bar.php' ?>
            
            <!-- Finished NAvigation bar -->
            <!-- Sidebar -->
            <?php
            include 'sideBarActivation.php';
             
            $navVacancy = "background-color: #0A1A42;";
            $textVacancy = "color: white;";

            $navViewVacancy = "background-color: #091536;";
            $textViewVacancy = "color: white;";

            $colVacancy = "collapse in";


             include 'sidebar_min_off.php' ?>
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            </nav>



            <div  id="page-content-wrapper" style="min-height: 540px;" >
                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">

                        <?php 
                        require("../classes/vacansies.php");
                        $vacancy = new Vacancy();
                        $provinceID = "n";
                        if (isset($_POST['submit'])) {

                            $provinceID = $_POST['provinceID'];
                        }
                        ?>
                        
                        <div class="row">
                        <div class="col-lg-7">
                            <h1 style="padding-bottom:40px;">View Vacancy</h1>

                        <form name="addEmployeeForm" method = "post" onsubmit="return(validateForm())"  novalidate>
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Designation-->
                                            <div class="form-group">
                                            <label for="designation" style="display: inline-block; text-align: left;"> Province </label>
                                            <select required class="form-control " name="provinceID" id="provinceID" onchange="showUser(this.value)" autofocus>
                                                <option value="" >Select Province</option>
                                                <option value="1">Central Province</option>
                                                <option value="2">Western Province</option>
                                                <option value="3">Southern Province</option>
                                                <option value="4">Nothern Province</option>
                                                <option value="5">Eastern Province</option>
                                            </select>       
                                            </div>


                                            <div class="form-group" style="float: right">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            
                                                <?php echo $vacancy-> viewVacancy($provinceID); ?>

                                        </div>
                                    </div>

                                    </div>
                                </div>
                        </form>
                        </div>
                        <div class="col-lg-5" style="position: fixed; top: 150px; left: 850px;"> 
                        <img src="../images/personDetails.png" width="400" height="400">
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- /#page-content-wrapper -->

        </div>
        <br>
        <br>

        <?php include '../interfaces/footer.php' ?>
        <script src = "../assets/js/addEmployee.js"></script>

        <script src="../assets/js/jquery.js"></script>


        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>





    </body>

</html>
