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

        <title>Update School Front</title>

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">
        <link href="../assets/css/fonts_styles.css" rel="stylesheet">
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

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">
                        <?php 
                        require("../classes/institute.php");
                        $institute = new Institute();
                            
                            if(isset($_POST['submit'])){
                                $schoolID = $_POST['schoolId'];
                                echo $schoolID;
                                
                               $resultFindschool =  $institute->findSchool($schoolID);
                               
                               $schoolName = $resultFindschool['schoolName'];
                              // echo $schoolName;
                               $numOfStudents = $resultFindschool['numOfStudents'];
                               $latitude = $resultFindschool['lat'];
                               $langitude = $resultFindschool['lng'];
                              
                                $_SESSION['updateSchool']['schoolID'] = $schoolID;
                               $_SESSION['updateSchool']['schoolName'] = $schoolName;
                               $_SESSION['updateSchool']['numOfStudents'] = $numOfStudents;
                               $_SESSION['updateSchool']['lat'] = $latitude;
                               $_SESSION['updateSchool']['lng'] = $langitude;
                              // echo 'kalinga';
                               header("Location: updateSchoolForm.php");
                              // echo 'yapa' ; 
                                
                            }
                        
                        ?>


                        <div align="center" style="padding-bottom:10px;">
                            <h1 class="topic_font">Find School</h1>
                        </div>

                        <form name="FindSchool" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit="return(validateForm())"  novalidate>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <div  class="form-group" style="" id="provinceIDDiv">

                                                <label for="province Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="text-align: left; padding-left: 0px;"> province Office :  </label>

                                                <div   class="col-xs-6 col-sm-3 col-md-3 col-lg-3"  >
                                                    <select required class="form-control " name="provinceID" id="provinceID" onchange="showUser(this.value)">
                                                        <option value="" >Select ProvinceOffice</option>
                                                        <option value="1">centralProvince</option>
                                                        <option value="2">westernProvince</option>
                                                        <option value="3">sothernProvince</option>
                                                        <option value="4">NothernProvince</option>
                                                        <option value="5">esternProvince</option>
                                                    </select>
                                                </div>

                                                <label id="errorProvince" style="font-size: 10px"> </label>
                                            </div>


                                        </div>


                                        <div  class="row">
                                            <div  style="" class="form-group col-lg-12 col-md-12 col-sm-12" id="zonalOfficeDiv">
                                                <div id="zonalOfficeHidden" class="form-group">

                                                    <label for="Zonal Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style=" text-align: left;"> Zonal Office :  </label>
                                                    <div  class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="padding-left: 22px;">
                                                        <select required class="form-control" name="zonalID"  id="abc" onchange="loadSchool(this.value)"> </select>

                                                    </div>
                                                    <label id="errorZonal" style="font-size: 10px"> </label>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div id="schoolIdDiv" style=" "class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div id="schoolHidden" class="form-group">
                                                    <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="text-align: left;"> School : </label>
                                                    <div  class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="padding-left: 22px;">
                                                        <select required class="form-control required" name="schoolId" id="abcd"  ></select>
                                                    </div>
                                                    <label id="errorSchool" style="font-size: 10px"> </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <button type="submit" name="submit" id="submit" class="btn btn-primary" style="padding-right: 48px;padding-left: 40px;">Find</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>



                </div>
            </div>

            <!-- /#page-content-wrapper -->

        </div>

        <?php include 'footer.php' ?>
        <script src = "../assets/js/addEmployee.js"></script>

        <script src="../assets/js/jquery.js"></script>


        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>





    </body>

</html>
