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

        <title>Add New Subject</title>

        <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">


    </head>

    <body >

        <div id="wrapper">

            <!-- Sidebar -->
            <?php include 'sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->

            <!-- include Navigation BAr -->
            <?php include 'navigationBar.php' ?>

            <!-- Finished NAvigation bar -->

            <?php
            // echo $_SESSION['designationType'];
            if (isset($_POST['submit'])) {
                require '../classes/institute.php';



                $subject = $_POST['subject'];
                $LoggedUsernic = $_SESSION["nic"];
                $institute = new Institute();



                // check karanawa sys adminda kiala
                if ($LoggedUsernic == '921003072v') {
                    $insertSuccess = $institute->addSubject($subject);


                    if ($insertSuccess == 1) {
                        echo '<script language="javascript">';
                        echo 'alert("subject Added SuccessFully.Thankyou")';
                        echo '</script>';
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("error Occured While Adding data.check")';
                        echo '</script>';
                    }
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("You Dont Have Permission to do this action")';
                    echo '</script>';
                }
            }
            ?>

            <div id="page-content-wrapper" style="min-height: 540px;">
                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">

                        <div align="center" style="padding-bottom:10px;">
                            <h1>Add New Subject</h1>
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="return validateaddNewSubjectForm()" novalidate>

                            <div class="row">
                                <div class="form-group col-lg-8 col-md-18 col-sm-8">
                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Subject Name-->
                                            <label for="Subject" class="control-label col-xs-6  required" style="text-align: left; padding-left: 100px;padding-top: 6px;"> Subject :  </label>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject Name"/>
                                                <label id="errorSubject" style="font-size: 10px"> </label>
                                            </div>



                                        </div>

                                    </div>


                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="left: 85px;">
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

        </div>


        <!-- Bootstrap Core JavaScript -->
        <script src="../assets/js/addNewSubjectValidation.js"></script>
        <script src="../assets/js/jquery.js" ></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>



    </body>
</html>