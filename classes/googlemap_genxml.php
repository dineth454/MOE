<?php
//require("dbcon.php");
require("dbcon.php");
$db = new DBCon();
$mysqli = $db->connection();

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


// Opens a connection to a MySQL server
$connection=mysql_connect ('localhost', 'gtms', 'gtms');
if (!$connection) {
  die('Not connected : ' . mysql_error());
}



// Set the active MySQL database
$db_selected = mysql_select_db('moe',$connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM school WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}



header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE

//get count of no of teachers 
  $query1 = "SELECT COUNT(instituteID)AS no_teachers FROM employee WHERE instituteID= '".$row['instituteID'] ."'";
  $result1 = $mysqli->query($query1);
  
  $fetch_result1 = mysqli_fetch_array($result1);
  $no_schools = $fetch_result1['no_teachers'];

//get school type
  $query2 = "SELECT schoolType AS type_school FROM `school_type` where schoolTypeID= '".$row['schoolTypeID'] ."'";
  $result2 = $mysqli->query($query2);
  
  $fetch_result2 = mysqli_fetch_array($result2);
  $get_school_type = $fetch_result2['type_school'];


  echo '<marker ';
  echo 'name="' . parseToXML($row['schoolName']) . '" ';
  echo 'no.teachers="' . $no_schools. '" ';
  echo 'no.students="' . parseToXML($row['numOfStudents']) . '" ';
  echo 'type="' . $get_school_type. '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  //echo 'type="' . $row['type'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>
