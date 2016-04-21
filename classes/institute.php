<?php 
require("dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();


class Institute{
	function addschool($provinceId, $zonalId, $school,$SchoolType,$NoOfStudents,$lat,$lang){
			global $mysqli;

			

			$query_for_insert_institute_type = "INSERT into institute(instituteTypeID) values (4)";
			$result111 = $mysqli->query($query_for_insert_institute_type);

			$query_for_get_enterded_instituteID = "SELECT LAST(instituteID) FROM institute;";
			$institute_ID = $mysqli->query($query_for_get_enterded_instituteID);



			
        	//$result1 = $mysqli->query($query_for_insert_values);
			$query_for_insert_values = "INSERT into school(schoolName,instituteID,provinceOfficeID,zonalOfficeID,SchoolTypeID,numOfStudents,lat,lng) values('$school','$institute_ID','$provinceId','$zonalId','$SchoolType','$NoOfStudents','$lat','$lang')";
        	$insert_school_data = $mysqli->query($query_for_insert_values);
        	if($insert_school_data != 1){
        		
        		echo $insert_school_data;
        	}
        	



		}



    
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
