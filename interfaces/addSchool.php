<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add school</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="../assets/css/smallbox.css" rel="stylesheet">
    <link href="../assets/css/footer.css" rel="stylesheet">
    <link href="../assets/css/fields.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php 
    
    require("../classes/School.php");
    $school = new School();

    if (isset($_POST['submit'])) {
        $nic = "";
        $nic = $_POST['nic'];
        echo $nic;
        
    }
    
    
    
    
    
?>


    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Admin
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <nav class="navbar navbar-default" style="height: 60px;">
            <div class="col-md-3 pull-right" style="margin-top: 18px;">
                Nipuna Jayaweera 
            <div class="pull-right"><i>Sign out</i></div>
            </div>

        </nav>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <h3>Add School</h3>
                </div>
                <form>
                    <div class="col-md-4">
                        <div class="row custom-row">
                            School Name :
                            <input class="pull-right" type="text" name ="nic" required id="nic" />
                        </div>
                        <div class="row custom-row">
                            Institute ID :
                            <select class="pull-right custom-label"> 
                            <option value="">Select Institute</option>
                            <?php 
                            $instituteTypeResult = $school->loadInstitutes();
                                
                                    if(mysqli_num_rows($instituteTypeResult) > 0 ){
                                        while($row = mysqli_fetch_assoc($instituteTypeResult)){
                                            
                                            echo '<br>';
                                            echo '<option value="'.$row['instituteTypeID'].'" >'.$row['instituteType'].'</option>';
                                        }
                                        
                                    }
                    
                            ?>
                                
                            </select>
                        </div>
                        <div class="row custom-row">
                            Province Office ID : 
                            <select class="pull-right custom-label"> 
                            <option value="">Select Province</option>
                            <?php 
                            $provinceTypeResult = $school->loadProvince();
                                
                                    if(mysqli_num_rows($provinceTypeResult) > 0 ){
                                        while($row = mysqli_fetch_assoc($provinceTypeResult)){
                                            
                                            echo '<br>';
                                            echo '<option value="'.$row['   provinceID'].'" >'.$row['   provinceID'].'</option>';
                                        }
                                        
                                    }
                    
                            ?>
                                
                            </select>
                        </div>
                        <div class="row custom-row">
                            Zonal Office ID : 
                            <select class="pull-right custom-label"> 
                            <option value="">Select Zonal</option>
                            <?php 
                            $zonalTypeResult = $school->loadZonal();
                                
                                    if(mysqli_num_rows($zonalTypeResult) > 0 ){
                                        while($row = mysqli_fetch_assoc($zonalTypeResult)){
                                            
                                            echo '<br>';
                                            echo '<option value="'.$row['       zonalID'].'" >'.$row['      zonalID'].'</option>';
                                        }
                                        
                                    }
                    
                            ?>
                                
                            </select>
                        </div>
                        <div class="row custom-row">
                            School Type : 
                            <select class="pull-right custom-label"> 
                            <option value="">Select Zonal</option>
                            <?php 
                            $schoolTypeResult = $school->loadSchool_type();
                                
                                    if(mysqli_num_rows($schoolTypeResult) > 0 ){
                                        while($row = mysqli_fetch_assoc($schoolTypeResult)){
                                            
                                            echo '<br>';
                                            echo '<option value="'.$row['schoolTypeID'].'" >'.$row['        schoolTypeID'].'</option>';
                                        }
                                        
                                    }
                    
                            ?>
                                
                            </select>
                        </div>
                        <div class="row custom-row">
                            Number of student : <input class="pull-right" type="text" name ="nic" required id="nic" />
                        </div>                                                                                                              
                    </div>
                    <div class="col-md-4">
                        <img src="../images/school.png">
                    </div>


                </form>
            </div>
        </div>


    </div>
    <!-- /#wrapper -->

<!--footer-->
    <footer>
        <div class="footer">
            <div class="col-md-4 col-md-offset-4">
                <li class="about" >
                    <ul>
                        <li><a href="#" class="footer-icon" target="_blank">Contact us</a></li>
                        <li><a href="#" class="footer-icon" target="_blank">About us</a></li>
                        <li><a href="#" class="footer-icon" target="_blank">Home</a></li>
                    </ul>
                </li>
            </div>
            <div class="col-md-2 col-md-offset-2">
                
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>

</body>

</html>
