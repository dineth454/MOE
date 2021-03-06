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

        <title>Transer Teacher Form Front</title>


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
            <?php include 'sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->

            <!-- include Navigation BAr -->
            <?php include 'navigationBar.php' ?>

            <!-- Finished NAvigation bar -->
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">


                        <?php
                        $roletypeID = $_SESSION["roleTypeID"];
                        $designationIdLoggedUser = $_SESSION["designationTypeID"];
                        $LoggedUsernic = $_SESSION["nic"];

                        require("../classes/employee.php");
                        $employee = new Employee();
                        // submit button action
                        if (isset($_POST['submit'])) {
                            global $LoggedUsernic;
                            $searchUsernic = "";

                            $searchUsernic = $_POST['nic'];

                            //Systemadmin or ministry officer kenekta witharai transer karana ewa karanna puluwan
                            if ($designationIdLoggedUser == 1) {


                                $result = $employee->findEmployee($searchUsernic, $roletypeID, $designationIdLoggedUser, $LoggedUsernic);

                                $result3 = $employee->getPrincipalTeacherBasicDetails($searchUsernic);
                                $result4 = $employee->getTeacherSubjectDetails($searchUsernic);


                                if (sizeof($result) == 0) {
                                    echo '<script language="javascript">';
                                    echo 'alert("Not Found This Nic,Try again!!!  Thank You.")';
                                    echo '</script>';

                                    //teacher kenekda kiyala check karanawa
                                } else if ($result['designationTypeID'] == 5) {
                                    $_SESSION['transer']['designationType'] = $result['designationTypeID'];
                                    $_SESSION['transer']['nicNumber'] = $result['nic'];

                                    $_SESSION['transer']['nameWithInitials'] = $result['nameWithInitials'];

                                    //CurrentschoolName
                                    $_SESSION['transer']['schoolName'] = $result3['schoolName'];
                                    //currentAddress
                                    $_SESSION['transer']['currentaddress'] = $result['currentAddress'];
                                    //institute ID
                                    $_SESSION['transer']['instituteID'] = $result3['instituteID'];
                                    //redirect to this page
                                    header("Location: transerForm.php");
                                } else {
                                    echo '<script language="javascript">';
                                    echo 'alert("This NIC Not Belongs To Teacher,Try Again.")';
                                    echo '</script>';
                                }
                            } else {

                                echo '<script language="javascript">';
                                echo 'alert("You Dont Have Permission to do this")';
                                echo '</script>';
                            }
                        }
                        ?>

                        <div align="center" style="padding-bottom:10px;">
                            <h1>Transer Teacher</h1>
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post"  onsubmit="return validatetranserForm()" novalidate>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- NIC number-->
                                            <label  for="nic" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3" style="display: inline-block; text-align: left;">Enter NIC Number :</label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text"  class="form-control" id="nic" name="nic" placeholder="Enter NIC number"/>
                                                <label id="errorNicNumbertranser" style="font-size:10px"> </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Find</button>
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




            <?php include 'footer.php' ?>
            <script src="../assets/js/transerTeacherFrontnicValidation.js"></script>

            <script src="../assets/js/jquery.js"></script>



            <script src="../assets/js/bootstrap.min.js"></script>
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>



        </div>
    </body>

</html>
