<!DOCTYPE html> 
<head>

</head>

<body>

<?php 
	
	require("classes/Employee.php");
	$employee = new Employee();

	if (isset($_POST['submit'])) {
		$nic = "";
		$nic = $_POST['nic'];
		echo $nic;
		
	}
	
	
	
	
	
?>


	<h1>Add Employee</h1>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" onsubmit ="validationForm();">
	
		nicNumber : <input type="text" name ="nic" required id="nic" /><br><br>
	role: <select>
	
	<!-- load roles --> 
	<option value="">Select Role</option>
	<?php 
	
		$roleTypeResult = $employee->loadRoles();
		
	/*	foreach($roleTypeResult as $row){
			
			echo '<option value="'.$row['roleTypeID'].'" >'.$row['roleType'].'</option>';
			
		}*/
		if(mysqli_num_rows($roleTypeResult) > 0 ){
				while($row = mysqli_fetch_assoc($roleTypeResult)){
					
					echo $row['roleType'];
					echo '<br>';
					echo '<option value="'.$row['roleTypeID'].'" >'.$row['roleType'].'</option>';
				}
				
			}
		
	?>
		</select>	<br><br>
		
		<!-- end load roles -->
		
		
		<!-- load designations -->
		
	Designation: <select id="designation" name = "designation" onchange="selectionForm(this.value)">
	<option value="none">Select Designation</option>
			<?php 
				//$sqlQuery = "select * from designation";
				
				//$designationResult = $mysqli->query($sqlQuery);
				
				$designationTypeResult = $employee->loadDesignation();
				
					if(mysqli_num_rows($designationTypeResult) > 0 ){
						while($row = mysqli_fetch_assoc($designationTypeResult)){
							echo '<br>';
							echo '<option value="'.$row['designationTypeID'].'" >'.$row['designation'].'</option>';
						}
						
					}
	
			?>
			
			</select>
			<br><br>
		<!-- end load designations --> 
			<!-- hidden forms -->
			
		<div id="provinceHiddenForm">
			province Office : 	<select onchange="showUser(this.value)">
				<option value="">Select ProvinceOffice</option>
				<option value="1">centralProvince</option>
				<option value="2">westernProvince</option>
				<option value="3">sothernProvince</option>
				<option value="4">NothernProvince</option>
				<option value="6">esternProvince</option>
			</select>
		</div>
		<div id = "zonalOfficeHidden">
			Zonal Office : <select  id="abc" > </select>
		</div>
		<div id = "schoolHidden">
			School : <select id="abcd" ></select>
		</div>
		<div id = "subjectHidden">
			Appoinment Subject : <select>
				<option value="none">Select subject</option>
			</select>
		</div>
		<!--end hidden forms -->
<br><br>
	
	nameWithInitials : <input type="text" name ="name" id="name" /><br><br>
	Full Name :  <input type="text" name ="fName" id="fName" /><br><br>
	Employement Id :  <input type="text" name ="eId" id="eId" /><br><br>
	email : <input type="email" name ="email" id="email" required /><br><br>
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
	
	<button type="submit" name="submit" id="submit">Submit</button>
	
	
	</form>
	
	<script src = "assets/js/jquery-2.1.4.min.js"></script>
	<script src = "assets/js/addEmployee.js"></script>

</body>
