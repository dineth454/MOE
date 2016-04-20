<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">      

        <title>Add_Institute</title>

        <!-- Bootstrap Core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
        <link href="../assets/css/home.css" rel="stylesheet">
        <link href="../assets/css/smallbox.css" rel="stylesheet">
        <link href="../assets/css/footer.css" rel="stylesheet">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhSKzfElSK1IBSQgF1kGr2Iv6-JqeVUUA"></script>

    </head>

    <body onload="initialize()">

        <div id="wrapper">

            <!-- Sidebar -->
            <?php include 'sideBarAdmin.php' ?>

            <nav class="navbar navbar-default" style="height: 65px; border-radius:0px;">
                <div class="col-md-3 pull-right" style="margin-top: 18px;">
                    Nipuna Jayaweera 
                    <div class="pull-right"><a href="../classes/signout.php">Sign out</a></div>
                </div>

            </nav>

            <div id="page-content-wrapper" style="min-height: 540px;">
                <div class="container-fluid">
                    <div class="col-lg-9 col-lg-offset-1">

                        <div align="center" style="padding-bottom:10px;">
                            <h1>Add Institute</h1>
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="validationForm();">

                            <div class="row">
                                <div class="form-group col-lg-8 col-md-18 col-sm-8">


                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <!-- Select role-->
                                            <label for="selec_trole" class="control-label col-xs-6 col-sm-6 col-md-6 col-lg-6 required" style="display: inline-block; text-align: left;">Institute Type</label>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <select required class="form-control" id="select_role" name="select_role" >
                                                    <option value="">--Select Type--</option>
                                                    <option value="2">Zonal Office</option>
                                                    <option value="3">School</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Institute Name-->
                                            <label for="institute_name" class="control-label col-xs-6 col-sm-6 col-md-6 col-lg-6 required" style="display: inline-block; text-align: left;"> Institute Name </label>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <input type="text" class="form-control" id="institute_name" name="institute_name" placeholder="Enter Institute Name"/>

                                            </div>


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div  class="form-group col-lg-12 col-md-12 col-sm-12">

                                            <!-- Institute Address-->
                                            <label for="institute_name" class="control-label col-xs-6 col-sm-6 col-md-6 col-lg-6 required" style="display: inline-block; text-align: left;"> Institute Address </label>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <input type="text" class="form-control" id="institute_address" name="institute_address" placeholder="Enter Address"/>

                                            </div>


                                        </div>
                                    </div>
                                    <div  class="row">
                                        <div  class="form-group col-lg-4 col-md-4 col-sm-4">
                                            <div class="container-fluid">
                                                <div id="map-canvas" style="width:500px;height:730px;"></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div  id="latlong">
                                            <p>Latitude: <input size="20" type="text" id="latbox" name="lat" ></p>
                                            <p>Longitude: <input size="20" type="text" id="lngbox" name="lng" ></p>
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
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src = "../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../assets/js/googlemap.js"></script>
        <script src="../assets/js/addSchoolMarker.js"></script>


    </body>
</html>