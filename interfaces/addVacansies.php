<DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="../assets/css/navbar_styles.css" rel="stylesheet">


</head>

<body>

	


	<div id="wrapper">

            <!-- Sidebar -->
            <?php include 'sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->

            <!-- include Navigation BAr -->
            <?php include 'navigationBar.php' ?>

            <!-- Finished NAvigation bar -->
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 540px;">

            	 <?php
                        // echo $_SESSION['designationType'];
                        if (isset($_POST['submit'])) {
                            require '../classes/vacansies.php';
                            // get logged User details
                          
                            //$designationTypeID = $_SESSION["designationTypeID"];
                            //$nic = $_SESSION["nic"];
                            $vacancy = new Vacancy();

                            $nic = "921372744v";
                            
                            $provinceId = $vacancy->getProvinceIDFromNIC($nic);
                            $zonalId = $vacancy->getZonalIDFromNIC($nic);
                            echo $provinceId;

                            echo $zonalId;

                            $subject = $_POST['subject'];
                            $grade = $_POST['grade'];
                            $num_of_teachers = $_POST['num_of_teachers'];

                            $insertSuccess = $vacancy-> addVacancy($provinceId, $zonalId, $subject, $grade, $num_of_teachers);

                             
     
                           
                        }
                        ?>
            

            <div class="container-fluid">
            	
            	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="return(validateForm())" novalidate>

            		<div class="row">
               
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                        	<!-- subject-->
                            <label for="fullName" class="control-label col-xs-3 col-sm-3 col-md-3col-lg-3 required" style="display: inline-block; text-align: left;"> Subject </label>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <select required class="form-control " name="subject" id="subject" >


                                               
                                    <!--_____Query for load subjects____-->
                                    <?php
                                    

										/*require("../classes/dbcon.php");
										$db = new DBCon();
										$mysqli = $db->connection();
 
                                        $result=$vacancy-> loadsubject();

										// select data from database

										$sql="select subjectID,subject from subject";
										$result = mysqli_query($mysqli,$sql);

										echo '<option value="">Select Subject</option>';
										while($row = mysqli_fetch_array($result)) {
    									//print_r($row);
    										echo '<option value='.$row['subjectID'].' >'.$row['subject'].'</option>';
	
													//echo "\r\n";
										}

										// mysqli_close($mysqli);*/
									?>
									<!--______________________________-->
                                </select>
                                <label id="errorSubject" style="font-size:10px"> </label>
                            </div>
                        	
                        </div>

						<div class="form-group col-lg-12 col-md-12 col-sm-12">

                        	<!-- grade-->
                            <label for="grade" class="control-label col-xs-3 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Grade </label>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <input type="text" class="form-control" id="grade" name="grade" placeholder="Enter Grade Eg:6"/>
                                <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                            </div>
                        	
                        </div> 

                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                        	<!-- number of teachers-->
                            <label for="fullName" class="control-label col-xs-3 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Number of teachers </label>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <input type="text" class="form-control" id="num_of_teachers" name="num_of_teachers" placeholder="Enter the number of vacancies"/>
                                <!--<label id="errorLastName" style="font-size:10px"> </label>-->
                            </div>
                        	
                        </div>



                        <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3"style="padding-left: 68px;">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                        </div>
                                    </div>                        
                       

                    </div>

            		
            		

            	</form>
            </div>

                

    </div> 
    <!-- /#wrapper -->


    <!--______________________________________________-->

    <!--______________________________________________________________________________________________________________-->
        <!-- Data validation-->
        <script type="text/javascript">
            function validateForm() {
                var errors = [];

                if (!validateSubject("subject", "errorSubject")) {
                    errors.push("errorSubject");

                }
                /*if (!validateStudentNumber("students", "errorStudentNumber")) {
                    errors.push("errorStudentNumber");

                }
                if (!validateProvince("provinceID", "errorProvince")) {
                    errors.push("errorProvince");

                }
                if (!validateZonal("zonalID", "errorZonal")) {
                    errors.push("errorZonal");

                }
                if (!validateSchoolType("SchoolTypeSelect", "errorSchoolType")) {
                    errors.push("errorSchoolType");

                }
                if (!validateLatitude("latbox", "errorLat")) {
                    errors.push("errorLat");

                }
                if (!validateLongtitude("lngbox", "errorLng")) {
                    errors.push("errorLng");

                }
                if (errors.length > 0) {
                    return false;
                }*/ else {
                    return true;
                }
            }

            /*___School name validation function___*/
           /* function validateSchoolName(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please enter school name";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else if (!isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "School name can't be a number";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }
*/
            /*____Number of students validation function_____*/
           /* function validateStudentNumber(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please enter Number of students";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else if (!isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                } else {

                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Number of students can't be a letter";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                }
            }*/

            /*___Provine selection validation function___*/
            function validateSubject(text, errorLbl) {
                if (document.getElementById(text).value == "") {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "please select a Province";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }

            /*___Zonal selection validation function___*/
            /*function validateZonal(text, errorLbl) {
                if (document.getElementById(text).value == "") {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "please select a Zonal";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }
*/
            /*___School Type selection validation function___*/
            /*function validateSchoolType(text, errorLbl) {
                if (document.getElementById(text).value == "") {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "please select a schoolType";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }
*/

            /*___School destination latitude validation function___*/
            /*function validateLatitude(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please Select the Latitude";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else if (isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Invalid type";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }*/

            /*___School destination longtitude validation function___*/
            /*function validateLongtitude(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please Select the Longitude";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else if (isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Invalid type";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }*/
        </script>

        <!--______________________end of validation______________________________________-->


   

    <script src = "../assets/js/addSchool.js"></script>
	<!--jQuery -->
    <script src="../assets/js/jquery.js"></script>
 
    <script src="../assets/js/bootstrap.min.js"></script>

</body>
	
</html>