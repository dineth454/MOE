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
            	
            	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" novalidate>

            		<div class="row">
               
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                        	<!-- subject-->
                            <label for="fullName" class="control-label col-xs-3 col-sm-3 col-md-3col-lg-3 required" style="display: inline-block; text-align: left;"> Subject </label>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <select required class="form-control " name="subject" id="subject" >
                                    
                                    <!--_____Query for load subjects____-->
                                    <?php

										require("../classes/dbcon.php");
										$db = new DBCon();
										$mysqli = $db->connection();
 


										// select data from database

										$sql="select subjectID,subject from subject";
										$result = mysqli_query($mysqli,$sql);

										echo '<option value="">Select Subject</option>';
										while($row = mysqli_fetch_array($result)) {
    									//print_r($row);
    										echo '<option value='.$row['subjectID'].' >'.$row['subject'].'</option>';
	
													//echo "\r\n";
										}

										//mysqli_close($mysqli);
									?>
									<!--______________________________-->
                                </select>
                                <!--<label id="errorLastName" style="font-size:10px"> </label>-->
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
   

    <script src = "../assets/js/addSchool.js"></script>
	<!--jQuery -->
    <script src="../assets/js/jquery.js"></script>
 
    <script src="../assets/js/bootstrap.min.js"></script>

</body>
	
</html>