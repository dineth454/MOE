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
                
                $output .=   "<div id= '". $notid."' class='notification' ".
                            "   <div class='not-content-box col-md-10'>".

                            "       You have a <strong>". $type ."</strong> request     ".
                        //    "        NotID <strong>'". $notid ."' </strong> Type '". $type ."' , Action '". $action ."' ".
                            "        <div class='col-md-offset-7 col-md-5' style='padding-right: 0px;'>".$date."</div>".
                            "   </div>";
                            //"</div>";
                
            }
        }   
        echo $output;                        
    }

    function message($id){
        global $mysqli;
        $sqlQuery = "SELECT description FROM notification WHERE notID = '".$id."'";
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
        $sqlQuery = "SELECT sender FROM notification WHERE notID = '".$id."'";
        $Result = $mysqli->query($sqlQuery);
        $row =mysqli_fetch_assoc($Result);
        $sender_nic = $row['sender'];
        $query = "SELECT nameWithInitials FROM employee WHERE nic = '".$sender_nic."'";
        $Result1 = $mysqli->query($query);
        $fetch_result1 = mysqli_fetch_array($Result1);
        $sender = $fetch_result1['nameWithInitials'];
        return $sender;
    }

    function getname($nic){
        global $mysqli;
        $query = "SELECT nameWithInitials FROM employee WHERE nic = '".$nic."'";
        $Result1 = $mysqli->query($query);
        $fetch_result1 = mysqli_fetch_array($Result1);
        $name = $fetch_result1['nameWithInitials'];
        return $name;
    }

    function school($id){
        global $mysqli;
        $sqlQuery = "SELECT sender FROM notification WHERE notID = '".$id."'";
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
            echo '<script language="javascript">';
            echo 'alert("Message send successfully!")';
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



}

 ?>