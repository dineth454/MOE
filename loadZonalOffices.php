<?php
// load zonal offices according to Provice Office ID
 
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','1234','moe');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

// select data from database

$sql="select instituteID,zonalName from zonal_office where provinceOfficeID = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<select >";
while($row = mysqli_fetch_array($result)) {
    //print_r($row);
    echo '<option value="'.$row['instituteID'].'" >'.$row['zonalName'].'</option>';
	
	//echo "\r\n";
}
echo "</select>";
mysqli_close($con);
?>