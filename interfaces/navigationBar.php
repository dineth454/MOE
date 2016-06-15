<?php
session_start();
require("../classes/Shownotification.php");
$not = new Shownotification();
?>

<?php
//if logged out or time out user prompt to loggin again
ob_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
//header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

if (!isset($_SESSION['fullName']) || time() - $_SESSION['login_time'] > 60000) {
    header('Location: ../SystemLogin.php');
    exit();
} else {
    $_SESSION['login_time'] = time();
}
ob_end_flush();
?>

        <link href="../assets/css/notification.css" rel="stylesheet">

<nav class="navbar navbar-default" style="height: 65px; border-radius:0px;">

    <div class="col-md-3 pull-right" style="margin-top: 18px;padding-left: 0px;">

        <a href="viewProfile.php" >
            <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["fullName"] ?> 
        </a> 

<!--        <span id="notification_li">
            <span id="notification_count" runat="server"></span>
            <a href="#" id="notificationLink">
                <img src="../images/letter.png" style="width: 27px;"/>
            </a>
            <div id="notificationContainer">
                <div id="notificationTitle" runat="server">Notifications</div>
                    <div id="notificationsBody" class="notifications" runat="server">

                    <?php 

                       //$not->notResualt();
                        
                        
                    ?>
                    </div>
                <div id="notificationFooter"><a href="#">See All</a></div>
            </div>
        </span> -->
        <div class="pull-right" style="padding-right:50px;">
            <a href="../classes/signout.php">Sign out</a>
        </div>

    </div>

</nav>
