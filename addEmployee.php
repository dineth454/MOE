<!DOCTYPE html> 
<head>

</head>

<body>

<?php 
	require("classes/database/db.php");
	$db = Database::getInstance();
	
	
?>


	<h1>Add Employee</h1>
	<form action="" method = "" onsubmit ="">
	
		nicNumber : <input type="text" name ="nic" id="nic" /><br><br>
	role: <select>
	<option value="">Select Role</option>
	<?php 
		$mysqli2 = $db->getConnection();
		$sqlQuery = "select * from role_type";
		
		$roleTypeResult = $mysqli2->query($sqlQuery);
		
			if(mysqli_num_rows($roleTypeResult) > 0 ){
				while($row = mysqli_fetch_assoc($roleTypeResult)){
					
					echo $row['roleType'];
					echo '<br>';
					echo '<option value="'.$row['roleTypeID'].'" >'.$row['roleType'].'</option>';
				}
				
			}
		
	?>
		</select>	<br><br>
	institute: <select>
	<option value="">Select Institute</option>
			<?php 
	$mysqli = $db->getConnection();
	$sqlQuery = "select * from intitute_type";
	
	$instituteTypeResult = $mysqli->query($sqlQuery);
	
		if(mysqli_num_rows($instituteTypeResult) > 0 ){
			while($row = mysqli_fetch_assoc($instituteTypeResult)){
				
				echo '<br>';
				echo '<option value="'.$row['instituteTypeID'].'" >'.$row['instituteType'].'</option>';
			}
			
		}
	
	?>
			
		
	</select>	<br><br>
	
	Designation: <select>
	<option value="1">Select Designation</option>
			<?php 
	$mysqli = $db->getConnection();
	$sqlQuery = "select * from designation";
	
	$designationResult = $mysqli->query($sqlQuery);
	
		if(mysqli_num_rows($designationResult) > 0 ){
			while($row = mysqli_fetch_assoc($designationResult)){
				
				echo '<br>';
				echo '<option value="'.$row['designationTypeID'].'" >'.$row['designation'].'</option>';
			}
			
		}
	
	?>
			
			</select>
			<br><br>
	
	nameWithInitials : <input type="text" name ="name" id="name" /><br><br>
	Full Name :  <input type="text" name ="fName" id="fName" /><br><br>
	Employement Id :  <input type="text" name ="eId" id="eId" /><br><br>
	email : <input type="text" name ="email" id="email" /><br><br>
	dob : <input type="date" name ="email" id="email" /><br><br>
	Current Address : <input type="text" name ="email" id="email" /><br><br>
	Gender: <select>
	<option value="">Select Gender</option>
			<option value="2">Male</option>
			<option value="3">Female</option>
			</select>	<br><br>
	
	Marrige State: <select>
	<option value="">Select State</option>
			<option value="2">Yes</option>
			<option value="3">No</option>
			</select>	<br><br>
			
	mobileNum : <input type="text" name ="mobileNm" id="mobileNm" /><br><br>		
	landNo : <input type="text" name ="landNo" id="landNo" /><br><br>
	
	<button type="button" name="submit" id="submit">Submit</button>
	
	
	</form>
	
	
</body>
