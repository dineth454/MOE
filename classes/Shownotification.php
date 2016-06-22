<?php
// machan dbcon.php eken connection eka gattha nm hondai neda?
$mysqli = new mysqli("localhost", "gtms", "gtms", "moe");


class Shownotification{

    function notResualt(){
        global $mysqli;
        $sqlQuery = "SELECT * FROM notification";
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



}

 ?>