<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Add vacancy</title>

        

        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        
        <link href="../assets/css/fonts_styles.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="../assets/css/smallbox.css" rel="stylesheet">
    <link href="../assets/css/footer.css" rel="stylesheet">


    </head>

    <body>
        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#020816;" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- include Navigation BAr -->
            <?php include '../interfaces/navigation_bar.php' ?>
            <!--____________________________________________________________________________-->
            <!-- Sidebar Menu Items-->
             <!-- Sidebar -->
            <?php include 'sideBarPrincipal.php' ?>
            <!-- /#sidebar-wrapper -->
            <!-- /.navbar-collapse -->
            </nav>

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">
                    <div class="col-lg-12 col-lg-offset">


                        <?php
                          require '../classes/vacansies.php';
                            // get logged User details
                          
                            //$designationTypeID = $_SESSION["designationTypeID"];
                            //$nic = $_SESSION["nic"];
                            $vacancy = new Vacancy();

                            $nic = "922843776V";
                            
                            $provinceId = $vacancy->getProvinceIDFromNIC($nic);
                            $zonalId = $vacancy->getZonalIDFromNIC($nic);
                            
                            

                        // echo $_SESSION['designationType'];
                        if (isset($_POST['submit'])) {
                           
                            //echo $provinceId;

                            $subject = $_POST['subject'];
                            $grade = $_POST['grade'];
                            $num_of_teachers = $_POST['num_of_teachers'];

                            //echo $subject;

                           $insertSuccess = $vacancy->addVacancy($provinceId, $zonalId, $subject, $grade, $num_of_teachers);

                            //$insertSuccess = $vacancy->addVacancy();

                             
                        
                           
                        }
                        

                        
                        ?>

                        <div align="left" style="padding-bottom:10px; padding-left:18px;">
                            <h1 class="topic_font">Add Vacancy</h1>
                        </div>
                <div class="row">
                    <div class="col-lg-9 col-md-9">    
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="return(validateForm())" novalidate>

                    <div class="row">
               
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                            <!-- subject-->
                            <label for="fullName" class="control-label col-xs-3 col-sm-3 col-md-3col-lg-3 required" style="display: inline-block; text-align: left;"> Subject </label>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <select required class="form-control " name="subject" id="subject" >

                                    <option value="">Select Subject</option>
                                               
                                    <!--_____load subjects____-->
                                     <?php
                                                
                                        $result = $vacancy->loadSubjects();

                                        foreach ($result as $array) {

                                            echo '<option  value="' . $array['subjectID'] . '" >' . $array['subject'] . '</option>';
                                        }
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
                                <label id="errorGrade" style="font-size:10px"> </label>
                            </div>
                            
                        </div> 

                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                            <!-- number of teachers-->
                            <label for="fullName" class="control-label col-xs-3 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Number of teachers </label>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <input type="text" class="form-control" id="num_of_teachers" name="num_of_teachers" placeholder="Enter the number of vacancies"/>
                                <label id="errorNumb_of_students" style="font-size:10px"> </label>
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

                <div class="col-lg-3">
                    <img src="../images/addVacant.png" alt="education cover" style="width:180px;height:180px; padding-right:0px;">
                </div>
            </div>
                    </div>



                </div>
            </div>

            <!-- /#page-content-wrapper -->


        </div>
        <br><br>

        <?php include '../interfaces/footer.php' ?>

        <script src = "../assets/js/addEmployee.js"></script>

        <script src="../assets/js/jquery.js"></script>


        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
         <!--______________________________________________________________________________________________________________-->

    <script type="text/javascript">
        
        function validateForm() {
                var errors = [];

                if (!validateSubject("subject", "errorSubject")) {
                    errors.push("errorSubject");
                }

                if (!validateGrade("grade", "errorGrade")){
                    errors.push("errorGrade");
                }

                if (!validateNumberOfStudents("num_of_teachers","errorNumb_of_students")){
                    errors.push("errorNumb_of_students");
                }

                if (errors.length > 0) {
                    return false;
                } else {
                    return true;
                }
        }
    


         function validateSubject(text, errorLbl) {
                if (document.getElementById(text).value == "") {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "please select a Subject";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }

        function validateGrade(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please enter a Grade";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else if (!isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                } else {

                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please don't add letter as a grade";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                }
            }

        function validateNumberOfStudents(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please enter a Grade";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                } else if (!isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).style.borderColor = "#46BB24";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                } else {

                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "#F0568C";
                    document.getElementById(errorLbl).innerHTML = "Please enter a number";
                    document.getElementById(errorLbl).style.color = "#F0568C";
                    return false;
                }
            }
    </script>
        
        <!--______________________end of validation______________________________________-->

        




        
        





    </body>

</html>