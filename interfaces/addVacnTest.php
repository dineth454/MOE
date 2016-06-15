<DOCTYPE html>
<html lang="en">
<head>
	

</head>

<?php
	if (isset($_POST['submit'])) {
        require '../classes/vacansies.php';


                            $nic = "921372744v";
                            $vacancy = new Vacancy();
                            $provinceId = $vacancy->getProvinceIDFromNIC($nic);
                            $zonalId = $vacancy->getZonalIDFromNIC($nic);
                            //echo $provinceId;
                            //echo "<br>";
                            //echo $zonalId;
                            //echo "<br>";

                            $subject = $_POST['subject'];
                            //echo $subject;
                            //echo "<br>";
                            $grade = $_POST['grade'];
                            //echo $grade;
                            //echo "<br>";
                            $num_of_teachers = $_POST['num_of_teachers'];
                            //echo $num_of_teachers;
                            //echo "<br>";

                            $insertSuccess = $vacancy->addVacancy($provinceId, $zonalId, $subject, $grade, $num_of_teachers);

                             if ($insertSuccess == 1) {
                                    echo '<script language = "javascript">';
                                    echo 'alert("School Added Succeccfully")';
                                    echo '</script>';
                                } else {
                                    echo '<script language = "javascript">';
                                    echo 'alert("error Occurd while inserting data")';
                                    echo '</script>';
                                }
    }
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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

										mysqli_close($mysqli);
									?>
									<!--______________________________-->
                                </select>

                                <br>

                                <input type="text" class="form-control" id="grade" name="grade" placeholder="Enter Grade Eg:6"/>

                                <br>

                                <input type="text" class="form-control" id="num_of_teachers" name="num_of_teachers" placeholder="Enter the number of vacancies"/>

                                <br>
  
   <input type="submit" name="submit" value="Submit Form"><br>
</form>

</html>