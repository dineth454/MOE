
<?php
require("classes/loginClass.php");


if (isset($_POST["submit"])) {
    $nic = $_POST["nic"];
    $pass = sha1($_POST["password"]);

    $login = new Login();
    $login->syslog($nic, $pass);

}
?>
<!DOCTYPE html>
<html>
    <meta charset="utf-8"/>
    <title>GTMS | Login</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
    <link href="assets/css/jquery-ui.css" rel="stylesheet">

    <script src="assets/js/formValidation.js"></script>
    <script src="assets/js/login_new.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery.validate.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>

    <!--============== additional ======================== -->
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="assets/css/home.css" rel="stylesheet">
        <link href="assets/css/smallbox.css" rel="stylesheet">

        <link href="assets/css/fonts_styles.css" rel="stylesheet">
        <link href="assets/css/navbar_styles.css" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="assets/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="assets/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="assets/css/smallbox.css" rel="stylesheet">
        <link href="assets/css/footer.css" rel="stylesheet">
        <!-- Alert start-->
        <link rel="stylesheet" href="alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="alertify/themes/alertify.default.css" />
        <script src="alertify/lib/alertify.min.js"></script>
        <!-- Alert end-->

  <script>
  $(function() {
    $( "#dialog-message" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  });
  </script>


    <body style="background: url(images/one.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
         <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#020816;" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- include Navigation BAr -->
                <?php include 'loginHeader.php' ?>
        </nav>


        <div class="container" style="position: fixed; top: 110px; left: 440px;">

            <div align="center" class="card card-container" style="background-color:#eeeeee;">
                <h5>Welcome!</h5>
                

                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card"></p>

                <form class="form-signin" name="loginForm" action="" method = "POST" onsubmit="return loginValidation();">
                    <div>
                        <span id="nicError" style="font-size:10px"></span>
                        <input class="form-control" type="text" name="nic" id="nic" placeholder = "Username" autofocus>
                    </div>

                    <div>
                        <span id="passwordError" style="font-size:10px"></span>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                    </div>

                    <div id="remember" class="checkbox"></div>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" id="signin" name="submit" >Sign in</button>
                </form>
                <a href="ForgatPasswordInterfase.php" class="forgot-password">
                    Forgot the password?
                </a>
            </div>
        </div>


    </body>
</html>
 