<?php // content="text/plain; charset=utf-8"
function GenGraph () {
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_bar.php');


$link = mysql_connect('localhost', 'gtms', 'gtms')
		   or die('Could not connect: ' . mysql_error());
		     
mysql_select_db('moe') or die('Could not select database');
  
$dataArray=array();
  
//get data from database
$sql="SELECT subject.subject, COUNT(subject.subject) AS cont
FROM subject
LEFT JOIN teacher
ON subject.subjectID=teacher.appoinmentSubject
GROUP BY subject.subject";

$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $salesgroup=$row["subject"];
      $count=$row["cont"];
      //add to data areray
      $dataArray[$salesgroup]=$count;
  }
}

$aa = array();
$bb = array();
foreach($dataArray as $key => $value)
{
  $mykey = $key;
  $myval = $value;

  array_push($aa,$myval);
  array_push($bb,$mykey);


}

/*
for ($i=0; $i < sizeof($dataArray)-1 ; $i++) { 
	foreach($dataArray as $key => $value)
	{
	   $mykey = $key;
	   $myval = $value;

	   $bb[$i] = $myval;
	   break;
	}

}
print_r($bb); */


$datay=$aa;


// Create the graph. These two calls are always required
$graph = new Graph(460,290,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->yaxis->SetTickPositions(array(0,2,4,6,8,10), array(1,3,5,7,9));
$graph->SetBox(true);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels($bb);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("#002E62","#002E62",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);
$graph->title->Set("Teachers");
unlink("fff.png");
// Display the graph
$graph->Stroke("fff.png");

}
?>