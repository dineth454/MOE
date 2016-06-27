<?php
ob_start();
//session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>GTMS | Transfer</title>

        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">

         <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        
        <link href="../assets/css/footer.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">



    </head>

    <body>

        <div id="wrapper" > 

           <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#020816;" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- include Navigation BAr -->
            <?php include '../interfaces/navigation_bar.php' ?>
            <!--____________________________________________________________________________-->
            <!-- Sidebar Menu Items-->
             <!-- Sidebar -->
            <?php
            include 'sideBarActivation.php';

            //sideBar Activation
            $navTransfer = "background-color: #0A1A42;";
            $textTransfer = "color: white;";

            $colTransfer = "collapse in";

            include 'sidebar_min_off.php'; ?>
            <!-- /#sidebar-wrapper -->
            <!-- /.navbar-collapse -->
            </nav>
            
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid" style="">
                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">
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
                                    header("Location: min_off_transferForm.php");
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
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 style="padding-bottom:40px;">Transfer Teacher</h1>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit="return(validatetranserForm())" novalidate>

                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                        <!-- NIC number-->
                                        <div class="form-group">
                                            <label for="nic" style="display: inline-block;">NIC Number</label>
                                            <input maxlength="10" type="text" required class="form-control" id="nic" name="nic" placeholder="Enter NIC Number" autofocus/>
                                            <label id="errorNicNumbertranser" style="font-size:10px"></label>
                                        </div>

                                        <div class="form-group" style="float: right;">
                                            <button style="width: 80px;" type="submit" name="submit" id="submit" class="btn btn-primary">Find</button>
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
            <!-- /#page-content-wrapper -->
            </div>
        </div>
            <!-- /#page-content-wrapper -->



            <?php include '../interfaces/footer.php' ?>
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>
            <script src="../assets/js/transerTeacherFrontnicValidation.js"></script>
            <!-- jQuery -->
            <script src="../assets/js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="../assets/js/bootstrap.min.js"></script>
        </div>
    </body>
</html>