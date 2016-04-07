
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

    if (isset($_POST['updatePassword'])) {

        $email = $password = $newPassword =  "";

        $email = $_POST['inputEmail'];

        $newpassword = $_POST['inputNewPassword'];

        $reTypePassword = $_POST['inputReTypePassword'];

        if($email != '' && ($newpassword == $reTypePassword)){
			
			//create login instance
			$updatePassword  = new Login();
			//call updatePassword methode
        	$result = $updatePassword->updatePassword($email,$newpassword);

        	if($result == 1){
				header('location:index.php');
        	}
        }else{

        	$message = "Email Required , Password not Updated , try again";
			echo "<script type='text/javascript'>alert('$message');</script>";
			//header('location:ForgatPasswordInterfase.php');
        }

        
        //echo "kalinga";

        

       

    }
   
?>

<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        <div class="card card-container">
           
            
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address"  autofocus>
                <input type="password" id="inputNewPassword" name="inputNewPassword" class="form-control" placeholder="New-Password" >
                <input type="password" id="inputReTypePassword" name="inputReTypePassword" class="form-control" placeholder="ReType-Password" >

                </br></br></br>
               
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" id="updatePassword" name="updatePassword" >Update Password</button>
				
            </form><!-- /form -->

            
        </div><!-- /card-container -->
    </div><!-- /container -->
	
	

</body>

	

