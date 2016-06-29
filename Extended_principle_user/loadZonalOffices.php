<?php
// load zonal offices according to Provice Office ID in to addEmployee.php
require("../classes/dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();
 
$q = intval($_GET['q']);

// select data from database

$sql="select zonalID,zonalName from zonal_office where provinceOfficeID = '".$q."'";
$result = mysqli_query($mysqli,$sql);

echo '<option value="">Select ZonalOffice</option>';
while($row = mysqli_fetch_array($result)) {
    //print_r($row);
    echo '<option value='.$row['zonalID'].' >'.$row['zonalName'].'</option>';
	
	//echo "\r\n";
}

mysqli_close($mysqli);
?>