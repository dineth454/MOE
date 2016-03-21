<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrator Home | MOE</title>

        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/bootstrap-submenu.min.css" rel="stylesheet">

        <!-- Custom css -->
        <link href="assets/css/martRunner.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    </head>

    <body>
    

        <br/>            

        <section>

            <div class="container" >

                <div class="row">
                    <div class="box">
                        <table class="col-lg-12" >
                            <tr class="hidden-md hidden-lg">
                            </tr>
                            <tr>
                                <td>
                                    <!-- only for lg and md-->
                                    <div class="hidden-xs col-md-12 col-lg-12" style="width:240px; height:510px;"> 
                                        <div class="hidden-xs col-md-12 col-lg-12 panel panel-default" style="width:240px; height:510px;">
                                            <div class="hidden-xs col-md-12 col-lg-12 panel-body">
                                                <div class="hidden-xs col-md-12 col-lg-12" style="width:190px; height:480px;background-color:#71C671;">
                                                    <center> <label style="color: #000000; padding-top:35px; font-size:20px;"> ADMINISTRATOR </label>  <br/><br/> 

                                                        <div class="glyphicon glyphicon-user" style="font-size:100px; color:#000000;"></div> <br/><br/> 
                                                        <center> <a class="btn btn-default" style="width:135px;" href=""> <strong>  Edit Profile </strong>
                                                            </a> </center>

                                                        <br/>

                                                        <span class="glyphicon glyphicon-cog" style="font-size:100px; color:#000000;"></span> <br/><br/> 
                                                        <div class="btn-group" align="center" >
                                                            <button class="btn btn-default" style="width: 165px">
                                                                <a class="btn dropdown-toggle" data-toggle="dropdown" style="color:#000000">
                                                                    <b> Admin Handling</b>
                                                                    <span class="caret"></span>
                                                                </a>

                                                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                                                    <li> <a  href=""> Create Admin</a> </li>
                                                                    <li> <a  href=""> Remove Admin </a> </li>
                                                                </ul>
                                                            </button>    
                                                        </div>


                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!---end of lg and md div-->


                                </td>
                                <td class="hidden-xs col-md-12 col-lg-12">
                                    <div  class="hidden-xs col-md-12 col-lg-12" style="width:30px; height:510px; "> </div>
                                </td>
                                <td>
                                    <div class="col-xs-12 col-sm-12" style=" width:auto; height:auto;" align="left" >
                                        <div class="panel panel-default col-xs-12 col-sm-12" style="height:auto;width: auto;">
                                            <div class="panel-body col-xs-12 col-sm-12" >
                                                <!-- only for lg and md -->
                                                <div class="hidden-xs hidden-sm col-md-12 col-lg-12">
                                                    <h3><label style="color:#009933; padding-left:130px;" >Administrator Dashboard </label> </h3>
                                                    <br/>

                                                </div>
                                                <!-- end of lg and md div-->

                                                <!-- only for sm and xs-->
                                                <div class="hidden-md hidden-lg">
                                                    <h3><label style="color:#009933; " >Administrator <br/>Dashboard </label> </h3>
                                                    <br/>

                                                </div>
                                                <!-- end of xs and sm div-->
                                                
                                                <div class="col-xs-4  col-md-12 col-lg-12 " id="iconDiv" >
                                                    <div class="col-xs-4 col-md-12 col-lg-12 rcorners" style="width:200px;height:120px;" align="center">
                                                        <a href=""><span class="glyphicon glyphicon-envelope" style="font-size:60px; color:#FFCC00;padding-top:10px"><span class="badge" style="font-size: 17px; background-color: red;"></span></span> <br/>

                                                            <label style="color:#000000;padding-top: 8px;">Messages</label></a>
                                                    </div>
                                                    <div class="hidden-xs col-md-12 col-lg-12  " style="width:15px;height:120px;" ></div>
                                                    <div class="col-xs-12 rcorners" style="width:200px;height:120px;padding-top:10px;" align="center">
                                                        <a href="#"><span class="glyphicon glyphicon-calendar" style="font-size:60px; color:#BC2312;"></span><br/>
                                                            <!--<label style="color:#000000;padding-top: 8px;">Reports</label></a>-->

                                                            <div class="btn-group" align="center" >
                                                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="color:#000000">
                                                                    <b> Reports</b>
                                                                    <span class="caret"></span>
                                                                </a>

                                                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                                                    <li class="dropdown-submenu"><a href="#">Attendance Reports</a>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li ><a href="">View Full year attendance</a></li>
                                                                            <li class="dropdown-submenu"><a href="#">View Attendance by vendor</a>

                                                                                <ul class="dropdown-menu" role="menu">
                                                                                    <li><a href="">View Attendance by Full Year</a></li>
                                                                                    <li><a href="">View Attendance by Date</a></li>
                                                                                    <li><a href="">View Attendance by Time period</a></li>
                                                                                </ul>
                                                                            </li>
                                                                            <li><a href="">View Attendance by Date</a></li>
                                                                            <li><a href="">View Attendance by Time period</a></li>
                                                                        </ul>
                                                                    <li class="dropdown-submenu"><a href="#">Payment Reports</a>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li><a href="">Paid Vendors for a Day</a></li>
                                                                            <li><a href="">Paid Vendors for a next Market Days</a></li>
                                                                        </ul>
                                                                    <li class="dropdown-submenu"><a href="#">Vendor Reports</a>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li><a href="">Blacklisted Vendors</a></li>
                                                                            <li><a href="">Hidden Vendors</a></li>
                                                                            <li><a href="">View Details of a Vendor</a></li>
                                                                        </ul>

                                                                </ul>

                                                            </div>
                                                    </div>    
                                                    
                                                    <div class="hidden-xs col-md-12 col-lg-12" style="width:15px;height:120px;" ></div>
                                                    <div class="col-xs-12 rcorners" style="width:200px;height:120px;padding-top:10px;" align="center">
                                                        <span class="glyphicon glyphicon-user" style="font-size:60px; color:#0066CC;"><span class="badge" style="font-size: 17px; background-color: red;"></span> </span><br/>
                                                        <!--<label style="color:#000000; padding-top: 8px;">Requests</label>-->
                                                        <div class="btn-group" align="center" >
                                                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="color:#000000">
                                                                <b> Requests</b>
                                                                <span class="caret"></span>
                                                            </a>

                                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                                                <li><a  href="">Products<span class="badge" style="font-size: 17px; background-color: red;"></span><%}%></a></li>
                                                                <li><a  href="">Posts<span class="badge" style="font-size: 17px; background-color: red;"></span><%}%> </a> </li>
                                                            </ul>

                                                        </div>
                                                    </div>  



                                                    <div class="hidden-xs col-md-12 col-lg-12 " style="width:800px;height:15px;" ></div>
                                                    <div class="col-xs-12 rcorners" style="width:200px;height:120px;padding-top:10px;" align="center">
                                                        <span class="glyphicon glyphicon-wrench" style="font-size:60px; color:#99CCCC;"></span><br/>
                                                        <!--<label style="color:#000000">Vendor Handling</label></a>-->

                                                        <div class="btn-group" align="center" >
                                                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="color:#000000">
                                                                <b> Vendor Handling</b>
                                                                <span class="caret"></span>
                                                            </a>

                                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                                                <li> <a  href="">Create Vendor</a> </li>
                                                                <li> <a  href="">Update Vendor</a> </li>
                                                                <li> <a href="">Remove Vendor</a> </li>

                                                            </ul>

                                                        </div>
                                                    </div>  

                                                    <div class="hidden-xs col-md-12 col-lg-12 " style="width:15px;height:120px;" ></div>
                                                    <div class="col-xs-12 rcorners" style="width:200px;height:120px;padding-top:10px;" align="center">
                                                        <span class="glyphicon glyphicon-ok-sign" style="font-size:60px; color:#CCCC00;"></span><br/>
                                                        <!--<label style="color:#000000">Vendor Attendance</label></a>-->
                                                        <div class="btn-group" align="center" >
                                                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="color:#000000" >
                                                                <b> Vendor Attendance</b>
                                                                <span class="caret"></span>
                                                            </a>

                                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                                                <li ><a href="">Thursday Market</a></li>   
                                                                <li ><a href="">Saturday Market</a></li>   

                                                            </ul>

                                                        </div>
                                                    </div>  

                                                    <div class="hidden-xs col-md-12 col-lg-12 " style="width:15px;height:120px;" ></div>
                                                    <div class="col-xs-12 rcorners" style="width:200px;height:120px;padding-top:10px;" align="center">
                                                        <span class="glyphicon glyphicon-search" style="font-size:60px; color:#666666;"></span><br/>
                                                        <!--<label style="color:#000000">Search Vendors</label></a>-->
                                                        <div class="btn-group" align="center" >
                                                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="color:#000000" >
                                                                <b> Search Vendors</b>
                                                                <span class="caret"></span>
                                                            </a>

                                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                                                <li><a href="">Search by Market</a></li>
                                                                <li><a href="">Search by Main Category</a></li>
                                                                <li><a href="">Search by Sub Category</a></li>
                                                            </ul>

                                                        </div>

                                                    </div>  

                                                    <div class="hidden-xs col-md-12 col-lg-12 " style="width:800px;height:15px;" ></div>
                                                    <div class="col-xs-12 rcorners" style="width:200px;height:120px;padding-top:10px;" align="center">
                                                        <span class="glyphicon glyphicon-usd" style="font-size:60px; color:#663366;"></span><br/>
                                                        <!--<label style="color:#000000">Payment Handling</label></a>-->

                                                        <div class="btn-group" align="center" >
                                                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="color:#000000" >
                                                                <b> Payment Handling</b>
                                                                <span class="caret"></span>
                                                            </a>

                                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                                                <li><a href="">Add Payment</a></li>
                                                                <li><a href="">View Payment</a></li>
                                                                <li><a href="">Update Payment</a></li>
                                                                <li><a href="">Remove Payment</a></li>
                                                            </ul>

                                                        </div>

                                                    </div>  

                                                    <div class="hidden-xs col-md-12 col-lg-12 " style="width:15px;height:120px;" ></div>
                                                    <div class="col-xs-12 rcorners" style="width:200px;height:120px;padding-top:10px;" align="center">
                                                        <span class="glyphicon glyphicon-globe" style="font-size:60px; color:#000066;"></span><br/>
                                                        <a href="posts_Admin.jsp"> <label style="color:#000000">Posts</label> </a> 
                                                    </div>  

                                                    <div class="hidden-xs col-md-12 col-lg-12 " style="width:15px;height:120px;" ></div>
                                                    <div class="col-xs-12 rcorners" style="width:200px;height:120px;padding-top:10px;" align="center">
                                                        <span class="glyphicon glyphicon-map-marker" style="font-size:60px; color:#009900;"></span><br/>
                                                        <a href=""> <label style="color:#000000">Stall Assignments</label> </a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                </td>	 
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </section>

                                                                  

       

        <!-- jQuery -->
        <script src="../static/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-submenu.min.js"></script>

        

    </body>
</html>

