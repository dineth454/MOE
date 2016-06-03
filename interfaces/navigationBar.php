<?php
session_start();
?>

<?php
//if logged out or time out user prompt to loggin again
ob_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
//header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

if (!isset($_SESSION['fullName']) || time() - $_SESSION['login_time'] > 600) {
    header('Location: SystemLogin.php');
    exit();
} else {
    $_SESSION['login_time'] = time();
}
ob_end_flush();
?>

<nav class="navbar navbar-default" style="height: 65px; border-radius:0px;">

    <div class="col-md-3 pull-right" style="margin-top: 18px;">
        <label></label>
        <a href="#" >
            <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["fullName"] ?> 
        </a>
        <div class="pull-right" style="padding-right: 21px;">
            <a href="../classes/signout.php">Sign out</a></div>

    </div>

</nav>
