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

        <title>Update Subject</title>

        

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
            <?php include 'sidebar_min_off.php' ?>
            <?php include '../interfaces/navigation_bar.php' ?>
            <!--____________________________________________________________________________-->
            <!-- Sidebar Menu Items-->
             <!-- Sidebar -->
            
            <!-- /#sidebar-wrapper -->
            <!-- /.navbar-collapse -->
        </nav>

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">

                    <div align="center" style="padding-bottom:10px;">
                            <h1 class="topic_font">Update Subject</h1>
                        </div>

                        <form name="addEmployeeForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit="return(validateForm())"  novalidate>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <?php 
                                        if (isset($_POST['submit'])) {
                                            
                                            $subcode = strtoupper($_POST["subcode"]);
                                            $subname = $_POST["subname"];
                                            $subid = $sub->getsubjectid($_SESSION["subjectcode"]);

                                            $rescode = $sub->subjectcodeselect($subid,$subcode);
                                            $resname = $sub->subjectnameselect($subid,$subname);


                                            
                                            if ($rescode > 0) {
                                                echo '<script language="javascript">';
                                                echo 'alertify.alert("Subject code alreadt exists!!")';
                                                echo '</script>';
                                                
                                            }
                                            elseif ($resname > 0) {
                                                echo '<script language="javascript">';
                                                echo 'alertify.alert("This Subject name alreadt exists!!")';
                                                echo '</script>';
                                            }

                                            else{
                                                $res=$sub->updatesubject($subid, $subcode, $subname);
                                                echo '<script language="javascript">
                                                        alertify.confirm("Update successfully!", function (e) {
                                                        if (e) {
                                                            window.location.href="ministryOfficerHome.php";
                                                        }
                                                        });
                                                    </script>';
                                            }

                                        }
                                     ?>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- new subject code-->
                                            <label for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;">Subject code </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input maxlength="10" type="text" requied value= <?php echo $_SESSION["subjectcode"]; ?> class="form-control" id="subcode" name="subcode" placeholder="Enter Subject code"/>
                                                <label id="errorsubcode" style="font-size:10px"> </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- new subject name-->
                                            <label for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;">Subject name </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input maxlength="10" type="text" requied value= <?php echo $sub->getsubjectname($_SESSION["subjectcode"]); ?> class="form-control" id="subname" name="subname" placeholder="Enter Subject name"/>
                                                <label id="errorsubcode" style="font-size:10px"> </label>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary" style="width: 100px;">Update</button>
                                            </div>

                                        </div>
                                    </div>
                                    

                                    

                                </div>

                        </form>
                    </div>



                </div>
            </div>

            <!-- /#page-content-wrapper -->

        </div>

        <?php include '../interfaces/footer.php' ?>
        
        <script src = "../assets/js/addEmployee.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>

        <script src="../assets/js/jquery.js"></script>


        <script src="../assets/js/bootstrap.min.js"></script>





    </body>

</html>
