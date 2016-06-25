<?php
session_start();
if(isset($_POST['submit'])){

	$UserName = $_POST['username'];
	$password = $_POST['password'];
   
    
    $name1 = 'kalinga';


}



require_once('tcpdf_include.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



////////////////////////////////////

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetFont('helvetica', '', 9);
$pdf->AddPage();



$html = '<h1>MOE</h1>';
$html .= '<table width="600px" border="1px">';
$html .= '<tr>';
$html .= '<th>UserName</th>'  ; 
$html .= '<th>Password</th> '   ;
    
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>' .$UserName.'</td>';
$html .= '<td>' .$password.'</td>';
    
 $html .= '</tr>';
$html .= '</table>';








$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();
ob_end_clean();
$pdf->Output('htmlout.pdf', 'I');

?>