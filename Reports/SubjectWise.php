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

        <title>Home</title>

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
            <?php include '../interfaces/sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->

            <!-- include Navigation BAr -->
            <?php include '../interfaces/navigationBar.php' ?>
            <?php
                require("../classes/employee.php");
                $employee = new Employee();
            ?>
            

            <!-- Finished NAvigation bar -->

            <!-- Page Content -->

            <div  id="page-content-wrapper" style="min-height: 540px;" >

                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">


                        


                        <div align="center" style="padding-bottom:10px;">
                            <h1 class="topic_font">Report Generation</h1>
                        </div>

                        <form name="addEmployeeForm" action="pdf.php" method = "post" onsubmit=""  novalidate>

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                   




                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- Designation-->
                                            <label for="designation" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="display: inline-block; text-align: left;"> Designation </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <select required class="form-control" id="designation" name = "designation" onchange="selectionForm(this.value)">
                                                    <option value="">Select Designation</option>
                                                   
                                                    <option value="5">Teacher</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12" style="display: none;" id="provinceIDDiv">

                                            <div id="provinceOfficeHidden" class="form-group" >
                                                <label for="province Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="text-align: left;"> province Office :  </label>

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
                                            </div>
                                        </div>
                                    </div>


                                    <div  class="row">
                                        <div  style="display: none;" class="form-group col-lg-12 col-md-12 col-sm-12" id="zonalOfficeDiv">
                                            <div id="zonalOfficeHidden" class="form-group">

                                                <label for="Zonal Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style=" text-align: left;"> Zonal Office :  </label>

                                                <div  class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                        <select required class="form-control" name="zonalID"  id="abc" onchange="loadSchool(this.value)"> </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div id="schoolIdDiv" style="display: none; "class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div id="schoolHidden" class="form-group">
                                                <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style="text-align: left;"> School : </label>

                                                <div  class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <select required class="form-control required" name="schoolId" id="abcd"  ></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div id="subjectHiddenDiv" style="display: none;" class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div id="subjectHidden" class="form-group">
                                                <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-3 required" style=" text-align: left;"> Appoinment Subject :</label>
                                                <div id="subjectDiv" class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                    <select required class="form-control" name="subject" id="subject" >
                                                        <option value="">--Select Subject--</option>
                                                        <?php
                                                        $result = $employee->loadSubjects();

                                                        foreach ($result as $array) {

                                                            echo '<option  value="' . $array['subjectID'] . '" >' . $array['subject'] . '</option>';
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <label id="errorSubject" style="font-size: 10px"> </label>

                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Generate Report</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../interfaces/footer.php' ?>
        <script src = "../assets/js/addEmployee.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
    </body>
</html>
