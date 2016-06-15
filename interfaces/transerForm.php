
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Transer Form</title>


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

                <div class=" row container-fluid" style="">
                    <div class="col-md-6 " style="background-color: whitesmoke; padding-bottom: 16px;">
                        <?php
                        //get session attribute Values



                        $designationTypeID = $_SESSION['transer']['designationType'];
                        // teacher kenek nam
                        if ($designationTypeID == 5) {
                            $nicNumber = $_SESSION['transer']['nicNumber'];
                            $nameWithInitials = $_SESSION['transer']['nameWithInitials'];

                            $searchUserCurrentAddress = $_SESSION['transer']['currentaddress'];
                            $searchUserCurrntSchool = $_SESSION['transer']['schoolName'];
                            $instituteIDOld = $_SESSION['transer']['instituteID'];

                            //echo $instituteIDOld;
                        }
                        ?>


                        <div  align="center" style="padding-bottom:10px;">
                            <h1>Transer From</h1>
                        </div>
                        <div style="">

                            <div class="row" ">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- NIC number-->
                                            <label for="firstName" class="control-label col-xs-6 col-sm-6 col-md-4 col-lg-4 required" style="display: inline-block; text-align: left;"> NIC Number :</label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">

                                                <label id="nic" style="font-size:15px"> <?php echo $nicNumber; ?></label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- School Name-->
                                            <label for="SchoolName" class="control-label col-xs-6 col-sm-4 col-md-4 col-lg-4 required" style="display: inline-block; text-align: left;"> School Name :</label>
                                            <div >

                                                <label id="School" style="font-size:15px"> <?php echo $searchUserCurrntSchool; ?></label>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Name with initials-->
                                            <label for="ini_name" class="control-label col-xs-6 col-sm-6 col-md-6 col-lg-5 required" style="display: inline-block; text-align: left;"> Name with Initials: </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-5">

                                                <label id="NamewithInitials" style="font-size:15px"><?php echo $nameWithInitials; ?> </label>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Current Address-->
                                            <label for="CurrentAddress" class="control-label col-xs-6 col-sm-6 col-md-6 col-lg-5 required" style="display: inline-block; text-align: left;"> Current Address: </label>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-6">

                                                <label id="currentAddress" style="font-size:15px"><?php echo $searchUserCurrentAddress; ?> </label>
                                            </div>


                                        </div>
                                    </div>




                                </div>



                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6" style="background-color: white" >

                        <?php
                        // echo $_SESSION['designationType'];
                        if (isset($_POST['submit'])) {
                            require '../classes/employee.php';
                            $provinceID = $_POST['provinceID'];
                            $zoneID = $_POST['zonalID'];
                            $schoolId = $_POST['schoolId'];

                            /*   echo $provinceID;
                              echo '</br>';
                              echo $zoneID;
                              echo '</br>';
                              echo $schoolId;
                              echo $nicNumber; */


                            $employee = new Employee();
                            $insertWorkingHistrySuccess = $employee->insertIntoWorkingHistory($nicNumber, $instituteIDOld);
                            $updateSuccess = $employee->transerUpdateTeacher($nicNumber, $schoolId);

                            if ($updateSuccess == 1) {

                                if ($insertWorkingHistrySuccess == 1) {
                                    echo '<script language="javascript">';
                                    echo 'alert("Transer SuccessFully.Thankyou")';
                                    echo '</script>';
                                } else {
                                    echo '<script language="javascript">';
                                    echo 'alert("not insert into working history")';
                                    echo '</script>';
                                }
                            } else {
                                echo '<script language="javascript">';
                                echo 'alert("error Occured While trnser")';
                                echo '</script>';
                            }
                        }
                        ?>
                        <div  align="center" style="padding-bottom:10px;">
                            <h1>Transer To</h1>
                        </div>

                        <form name="TranserForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return (validateTranserForm())" novalidate>


                            <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                <div  class="form-group"  id="provinceIDDiv">

                                    <label for="province Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-5 required" style="text-align: left;"> province Office :  </label>

                                    <div   class="col-xs-6 col-sm-3 col-md-6 col-lg-5"  >
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


                                <div  class="row">
                                    <div   class="form-group col-lg-12 col-md-12 col-sm-12" id="zonalOfficeDiv">
                                        <div id="zonalOfficeHidden" class="form-group">

                                            <label for="Zonal Office" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-5 required" style=" text-align: left;"> Zonal Office :  </label>
                                            <div  class="col-xs-6 col-sm-3 col-md-3 col-lg-5">
                                                <select required class="form-control " name="zonalID"  id="abc" onchange="loadSchool(this.value)"> </select>

                                            </div>
                                            <label id="errorZonal" style="font-size: 10px"> </label>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div id="schoolIdDiv"class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <div id="schoolHidden" class="form-group">
                                            <label for="School" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-5 required" style="text-align: left;"> School : </label>
                                            <div  class="col-xs-6 col-sm-3 col-md-3 col-lg-5">
                                                <select required class="form-control required" name="schoolId" id="abcd"  ></select>
                                            </div>
                                            <label id="errorSchool" style="font-size: 10px"> </label>
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

                        </form>


                    </div>




                </div>
            </div>
            <!-- /#page-content-wrapper -->



            <?php include 'footer.php' ?>
            <script src = "../assets/js/addEmployee.js"></script>

            <script src="../assets/js/validateTranserForm.js"></script>
            <script src="../assets/js/jquery.js"></script>
            <script src="../assets/js/bootstrap.min.js"></script>
            <script src = "../assets/js/jquery-2.1.4.min.js"></script>





        </div>
    </body>

</html>
