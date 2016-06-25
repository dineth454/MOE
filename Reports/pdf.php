
<?php
	require_once('tcpdf_include.php');

                        //get session data of logged user
    $roletypeID = $_SESSION["roleTypeID"];
    $designationIdLoggedUser = $_SESSION["designationTypeID"];
    $LoggedUsernic = $_SESSION["nic"];

                        //import employee class and related funcyions
    require("../classes/employee.php");
    $employee = new Employee();

    $result1 = $employee->getProvinceIdOfLoggedUser($LoggedUsernic);
    $provinceIdLoggedUser = $result1['provinceID'];

    $result2 = $employee->getZonalIDLoggedUser($LoggedUsernic);
    $zonalIdLoggedUser = $result2['zonalID'];

    $result3 = $employee->getSchoolIDOfLoggedUser($LoggedUsernic);
    $schoolIDLoggedUser = $result3['schoolID'];

                        

    if (isset($_POST['submit'])) {

        if($_POST["nic"] != '' || $_POST["fname"] != '' || $_POST["eId"] != '' ||
            $_POST["email"] != '' || $_POST["designation"] != '' || $_POST["provinceID"] != '') {

        $query = "";
        $search_nic = "";
        $search_fullName = "";
        $search_eID = "";
        $search_email = "";
        $search_designation = "";
        $search_designation_two = "";
        $search_designation_three = "";
        $search_designation_four = "";


        if ($_POST["nic"] != '') {
          $nic = strtoupper(mysql_real_escape_string($_POST["nic"]));
          $search_nic = " AND (nic LIKE '%$nic%')";
        }

        if ($_POST["fname"] != '') {
           $fullName = mysql_real_escape_string($_POST["fname"]);
           $search_fullName = " AND (fullName LIKE '%$fullName%')";
        }

        if ($_POST["eId"] != '') {
            $eID = mysql_real_escape_string($_POST["eId"]);
            $search_eID = " AND (employeementID LIKE '%$eID%')";
        }

        if ($_POST["email"] != '') {
            $email = mysql_real_escape_string($_POST["email"]);
            $search_email = " AND (email LIKE '%$email%')";
        }


        if ($_POST["designation"] != '') {
            $designation = mysql_real_escape_string($_POST["designation"]);
            $search_designation = " AND (designationTypeID = '$designation')";


        if($_POST["designation"] == 1){
            $search_designation = " AND (designationTypeID = '$designation')";
        }
        else if($_POST["designation"] == 2){
            if($_POST["provinceID"] != ''){
                $provinceID = $_POST["provinceID"];
                $search_designation_two = " AND (province_OfficeID = '$provinceID')";
                                            
            }else{
                $search_designation_two = "";
            }
                                        
        }
        else if($_POST["designation"] == 3){
            if($_POST["provinceID"] != '' && $_POST["zonalID"] != ''){
                $provinceID = $_POST["provinceID"];
                $zonalID = $_POST["zonalID"];
                $search_designation_three = " AND (province_OfficeID = '$provinceID') AND (zonalOffics_ID = '$zonalID')";
                            
        	}
            else if($_POST["provinceID"] != '' && $_POST["zonalID"] == ''){
               	$provinceID = $_POST["provinceID"];
                $zonalID = $_POST["zonalID"];
                $search_designation_three = " AND (province_OfficeID = '$provinceID')";
            }
            else{
                $search_designation_three = "";
            }
                                        
        }
        else if($_POST["designation"] == 4 || $_POST["designation"] == 5){
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

    $query = "SELECT * FROM employee WHERE roleType > 0".$search_nic.$search_fullName.$search_eID.$search_email.$search_designation.$search_designation_two.$search_designation_three.$search_designation_four;
	$result = mysqli_query($mysqli, $query);
 
    }
}
                        


//////////////////////// Report Generation /////////////////////////////////////////

                                
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetFont('helvetica', '', 9);
$pdf->AddPage();

                                

    $html = '<h1>GTMS</h1>';
    $html .= '<table width="600px" border="1px">';
    $html .= '<tr>';
    $html .= '<th>NIC</th>'  ; 
    $html .= '<th>Name</th> ' ;
    $html .= '<th>Employment ID</th> ' ;
    $html .= '<th>Email</th> ' ;
                                    
    $html .= '</tr>';


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
                                        
            $rslt_ID = $row['nic'];
			$html .= '<tr>';
		    $html .= '<td>' .$row['nic'].'</td>';
		    $html .= '<td>' .$row['fullName'].'</td>';
		    $html .= '<td>' .$row['employeementID'].'</td>';
		    $html .= '<td>' .$row['email'].'</td>';
		                                    
		    $html .= '</tr>';
        }
    }
                                
    $html .= '</table>';
    $pdf->writeHTML($html, true, 0, true, 0);
    $pdf->lastPage();
    ob_end_clean();
    $pdf->Output('htmlout.pdf', 'I');
//////////////////// End Report Generation /////////////////////////////////
?>