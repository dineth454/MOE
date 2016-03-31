
<?php
require("classes/loginClass.php");


if(isset($_POST["submit"])){
	$user = $_POST["username"];
	$pass = sha1($_POST["password"]);
	
	$login = new Login();
	$login->syslog($user, $pass);

} 
?>

<!DOCTYPE html>
<html>
<title>Login</title>
    <link href="assets/css/systemlogin.css" rel="stylesheet">

<body>
	<div class="background-image"></div>
	<div>
		<div class="content box">
			
		</div>
		<div class="textbox">
			<h3 style="margin-left: 170px;font-size: 30;">LOGIN</h3>
			<div class="login-text">
				<form action="home.html">
					<div class="text-field">Username: <input style="margin-left: 30px;height: 23px;" type="text" name="username"><br></div>
					<div class="text-field">Password: <input style="margin-left: 34px;height: 23px;" type="password" name="password"><br></div>
					<div style="margin-top:16;">
					<input type="checkbox" style="font-family: initial;" value="#">Remember me<input type="submit" class="btn btn-primary"style="margin-left: 101px;" value="login"></div>
				</form>
			</div>
		</div>
	</div>


<!--

<h1>Login</h1><br><br>
<form action="" method="POST">
<div>Username: <input type="text" name="username"></div><br>
<div>Password: <input type="password" name="password"></div><br>
<input type="submit" name="submit" value="login">   -->
</form>
</body>
</html> 