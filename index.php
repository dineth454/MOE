
<!DOCTYPE html>
<html lang="en">
<head>

<script src="assets/js/login_new.js"></script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery.validate.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="assets/css/login.css" rel="stylesheet">


</head>
<body>

<?php
    require("classes/Login.php");

    if (isset($_POST['signin'])) {

        $email = $password = "";

        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
		
		// create login class instance
		$loginData = new Login();

		//call login_data function in Login class
        $result = $loginData->login_data($email,$password);
       

        if($result == 1){
            header('location:home.php');
        }

       

    }
    elseif (isset($_POST['signUp'])) {
        
        header('location:registerView.php');
    }
?>

<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        <div class="card card-container">
           
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address"  autofocus>
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" >
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" id="signin" name="signin" >Sign in</button>
				
            </form><!-- /form -->

            <a href="ForgatPasswordInterfase.php" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
	
	

</body>

	

