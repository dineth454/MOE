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

        <title>Add Zonal Office</title>

        <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">


    </head>

    <body >

        <div id="wrapper">
            
            <!-- Sidebar -->
            <?php include 'sideBarAdmin.php' ?>
            <!-- /#sidebar-wrapper -->

            <!-- include Navigation BAr -->
            <?php include 'navigationBar.php' ?>

            <!-- Finished NAvigation bar -->

            <?php
            // echo $_SESSION['designationType'];
            if (isset($_POST['submit'])) {
                require '../classes/institute.php';


                $provinceID = $_POST['provinceID'];
                $zonlName = $_POST['zonalName'];
                $LoggedUsernic = $_SESSION["nic"];
                $institute = new Institute();
                
                //echo $LoggedUsernic;
                
               
                
                // check karanawa sys adminda kiala
                if ($LoggedUsernic == '921003072V' || $LoggedUsernic == '921003072v') {
                    $insertSuccess = $institute->addZonalOffice($provinceID, $zonlName);


                    if ($insertSuccess == 1) {
                        echo '<script language="javascript">';
                        echo 'alert("Zonal Added SuccessFully.Thankyou")';
                        echo '</script>';
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert("error Occured While Adding data.check")';
                        echo '</script>';
                    }
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("You Dont Have Permission to do this action")';
                    echo '</script>';
                }
            }
            ?>

            <div id="page-content-wrapper" style="min-height: 540px;">
                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">

                        <div align="center" style="padding-bottom:10px;">
                            <h1>Add Zonal Office</h1>
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="return(validateForm())">

                            <div class="row">
                                <div class="form-group col-lg-8 col-md-18 col-sm-8">

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">

                                        <div  class="form-group"  id="provinceIDDiv" style="margin-bottom: 0px;">

                                            <label for="province Office" class="control-label col-xs-6 " style="text-align: left;"> province Office :  </label>

                                            <div   class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                                <select required class="form-control " name="provinceID" id="provinceID">
                                                    <option value="" >Select Province Office</option>
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




                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Zonal Name-->
                                            <label for="province Office" class="control-label col-xs-6  required" style="text-align: left; padding-left: 30px;"> Zonal Office :  </label>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <input type="text" class="form-control" id="zonalName" name="zonalName" placeholder="Zonal Name"/>

                                            </div>


                                        </div>
                                    </div>


                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
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


        


        <!-- Bootstrap Core JavaScript -->
        <script src="../assets/js/jquery.js" ></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>



<script type="text/javascript">
            function validateForm() {
                var errors = [];

                if (!validateProvince("provinceID", "errorProvince")) {
                    errors.push("errorProvince");
                    alert ("ddd");

                }
                if (!validateStudentNumber("students", "errorStudentNumber")) {
                    errors.push("errorStudentNumber");

                }
                
                if (errors.length > 0) {
                    return false;
                } else {
                    return true;
                }
            }

            function validateProvince(text, errorLbl) {
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
        </script>


    </body>
</html>