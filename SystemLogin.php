
<?php
require("loginClass.php");


if(isset($_POST["submit"])){
	$user = $_POST["username"];
	$pass = sha1($_POST["password"]);
	
	$login = new Login();
	$login->syslog($user, $pass);

} 
?>

<!DOCTYPE html>
<html>
<body>
<h1>Login</h1><br><br>
<form action="" method="POST">
<div>Username: <input type="text" name="username"></div><br>
<div>Password: <input type="password" name="password"></div><br>
<input type="submit" name="submit" value="login">
</form>
</body>
</html> 