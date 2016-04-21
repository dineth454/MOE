<?php 
require("dbcon.php");
$db = new DBCon();
$con = $db->connection();


class Institute{
	function addschool($provinceId, $zonalId, $school,$SchoolType,$NoOfStudents,$lat,$lang){
			global $con;

			

			$query_for_insert_institute_type = "INSERT into institute(instituteTypeID) values (4)";
			
            $result1= mysqli_query($con, $query_for_insert_institute_type);

            //echo $result111;

			

            $query_for_get_enterded_instituteID = "SELECT instituteID FROM institute ORDER BY instituteID DESC LIMIT 1;";
            $result = mysqli_query($con, $query_for_get_enterded_instituteID);

            if(mysqli_num_rows($result)==1) {
                while($row = mysqli_fetch_assoc($result)){
                    $institute_ID = $row["instituteID"];
                    
                }

            }

        

            

    
			$query_for_insert_values = "INSERT into school(schoolName,instituteID,provinceOfficeID,zonalOfficeID,SchoolTypeID,numOfStudents,lat,lng) values('$school','$institute_ID','$provinceId','$zonalId','$SchoolType','$NoOfStudents','$lat','$lang')";
        	//$insert_school_data = $con->query($query_for_insert_values);
            $insert_school_data = mysqli_query($con, $query_for_insert_values);


        	



		}



    
    function addZonalOffice($provinceID, $zonlName){
        global $con;
        $insertOK = 1;
        //Zonal office or not
        $instituteType = 3;
        
        // insert into institute tabel
        
        $Query = "insert into institute(instituteTypeID) values('$instituteType')";
        $result = $con->query($Query);
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
