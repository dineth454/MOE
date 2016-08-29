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

        <title>GTMS | Profile</title>



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
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- include Navigation BAr -->
                <?php include '../interfaces/navigation_bar.php' ?>
                <!--____________________________________________________________________________-->
                <!-- Sidebar Menu Items-->
                <!-- Sidebar -->

                <?php
                include 'sideBarActivation.php';;
                include 'sidebar_admin.php'; ?>
                <!-- /#sidebar-wrapper -->
                <!-- /.navbar-collapse -->
            </nav>

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">

                    <div class="col-lg-9 col-lg-offset-1" style="padding-top: 50px;">

                        <?php
                        $LoggedUsernic = $_SESSION["nic"];
                        $LoggedUserEmail = $_SESSION["email"];
                        $LoggedUserName = $_SESSION["nameWithInitials"];

                        require("../classes/employee.php");
                        $employee = new Employee();

                        $result1 = $employee->getPass($LoggedUsernic);
                        $passOfLoggedUser = $result1['password'];


                        if (isset($_POST['submit'])) {

                            $currentPass = sha1($_POST['cPass']);
                            $nonEncNewPass = $_POST['nPass'];
                            $newPass = sha1($_POST['nPass']);
                            $confirmNewPass = sha1($_POST['cnPass']);

                            if($passOfLoggedUser == $currentPass){
                                if($newPass == $confirmNewPass){

                                    $isUpdateOk = $employee->updatePass($LoggedUsernic, $newPass);
                                    if($isUpdateOk == 1){
                                        require '../PHPMailer/PHPMailerAutoload.php';

                                        $mail = new PHPMailer(); // create a new object
                                        $mail->IsSMTP(); // enable SMTP
                                        //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                                        $mail->SMTPAuth = true; // authentication enabled
                                        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
                                        $mail->Host = "smtp.gmail.com";
                                        $mail->Port = 587; // or 587
                                        $mail->IsHTML(true);
                                        $mail->Username = "moe.gtms@gmail.com";
                                        $mail->Password = "gtmsapesystemeka";
                                        $mail->SetFrom("moe.gtms@gmail.com");
                                        $mail->Subject = "New Password";

                                        $mail->Body = "hi <strong>".$LoggedUserName.",</strong><br/><br/>Your new password is here. please collect it and log to the GTMS system.<br/><strong>Password - ".$nonEncNewPass."</strong><br/><br/><br/>Thank You!" ;
                                        $mail->AddAddress($LoggedUserEmail);

                                        if(!$mail->Send()) {
                                            echo "Mailer Error: " . $mail->ErrorInfo;
                                        } else {
                                            //echo "Message has been sent";
                                        }

                                        echo '<script language="javascript">';
                                        echo 'alertify.alert("Password is changed successfully")';
                                        echo '</script>';

                                    }else{
                                        echo '<script language="javascript">';
                                        echo 'alertify.alert("Password is not changed. try again!")';
                                        echo '</script>';
                                    }

                                }else{
                                    echo '<script language="javascript">';
                                    echo 'alertify.alert("Confirmation of new password is failed. try again!")';
                                    echo '</script>';  
                                }

                            }else{
                                echo '<script language="javascript">';
                                echo 'alertify.alert("Your current password is incorrect!")';
                                echo '</script>';
                            }
                        }
                        ?>

                        <!-- New Part-->
                        <div class="row">
                            <div class="col-lg-7">

                                <h1>My Profile</h1>
                                <div style="padding-bottom:40px;">
                                <span >Enter details to change password</span>
                                </div>

                                <form name="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit="return(changePassValidateForm())"  novalidate>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Current Password-->
                                            <div class="form-group">
                                                <label for="cPass">Current Password</label>
                                                <input type="password" class="form-control" id="cPass" name="cPass" placeholder="Enter Your Current Password" autofocus/>
                                                <label id="errorCPass" style="font-size:10px"></label>
                                            </div>

                                            <!-- New Password-->
                                            <div class="form-group">
                                                <label for="nPass">New Password</label>
                                                <input type="password" class="form-control" id="nPass" name="nPass" placeholder="Enter Your New Password"/>
                                                <label id="errorNPass" style="font-size:10px"> </label>
                                            </div>

                                            <!-- Confirm New password-->
                                            <div class="form-group">
                                                <label for="cnPass">Confirm New Password</label>
                                                <input type="password" class="form-control" id="cnPass" name="cnPass" placeholder="Re-enter Your New Password"/>
                                                <label id="errorCNPass" style="font-size:10px"> </label>
                                            </div>

                                            <div class="form-group" style="float: right">
                                                <button style="width: 80px;" type="submit" name="submit" id="submit" class="btn btn-primary">Done</button>
                                            </div>

                                            <div class="form-group" style="float: right; padding-right: 10px;">
                                                <input class="btn btn-primary" style="width: 80px;" type="button" value="Cancel" onclick="window.location.href='viewProfile.php'"/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-5" style="position: fixed; top: 150px; left: 850px;"> 
                                <img src="../images/editPass.jpg" width="400" height="400">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- /#page-content-wrapper -->

        </div>

<?php include '../interfaces/footer.php' ?>

        <script src = "../assets/js/changePass.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>





    </body>

</html>