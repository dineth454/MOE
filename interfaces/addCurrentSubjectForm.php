
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Add Current Subject Form</title>


        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">
        <link href="../assets/css/navbar_styles.css" rel="stylesheet">
        <link href="../assets/css/fonts_styles.css" rel="stylesheet">


    </head>

    <body>

        <div id="wrapper" > 

            <!-- Sidebar -->
            <?php include 'sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->

            <!-- include Navigation BAr -->
            <?php include 'navigationBar.php' ?>

            <!-- Finished NAvigation bar -->
            <!-- Page Content -->
            <div id="page-content-wrapper" style="min-height: 540px;">

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">
                        <?php
                        // echo $_SESSION['designationType'];
                        if (isset($_POST['submit'])) {
                            require '../classes/employee.php';

                            // $nic = $_POST['nic'];
                            $nicNumber = $_SESSION['subject']['nicNumber'];
                            $currentSubject = $_POST['currentsubject'];
                            $grade = $_POST['grade'];

                            $employee = new Employee();

                            $insertSuccess = $employee->insertIntoSubjetcCombination($nicNumber, $currentSubject, $grade);

                            if ($insertSuccess == 1) {
                                echo '<script language="javascript">';
                                echo 'alert("Inserted SuccessFully.Thankyou")';
                                echo '</script>';
                            } else {
                                echo '<script language="javascript">';
                                echo 'alert("error Occured While Insertin data.check")';
                                echo '</script>';
                            }
                        }
                        ?>

                        <?php
                        //get session attribute Values



                        $designationTypeID = $_SESSION['subject']['designationType'];
                        // teacher kenek nam
                        if ($designationTypeID == 5) {
                            $nicNumber = $_SESSION['subject']['nicNumber'];
                            $nameWithInitials = $_SESSION['subject']['nameWithInitials'];
                            $searchUserSchoolId = $_SESSION['subject']['schoolIdSearchUser'];
                            $searchUserSubjectId = $_SESSION['subject']['subjectIdSearchUser'];
                        }
                        ?>


                        <div  align="center" style="padding-bottom:10px;">
                            <h1>Add Current Working Subject</h1>
                        </div>
                        <div style="">
                            <form name="currentSubjectForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return(validateCurrenntSubjectForm())" novalidate>
                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- NIC number-->
                                                <label for="firstName" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> NIC Number </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input type="text" disabled="true" required class="form-control" value="<?php echo $nicNumber; ?>" id="nic" name="nic" placeholder="Enter NIC number" />
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                                <!-- Name with initials-->
                                                <label for="ini_name" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Name with Initials </label>
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <input disabled="true" type="text" class="form-control" id="name" name="name" value="<?php echo $nameWithInitials; ?>" placeholder="Enter name with Initials"/>
                                                    <!--<label id="errorFirstName" style="font-size:10px"> </label>-->
                                                </div>


                                            </div>
                                        </div>


                                        <!--     <div class="row">
                                                 <div  id="schoolIdDiv"  class="form-group col-lg-12 col-md-12 col-sm-12">
                                                     <div id="schoolHidden" class="form-group">
                                                         <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> School : </label>
                                                         <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                              
                                                             <select disabled="true" class="form-control required" name="schoolId" id="abcd"  >
                                                            
                                                                 
                                                             </select>
     
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
     
                                        -->


                                        <div class="row">
                                            <div id="subjectHiddenDiv"  class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="subjectHidden" class="form-group">
                                                    <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Appoinment Subject :</label>
                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                        <select disabled="true" required class="form-control" name="subject" id="subject" >
                                                            <?php if ($searchUserSubjectId == 1) { ?>
                                                                <option value="none">Select subject</option>
                                                                <option selected="true" value="1">Mathematics</option>
                                                                <option  value="2">Science</option>
                                                                <option  value="3">Buddhism</option>
                                                            <?php } else if ($searchUserSubjectId == 2) { ?>
                                                                <option  value="none">Select subject</option>
                                                                <option  value="1">Mathematics</option>
                                                                <option selected="true" value="2">Science</option>
                                                                <option  value="3">Buddhism</option>
                                                            <?php } else if ($searchUserSubjectId == 3) { ?>
                                                                <option  value="none">Select subject</option>
                                                                <option  value="1">Mathematics</option>
                                                                <option  value="2">Science</option>
                                                                <option selected="true"  value="3">Buddhism</option>
                                                            <?php } else { ?>
                                                                <option selected="true"  value="none">Select subject</option>
                                                                <option  value="1">Mathematics</option>
                                                                <option  value="2">Science</option>
                                                                <option   value="3">Buddhism</option>
                                                            <?php } ?>    





                                                        </select>

                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>


                                        <!--___________________________________________________________-->

                                        <!-- load Subjects from database -->    

                                        <div class="row">
                                            <div id="currentsubjectHiddenDiv"  class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="currentsubjectHidden" class="form-group">
                                                    <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;">Select Current Subject :</label>
                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                        <select  required class="form-control" name="currentsubject" id="currentsubject" >

                                                            <option   value="">--Select subject--</option>
                                                            
                                                            <?php
                                                            /*
                                                            $result = $employee->loadSubjects();

                                                            foreach ($result as $array) {

                                                                echo '<option  value="' . $array['subjectID'] . '" >' . $array['subject'] . '</option>';
                                                            }
                                                             
                                                             */
                                                            ?>

                                                            <option  value="1">Mathematics</option>
                                                            <option  value="2">Science</option>
                                                            <option  value="3">Buddhism</option> 



                                                        </select>
                                                    </div>
                                                    <label id="errorCurrentSubject" style="font-size: 10px"> </label>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- load Grades From database -->    
                                        <div class="row">
                                            <div id="GradeDiv"  class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="GeradeHidden" class="form-group">
                                                    <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;">Select Grade :</label>
                                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">

                                                        <select  required class="form-control" name="grade" id="grade" >
                                                            <option value="">--Select Grade--</option>
                                                            <option value="1">Grade 1</option>
                                                            <option value="2">Grade 2</option>
                                                            <option value="3">Grade 3</option>
                                                            <option value="4">Grade 4</option>
                                                            <option value="5">Grade 5</option>
                                                            <option value="6">Grade 6</option>
                                                            <option value="7">Grade 7</option>
                                                            <option value="8">Grade 8</option>
                                                            <option value="9">Grade 9</option>
                                                            <option value="10">Grade 10</option>
                                                            <option value="11">Grade 11</option>


                                                        </select>
                                                    </div>
                                                    <label id="errorGrade" style="font-size: 10px"> </label>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>
            <!-- /#page-content-wrapper -->



            <?php include 'footer.php' ?>
             <script src="../assets/js/currentSubjectFormValidation.js"></script>

            <script src="../assets/js/jquery.js"></script>


            <script src="../assets/js/bootstrap.min.js"></script>
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>

           



        </div>
    </body>

</html>
