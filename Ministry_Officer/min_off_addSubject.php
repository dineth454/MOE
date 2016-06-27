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

        <title>GTMS | Subject</title>

        

        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        
        <link href="../assets/css/fonts_styles.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="../assets/css/smallbox.css" rel="stylesheet">
    <link href="../assets/css/footer.css" rel="stylesheet">
    <!-- Alert start-->
    <link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
    <script src="../alertify/lib/alertify.min.js"></script>
    <!-- Alert end-->


    </head>
    <?php 
        require("../classes/Subject.php");
        $sub = new Subject();
     ?>

    <body>
        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#020816;" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- include Navigation BAr -->
            <?php include '../interfaces/navigation_bar.php' ?>
            <!--____________________________________________________________________________-->
            <!-- Sidebar Menu Items-->
             <!-- Sidebar -->
            <?php include 'sideBarActivation.php';

            //sideBar Activation
            $navSubject = "background-color: #0A1A42;";
            $textSubject = "color: white;";

            $navAddSubject = "background-color: #091536;";
            $textAddSubject = "color: white;";

            $colSubject = "collapse in";

            include 'sidebar_min_off.php'; ?>
            <!-- /#sidebar-wrapper -->
            <!-- /.navbar-collapse -->
        </nav>

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">
                    <?php 
                        if (isset($_POST['submit'])) {

                            $code = strtoupper($_POST['subcode']);
                            $rescode = $sub->selectsubjectcode($code);

                            $name = $_POST['subname'];
                            $subcode = $sub->getsubid();
                            $res=$sub->selectsubjectname($name);
                            if ($res > 0) {
                                echo '<script language="javascript">';
                                echo 'alertify.alert("This Subject name alreadt exists!!")';
                                echo '</script>';
                            }
                            elseif ($rescode > 0) {
                                echo '<script language="javascript">';
                                echo 'alertify.alert("This Subject code alreadt exists!!")';
                                echo '</script>';
                            }
                            else{
                                $sub->insertsubject($code,$name);

                                echo '<script language="javascript">';
                                echo 'alertify.alert("This Subject Succesefully insert!!")';
                                echo '</script>';
                            }

                        }
                    ?>                 

                    <div class="row">
                    <div class="col-lg-7">

                        <h1 style="padding-bottom:40px;">Add New Subject</h1>

                        <form name="addEmployeeForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit="return(validateaddNewSubjectForm())"  novalidate>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <!-- new subject code-->
                                    <div class="form-group"> 
                                        <label>Subject Code</label>
                                        <input maxlength="10" type="text" required class="form-control" id="subcode" name="subcode" placeholder="Enter New Subject Code" autofocus/>
                                        <label id="errorsubcode" style="font-size:10px"> </label>
                                    </div>


                                    <!-- new subject name-->
                                    <div class="form-group">
                                        <label>Subject Name</label>
                                        <input maxlength="10" type="text" required class="form-control" id="subname" name="subname" placeholder="Enter New Subject Name"/>
                                        <label id="errorsubname" style="font-size:10px"> </label>
                                    </div>


                                    <div class="form-group" style="float: right">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary" style="width: 80px;">Done</button>
                                    </div>


                                    <div class="form-group" style="float: right; padding-right: 10px;">
                                        <input class="btn btn-primary" style="width: 80px;" type="button" value="Cancel" onclick="window.location.href='ministryOfficerHome.php'"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                        <div class="col-lg-5" style="position: fixed; top: 150px; left: 850px;"> 
                            <img src="../images/addPerson.png" width="400" height="400">
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- /#page-content-wrapper -->

        </div>

        <?php include '../interfaces/footer.php' ?>
        <script src = "../assets/js/addNewSubjectValidation.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>
