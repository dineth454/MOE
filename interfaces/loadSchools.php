<?php
require("../classes/dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();
// load zonal offices according to Provice Office ID into addEmployee page
 
$q = intval($_GET['q']);




// select data from database

$sql="select schoolID,schoolName from school where zonalOfficeID = '".$q."'";
$result = mysqli_query($mysqli,$sql);

echo "<select>";
echo '<option value="">Select School</option>';
while($row = mysqli_fetch_array($result)) {
    //print_r($row);
    echo '<option value="'.$row['schoolID'].'" >'.$row['schoolName'].'</option>';
	
	//echo "\r\n";
}
echo "</select>";
mysqli_close($mysqli);
?>