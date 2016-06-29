
<?php
	require_once('tcpdf_include.php');

     //import employee class and related funcyions
    require("../classes/employee.php");
    $employee = new Employee();



     if (isset($_POST['submit'])) {

        if($_POST["designation"] != '' || $_POST["provinceID"] != '') {

        $query = "";
        $search_designation = "";
       
        $search_designation_four = "";

        $subject = $_POST["subject"];
    
    if ($_POST["designation"] != '') {
            $designation = mysql_real_escape_string($_POST["designation"]);
            $search_designation = " AND (designationTypeID = '$designation')";
        
        if($_POST["designation"] == 5){
            
            if($_POST["provinceID"] != '' && $_POST["zonalID"] != '' && $_POST["schoolId"] != ''){
                $provinceID = $_POST["provinceID"];
                $zonalID = $_POST["zonalID"];
                $schoolID = $_POST["schoolId"];
                $search_designation_four = " AND (province_OfficeID = '$provinceID') AND (zonalOffics_ID = '$zonalID') AND (SchoolID = '$schoolID')";
                                            
            }
            else if($_POST["provinceID"] != '' && $_POST["zonalID"] != '' && $_POST["schoolId"] == ''){
                $provinceID = $_POST["provinceID"];
                $zonalID = $_POST["zonalID"];
                $search_designation_four = " AND (province_OfficeID = '$provinceID') AND (zonalOffics_ID = '$zonalID')";

            }
            else if($_POST["provinceID"] != ''){
                $provinceID = $_POST["provinceID"];
                $search_designation_four = " AND (province_OfficeID = '$provinceID')";
            }
            else{
                $search_designation_four = "";
            }
                                        
        }
}
//subject Eka thorala neeeee
    if($subject == ''){

        $query = "SELECT * FROM employee WHERE roleType > 0".$search_designation.$search_designation_four;
        $result = mysqli_query($mysqli, $query);

    //Subject Ekak Theruwoth    
    }else{

        if($_POST["provinceID"] != '' && $_POST["zonalID"] != '' && $_POST["schoolId"] != ''){
                $provinceID = $_POST["provinceID"];
                $zonalID = $_POST["zonalID"];
                $schoolID = $_POST["schoolId"];
                //$search_designation_four = " AND (province_OfficeID = '$provinceID') AND (zonalOffics_ID = '$zonalID') AND (SchoolID = '$schoolID')";
                $query = "SELECT employee.nic,employee.fullName,employee.employeementID,employee.email,subject.subject from employee Inner join teacher on employee.nic = teacher.nic inner join subject on teacher.appoinmentSubject = subject.subjectID and subject.subjectID = '".$subject."' and employee.province_OfficeID = '".$provinceID."' and employee.zonalOffics_ID = '".$zonalID."' and employee.SchoolID = '".$schoolID."'";
                $result = mysqli_query($mysqli, $query);
                             
            }
            else if($_POST["provinceID"] != '' && $_POST["zonalID"] != '' && $_POST["schoolId"] == ''){
                $provinceID = $_POST["provinceID"];
                $zonalID = $_POST["zonalID"];
               // $search_designation_four = " AND (province_OfficeID = '$provinceID') AND (zonalOffics_ID = '$zonalID')";
                $query = "SELECT employee.nic,employee.fullName,employee.employeementID,employee.email,subject.subject from employee Inner join teacher on employee.nic = teacher.nic inner join subject on teacher.appoinmentSubject = subject.subjectID and subject.subjectID = '".$subject."' and employee.province_OfficeID = '".$provinceID."' and employee.zonalOffics_ID = '".$zonalID."' ";
                $result = mysqli_query($mysqli, $query);
            }
            else if($_POST["provinceID"] != ''){
                $provinceID = $_POST["provinceID"];
               // $search_designation_four = " AND (province_OfficeID = '$provinceID')";
                $query = "SELECT employee.nic,employee.fullName,employee.employeementID,employee.email,subject.subject from employee Inner join teacher on employee.nic = teacher.nic inner join subject on teacher.appoinmentSubject = subject.subjectID and subject.subjectID = '".$subject."' and employee.province_OfficeID = '".$provinceID."' ";
                $result = mysqli_query($mysqli, $query);
            }
            else{
               // $search_designation_four = "";
                $query = "SELECT employee.nic,employee.fullName,employee.employeementID,employee.email,subject.subject from employee Inner join teacher on employee.nic = teacher.nic inner join subject on teacher.appoinmentSubject = subject.subjectID and subject.subjectID = '".$subject."'";
                $result = mysqli_query($mysqli, $query);
            }

        

    }
   

    

 
    }
}
                        


//////////////////////// Report Generation /////////////////////////////////////////

                                
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}


$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetFont('helvetica', '', 9);
$pdf->AddPage();
     
            

       if($subject != ''){
            //$html = '<h1>GTMS</h1>';

            $html .= '<table cellspacing="15" cellpadding="1" border="0">';
            $html .= '<tr style="background-color:#4d94ff;text-align:center">';
            $html .= '<th >NIC</th>'  ; 
            $html .= '<th>Name</th> ' ;
            $html .= '<th>Employment ID</th> ' ;
            $html .= '<th>Email</th> ' ;
            $html .= '<th>Subject</th> ' ;

       }else{
            // $html = '<h1>GTMS</h1>';
            $html .= '<table width="600px" cellspacing="15" cellpadding="1" border="0">';
            $html .= '<tr style="background-color:#4d94ff;text-align:center" >';
            $html .= '<th>NIC</th>'  ; 
            $html .= '<th>Name</th> ' ;
            $html .= '<th>Employment ID</th> ' ;
            $html .= '<th>Email</th> ' ;
    

       }                         

   

                                       
    $html .= '</tr>';


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
                                        
            $rslt_ID = $row['nic'];
			$html .= '<tr style="text-align:center;">';
            if($subject != ''){
                $html .= '<td>' .$row['nic'].'</td>';
                $html .= '<td>' .$row['fullName'].'</td>';
                $html .= '<td>' .$row['employeementID'].'</td>';
                $html .= '<td>' .$row['email'].'</td>';
                $html .= '<td>' .$row['subject'].'</td>';

            }else{
                 $html .= '<td>' .$row['nic'].'</td>';
                 $html .= '<td>' .$row['fullName'].'</td>';
                $html .= '<td>' .$row['employeementID'].'</td>';
                 $html .= '<td>' .$row['email'].'</td>';
            }

		   
		                                    
		    $html .= '</tr>';
        }
    }
                                
    $html .= '</table>';
   /* $html .=  '</body>';
    $html .=   '</html>' ; */
    $pdf->writeHTML($html, true, 0, true, 0);
    $pdf->lastPage();
    ob_end_clean();
    $pdf->Output('htmlout.pdf', 'I');
//////////////////// End Report Generation /////////////////////////////////
?>