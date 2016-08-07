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
<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"><img src="../images/glogo.png" height="30" width="150"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown" id="notification_li">
                    <span id="notification_count" runat="server"><?php echo $not->getnotcount($_SESSION["designationTypeID"]); ?></span>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown" style="width: 382.22222px;">
                        <div id="notificationContainer">
                            <div id="notificationTitle">Notifications <a href="allNotification.php" style="float: right; margin-right: 25px;">See All</a></div>
                            <div id="notificationsBody" class="notifications" runat="server">

                            <?php 
                               $not->notResualt($_SESSION["designationTypeID"]);
                            ?>
                            </div>
                        </div>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION["fullName"] ?>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="viewProfile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li> -->
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li>
                            <a href="../classes/signout.php"><i class="fa fa-fw fa-power-off"></i> Sign Out</a>
                        </li>
                    </ul>
                </li>
            </ul>