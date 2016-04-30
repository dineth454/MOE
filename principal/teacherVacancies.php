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

        <title>Vacancies Teacher Form</title>


        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">
        <!--<link href="../assets/css/fonts_styles.css" rel="stylesheet">-->


    </head>

    <body>

        <div id="wrapper" > 

            <!-- Sidebar -->
            <?php include 'sideBarPrincipal.php' ?>
            <!-- /#sidebar-wrapper -->

            <!-- include Navigation BAr -->
            <?php include '../interfaces/navigationBar.php' ?>

            <!-- Finished NAvigation bar -->
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">
                        <?php
                        require("../classes/employee.php");
                        $employee = new Employee();

                        $designationIdLoggedUser = $_SESSION["designationTypeID"];
                        $LoggedUsernic = $_SESSION['nic'];

                        if (isset($_POST['submit'])) {
                            //principal kenekda balanawa
                            if ($designationIdLoggedUser == 4) {

                                $instituteId = $employee->getInstituteIDLoggedUser($LoggedUsernic);
                                $subjetcID = $_POST['subject'];
                                $noOfVacancies = $_POST['vacansies'];

                                $insertVacancies = $employee->insertVacancies($instituteId, $subjetcID, $noOfVacancies);

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



                        <div align="center" style="padding-bottom:10px;">
                            <h1>Vacancies</h1>
                        </div>

                        <form action="" method = "post"  onsubmit="return validateVacanciesForm()" novalidate>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">


                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div  class="form-group">
                                                <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style=" text-align: left;"> Select Subject :</label>
                                                <div id="subjectDiv" class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <select required class="form-control" name="subject" id="subject" >
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
                                                <input type="text" class="form-control" id="vacansies" name="vacansies" placeholder="Vacancies"/>
                                                <label id="errorVacancies" style="font-size:10px"> </label>
                                            </div>
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



                </div>
            </div>
            <!-- /#page-content-wrapper -->




            <?php 
            
            include '../interfaces/footer.php' ?>
            
            <script src="../assets/js/AddVacansiesValidation.js">
            <script src="../assets/js/jquery.js"></script>
            <script src="../assets/js/bootstrap.min.js"></script>
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>



        </div>
    </body>

</html>
