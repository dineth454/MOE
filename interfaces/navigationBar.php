
<<<<<<< HEAD
<nav class="navbar navbar-default" style="height: 65px; border-radius:0px; margin-bottom: 0px;">
=======
<?php
session_start();
ob_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
//header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

if (!isset($_SESSION['fullName']) || time() - $_SESSION['login_time'] > 300) {
    header('Location: SystemLogin.php');
    exit();
}
else{
	$_SESSION['login_time'] = time();
}
ob_end_flush();
?>

<nav class="navbar navbar-default" style="height: 65px; border-radius:0px;">
>>>>>>> 2b81e26b0e0dbb27c6318618f041b60213655bfd
                <div class="col-md-3 pull-right" style="margin-top: 18px;">
                    <label><?php echo $_SESSION["fullName"]?></label>
                    <div class="pull-right"><a href="../classes/signout.php">Sign out</a></div>

                </div>

</nav>
