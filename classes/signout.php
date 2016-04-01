<?php 
	session_start();
	session_unset();
	session_destroy();
	ob_start();
	header("location:../SystemLogin.php");
	ob_end_flush(); 
	include '../SystemLogin.php';
	//include 'home.php';
	exit();
?>
