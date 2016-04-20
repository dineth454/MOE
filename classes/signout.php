<?php
	session_start();
	session_unset();
	session_destroy();
	header("location: ../interfaces/SystemLogin.php");
	exit();

?>

