
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
    require("classes/login.php");

    if (isset($_POST['signin'])) {

        $nic = $password = "";

        $nic = $_POST['nicNumber'];
        $password = $_POST['inputPassword'];
		
		// create login class instance
		$loginData = new Login();

		//call login_data function in Login class
        $result = $loginData->login_data($nic,$password);
       

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
            <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return(validateForm())" >
                <span id="reauth-email" class="reauth-email"></span>
                <input type="nicNumber" id="nicNumber" name="nicNumber" class="form-control" placeholder="nicNumber"  autofocus>
				<label id="errorNicNumber" style="font-size:10px"> </label>
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" >
                <div id="remember" class="checkbox">
                    
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" id="signin" name="signin" >Sign in</button>
				
            </form><!-- /form -->

            <a href="ForgatPasswordInterfase.php" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
	
	<script type="text/javascript">
	
		function validateForm() {
                var errors = [];
				
				var nicNumber = document.getElementById("nicNumber").value;
                if (!validateNicNumber(nicNumber)) {
                    errors.push("errorNicNumber");
                }
				
				
                if (errors.length > 0) {
                    return false;
                }
                else {
                    return true;
                }
				
		}
	
	
	
		function validateNicNumber(text) {
                var pattern = /^[0-9]{9}(V|v){1}/;
                if (text == "" || text == null) {
                    document.getElementById("nicNumber").focus();
                    document.getElementById("nicNumber").style.borderColor = "red";
                    document.getElementById("errorNicNumber").innerHTML = "required";
                    document.getElementById("errorNicNumber").style.color = "red";
                    return false;
                }
                else if ((pattern.test(text)) == false || text.length < 10) {
                    document.getElementById("nicNumber").focus();
                    document.getElementById("nicNumber").style.borderColor = "red";
                    document.getElementById("errorNicNumber").innerHTML = "invalid type";
                    document.getElementById("errorNicNumber").style.color = "red";
                    return false;
                }
                else {
                    document.getElementById("nicNumber").style.borderColor = "green";
                    document.getElementById("errorNicNumber").innerHTML = "";
                    return true;
                }
            }
	
	</script>

</body>

	

