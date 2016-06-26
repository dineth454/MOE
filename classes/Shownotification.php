<?php
// machan dbcon.php eken connection eka gattha nm hondai neda?
$mysqli = new mysqli("localhost", "gtms", "gtms", "moe");


class Shownotification{

    function notResualt(){
        global $mysqli;
        $sqlQuery = "SELECT * FROM notification ORDER BY notID DESC";
        $Result = $mysqli->query($sqlQuery);
        $output="";

        
            if (mysqli_num_rows($Result) > 0) {
                while ($row = mysqli_fetch_assoc($Result)) {
                    $notid = $row["notID"];
                    $type = $row["type"];
                    $action = $row["action"];
                    $des = $row["description"];
                    $date = $row["date"];
                    if (strcmp($action, 'tomoe') == 0) {
                    $output .=   "<div id= '". $notid."' class='notification' ".
                                "   <div class='not-content-box col-md-10'>".

                                "       You have a <strong>". $type ."</strong> request     ".
                            //    "        NotID <strong>'". $notid ."' </strong> Type '". $type ."' , Action '". $action ."' ".
                                "        <div class='col-md-offset-7 col-md-5' style='padding-right: 0px;'>".$date."</div>".
                                "   </div>";
                                //"</div>";
                    }
                }
            }   
        echo $output;      
        
                          
    }

    function notResualtTeacher($nic){
        global $mysqli;
        $sqlQuery = "SELECT * FROM notification WHERE sender = '".$nic."' ORDER BY notID DESC";
        $Result = $mysqli->query($sqlQuery);
        $output="";

        
            if (mysqli_num_rows($Result) > 0) {
                while ($row = mysqli_fetch_assoc($Result)) {
                    $notid = $row["notID"];
                    $type = $row["type"];
                    $action = $row["action"];
                    $des = $row["description"];
                    $date = $row["date"];
                    if (strcmp($action, 'toteacher') == 0) {
                    $output .=   "<div id= '". $notid."' class='notification_teacher' ".
                                "   <div class='not-content-box col-md-10'>".

                                "       You have a <strong>". $type ."</strong> request     ".
                            //    "        NotID <strong>'". $notid ."' </strong> Type '". $type ."' , Action '". $action ."' ".
                                "        <div class='col-md-offset-7 col-md-5' style='padding-right: 0px;'>".$date."</div>".
                                "   </div>";
                                //"</div>";
                    }
                }
            }   
        echo $output;      
        
                          
    }

    function getnotcount(){
        global $mysqli;
        $sqlQuery = "SELECT COUNT(*) AS notcount FROM notification WHERE action = 'tomoe'";
        $Result = $mysqli->query($sqlQuery);
        $fetch_result = mysqli_fetch_array($Result);
        $notcount = $fetch_result['notcount'];
        if ($notcount == 0) {
            $notcount = "";
        }
        return $notcount;
    }

    function getnotcountTeacher(){
        global $mysqli;
        $sqlQuery = "SELECT COUNT(*) AS notcount FROM notification WHERE action = 'toteacher'";
        $Result = $mysqli->query($sqlQuery);
        $fetch_result = mysqli_fetch_array($Result);
        $notcount = $fetch_result['notcount'];
        if ($notcount == 0) {
            $notcount = "";
        }
        return $notcount;
    }

    function message($id){
        global $mysqli;
        $sqlQuery = "SELECT description FROM notification_all WHERE notID = '".$id."'";
        $Result = $mysqli->query($sqlQuery);
        $fetch_result = mysqli_fetch_array($Result);
        $msg = $fetch_result['description'];
        return $msg;
    }

    function viewreply($id){
        global $mysqli;
        $sqlQuery = "SELECT reply FROM notification_all WHERE notID = '".$id."'";
        $Result = $mysqli->query($sqlQuery);
        $fetch_result = mysqli_fetch_array($Result);
        $msg = $fetch_result['reply'];
        return $msg;
    }

    function name($id){
        global $mysqli;
        $sqlQuery = "SELECT sender FROM notification_all WHERE notID = '".$id."'";
        $Result = $mysqli->query($sqlQuery);
        $row =mysqli_fetch_assoc($Result);
        $sender_nic = $row['sender'];
        $query = "SELECT nameWithInitials FROM employee WHERE nic = '".$sender_nic."'";
        $Result1 = $mysqli->query($query);
        $fetch_result1 = mysqli_fetch_array($Result1);
        $sender = $fetch_result1['nameWithInitials'];
        return $sender;
    }

    function nameMOE($id){
        global $mysqli;
        $sqlQuery = "SELECT reciever FROM notification_all WHERE notID = '".$id."'";
        $Result = $mysqli->query($sqlQuery);
        $row =mysqli_fetch_assoc($Result);
        $sender_nic = $row['reciever'];
        $query = "SELECT nameWithInitials FROM employee WHERE nic = '".$sender_nic."'";
        $Result1 = $mysqli->query($query);
        $fetch_result1 = mysqli_fetch_array($Result1);
        $sender = $fetch_result1['nameWithInitials'];
        return $sender;
    }


    function school($id){
        global $mysqli;
        $sqlQuery = "SELECT sender FROM notification_all WHERE notID = '".$id."'";
        $Result = $mysqli->query($sqlQuery);
        $row =mysqli_fetch_assoc($Result);
        $sender_nic = $row['sender'];
        $sqlQuery = "SELECT DISTINCT school.schoolName AS schoolname FROM school JOIN employee ON school.schoolID = employee.schoolID WHERE employee.nic = '".$sender_nic."'";
        $Result = $mysqli->query($sqlQuery);
        $fetch_result = mysqli_fetch_array($Result);
        $sender_school = $fetch_result['schoolname'];
        return $sender_school;
    }

    function reply($reply,$reciever,$id){
        global $mysqli;
        $query = "UPDATE notification_all SET reply = '".$reply."' , reciever = '". $reciever."', dateReply = NOW() WHERE notID = '".$id."'  ";
        $result = $mysqli->query($query);
        if ($result != 1) {
            echo '<script language="javascript">';
            echo 'alert("Sorry Message cannot send!")';
            echo '</script>';

        }
        else{
            $query1 = "UPDATE notification SET action = 'toteacher' , date = NOW() WHERE notID = '". $id."'";
            $result1 = $mysqli->query($query1);
            echo '<script language="javascript">';
            echo 'alert("Message send successfully!");';
            echo 'window.location.href="ministryOfficerHome.php";';
            echo '</script>';
            //header("Location: interface_0.1.php");
        }
    }


    function viewallnotifications(){
        global $mysqli;
        $sqlQuery = "SELECT * FROM notification_all ORDER BY notID DESC";
        $Result = $mysqli->query($sqlQuery);
        
        $output="";
        if (mysqli_num_rows($Result) > 0) {
            while ($row = mysqli_fetch_assoc($Result)) {
                $notid = $row["notID"];
                $type = $row["type"];
                $sender = $row["sender"];
                $des = $row["description"];
                $date = $row["date"];

                $query = "SELECT nameWithInitials FROM employee WHERE nic = '".$sender."'";
                $Result1 = $mysqli->query($query);
                $fetch_result1 = mysqli_fetch_array($Result1);
                $name = $fetch_result1['nameWithInitials'];
                
                $output .=   "<div id= '". $notid."' class='notificationAll' ".
                            "   <div class='not-content-box col-md-10'>".

                            "       ".$name." <strong>". $type ."</strong> request letter    ".
                        //    "        NotID <strong>'". $notid ."' </strong> Type '". $type ."' , Action '". $action ."' ".
                            "        <div class='col-md-offset-7 col-md-5' style='padding-right: 0px;'>".$date."</div>".
                            "   </div>";
                            //"</div>";
                
            }
        }   
        echo $output;                


    }

    function getmessagedate($id){
        global $mysqli;
        $query = "SELECT * FROM notification_all WHERE notid = '".$id."'";
        $result = $mysqli->query($query);
        $fetch_result = mysqli_fetch_array($result);
        $res = $fetch_result['date'];
        return $res;
    }

    function getmessagereplydate($id){
        global $mysqli;
        $query = "SELECT * FROM notification_all WHERE notid = '".$id."'";
        $result = $mysqli->query($query);
        $fetch_result = mysqli_fetch_array($result);
        $res = $fetch_result['dateReply'];
        return $res;
    }


    function sendrequest($notid,$des,$sender){
        global $mysqli;
        $query = "INSERT INTO `notification`(`notID`,`type`, `action`, `description`, `sender`) VALUES ('$notid','Transer','tomoe','$des','$sender')";
        $result = $mysqli->query($query);

        $query1 = "INSERT INTO `notification_all`(`notID`,`type`, `description`, `sender`, `date`) VALUES ('$notid','Transer','$des','$sender', NOW())";
        $result1 = $mysqli->query($query1);
    }

    function gennotid(){
        global $mysqli;
        $query = "SELECT COUNT(*) AS count FROM notification_all";
        $result = $mysqli->query($query);
        $fetch_result = mysqli_fetch_array($result);
        $res = $fetch_result['count'] +1;
        $out = "not".$res ;


        return $out;

    }

    function deletemsg($id){
        global $mysqli;
        $query = "DELETE FROM notification WHERE notID = '".$id."'";
        $result = $mysqli->query($query);

        
    }







}

 ?>