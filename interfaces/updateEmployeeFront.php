<?php
session_start();
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
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">


                        <?php
                        $roletypeID = $designationIdLoggedUser = $LoggedUsernic = '';
                        $roletypeID = 1;
                        $designationIdLoggedUser = 1;
                        $LoggedUsernic = '921003072v';
                        require("../classes/Employee.php");
                        $employee = new Employee();
                        // submit button action
                        if (isset($_POST['submit'])) {
                            global $LoggedUsernic;
                            $searchUsernic = "";

                            $searchUsernic = $_POST['nic'];

                            $result = $employee->findEmployee($searchUsernic, $roletypeID, $designationIdLoggedUser, $LoggedUsernic);

                            if (sizeof($result) == 0) {
                                echo '<script language="javascript">';
                                echo 'alert("Not Found This Nic,Try again!!!  Thank You.")';
                                echo '</script>';
                                
                            } else {
                                
                                $_SESSION['designationType'] = $result['designationTypeID'];

                                $_SESSION['nicNumber'] = $result['nic'];
                                $_SESSION['Address'] = $result['currentAddress'];
                                $_SESSION['roleType'] = $result['roleType'];
                                $_SESSION['nameWithInitials'] = $result['nameWithInitials'];
                                $_SESSION['fullName'] = $result['fullName'];
                                $_SESSION['employementID'] = $result['employeementID'];
                                $_SESSION['emailAddress'] = $result['email'];
                                $_SESSION['gender'] = $result['gender'];
                                $_SESSION['marrigeState'] = $result['marrigeState'];
                                $_SESSION['mobileNumber'] = $result['mobileNum'];



                                header("Location: updateEmployeeForm.php");
                            }

                            //echo $result['marrigeState']; 
                            // echo $roletype;
                        }
                        ?>

                        <div align="center" style="padding-bottom:10px;">
                            <h1>Update Employee</h1>
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="validationForm();">

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- NIC number-->
                                            <label for="firstName" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;">Enter NIC Number </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" required class="form-control" id="nic" name="nic" placeholder="Enter NIC number"/>
                                                <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
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


            <script src = "../assets/js/addEmployee.js"></script>

            <?php include 'footer.php' ?>

            <script src="../assets/js/jquery.js"></script>


            <script src="../assets/js/bootstrap.min.js"></script>
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>
            <script src = "../assets/js/addEmployee.js"></script>


        </div>
    </body>

</html>
