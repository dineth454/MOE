
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


    <body>
        <div class="container">
            <div class="card card-container">
                <h3>LOGIN</h3>

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