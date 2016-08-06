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

        <title>GTMS | Members</title>



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
        <link href="..assets/css/plugins/morris.css" rel="stylesheet">

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

    <body>
        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#020816;" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- include Navigation BAr -->
                <?php include '../interfaces/navigation_bar.php' ?>
                <!--____________________________________________________________________________-->
                <!-- Sidebar Menu Items-->
                <!-- Sidebar -->

                <?php
                include 'Extended_principle_sidebar_activation.php';

                

                include 'Extended_principle_sidebar.php'; ?>
                <!-- /#sidebar-wrapper -->
                <!-- /.navbar-collapse -->
            </nav>

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">

                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">
                        <?php 

                        require("../classes/employee.php");
                        $employee = new Employee();
                        $designationIdLoggedUser = $_SESSION["designationTypeID"];
                        $LoggedUsernic = $_SESSION['nic'];
                        $sender = $_SESSION["nic"];
                        $not = new Shownotification();
                        

                        if (isset($_POST['submit'])) {
                            //principal kenekda balanawa
                            if ($designationIdLoggedUser == 4) {

                                $instituteId = $employee->getInstituteIDLoggedUser($LoggedUsernic);
                                $subjetcID = $_POST['subject'];
                                $noOfVacancies = $_POST['vacansies'];
                                $id = $not->gennotid();

                                $insertVacancies = $employee->insertVacancies($instituteId, $subjetcID, $noOfVacancies, $id, $sender);

                                if ($insertVacancies == 1) {
                                    echo '<script language="javascript">';
                                    echo 'alert("Vacanci Added SuccessFully.Thankyou")';
                                    echo '</script>';
                                } else {
                                    echo '<script language="javascript">';
                                    echo 'alert("Error Occurd While Inserting data")';
                                    echo '</script>';
                                }
                            } else {
                                echo '<script language="javascript">';
                                echo 'alert("You are Not allowed to do this Action")';
                                echo '</script>';
                            }
                        }
                         ?>
                        

                        <!-- New Part-->
                        <div class="row">
                            <div class="col-lg-7">

                                <h1 style="padding-bottom:40px;">Add Teacher Vacancy</h1>

                                <form action="" method = "post"  onsubmit="return validateVacanciesForm()" novalidate>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">


                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div  class="form-group">
                                                <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style=" text-align: left;"> Select Subject :</label>
                                                <div id="subjectDiv" class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <select required class="form-control" name="subject" id="subject" style="width: 170px;">
                                                        <option value="">-Select Subject-</option>
                                                        <?php
                                                        $result = $employee->loadSubjects();

                                                        foreach ($result as $array) {

                                                            echo '<option  value="' . $array['subjectID'] . '" >' . $array['subject'] . '</option>';
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <label id="errorSubject" style="font-size: 10px"> </label>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Vacancies-->
                                            <label for="Vacansies" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> No Of Vacancies </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" class="form-control" id="vacansies" name="vacansies" placeholder="Vacancies" style="width: 170px;"/>
                                                
                                            </div>
                                            <label id="errorVacancies" style="font-size:10px"> </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                        </div>
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

        <script src = "../assets/js/addEmployee.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>





    </body>

</html>