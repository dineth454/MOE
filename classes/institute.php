<?php

require("dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();

class Institute {
    
    function addZonalOffice($provinceID, $zonlName){
        global $mysqli;
        $insertOK = 1;
        //Zonal office or not
        $instituteType = 3;
        
        // insert into institute tabel
        
        $Query = "insert into institute(instituteTypeID) values('$instituteType')";
        $result = $mysqli->query($Query);
        if($result != 1){
            $insertOK = 0;
        }else{
            $query2 = "select max(instituteID) from institute";
            $result2 = $mysqli->query($query2);
            $resultArray = mysqli_fetch_array($result2 );
            $instituteID = $resultArray['max(instituteID)'];
            
            
            if($result2->num_rows > 0){
                
                $query3 = "insert into  zonal_office(zonalName,instituteID,provinceOfficeID) values('$zonlName','$instituteID',$provinceID)";
                $result3 = $mysqli->query($query3);
                
                if($result3 != 1){
                    $insertOK = 0;
                }
            }
            
        }
        
        return $insertOK;
        
        
    }
    
}

?>
