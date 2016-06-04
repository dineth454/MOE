<?php 


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

                
                $output .=   "<div id= '". $notid."' class='notification' ".
                            "   <div class='not-content-box col-md-10'>".
                            "        NotID <strong>'". $notid ."' </strong> Type '". $type ."' , Action '". $action ."' ".
                            "        <div class='col-md-offset-5 col-md-7'>'2013/04/23'</div>".
                            "   </div>";
                            //"</div>";

                
            }
        }   
        echo $output;                        
    }
}

 ?>