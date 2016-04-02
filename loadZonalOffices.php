<?php
// load zonal offices according to Provice Office ID
 
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','1234','moe');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

// select data from database

$sql="select zonalID,zonalName from zonal_office where provinceOfficeID = '".$q."'";
$result = mysqli_query($con,$sql);

echo '<option value="">Select ZonalOffice</option>';
while($row = mysqli_fetch_array($result)) {
    //print_r($row);
    echo '<option value='.$row['zonalID'].' >'.$row['zonalName'].'</option>';
	
	//echo "\r\n";
}

mysqli_close($con);
?>