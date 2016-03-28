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
	<option value="">Select Role</option>
	<?php 
	
		$roleTypeResult = $employee->loadRoles();
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
			$instituteTypeResult = $employee->loadInstitutes();
				
					if(mysqli_num_rows($instituteTypeResult) > 0 ){
						while($row = mysqli_fetch_assoc($instituteTypeResult)){
							
							echo '<br>';
							echo '<option value="'.$row['instituteTypeID'].'" >'.$row['instituteType'].'</option>';
						}
						
					}
	
	?>
			
		
	</select>	<br><br>
	
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
			<!-- hidden forms -->
			
		<div id="provinceHiddenForm">
			province Office : 	<select>
				<option value="none">Select ProvinceOffice</option>
			</select>
		</div>
		<div id = "zonalOfficeHidden">
			Zonal Office : <select>
				<option value="none">Select Zonal Office</option>
			</select>
		</div>
		<div id = "schoolHidden">
			School : <select>
				<option value="none">Select School</option>
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
	
	
	<script type="text/javascript">
		$(document).ready(function(){
			document.getElementById("provinceHiddenForm").style.visibility = 'hidden';
			document.getElementById("zonalOfficeHidden").style.visibility = 'hidden';
			document.getElementById("schoolHidden").style.visibility = 'hidden';
});
	</script>
	
	<script type="text/javascript">
		
		function selectionForm(val){
			if(val == "5" || val == "4"){
				document.getElementById('schoolHidden').style.visibility = 'visible';
				document.getElementById('zonalOfficeHidden').style.visibility = 'visible';
				document.getElementById('provinceHiddenForm').style.visibility = 'visible';
			}
			else if(val == "3"){
				document.getElementById('zonalOfficeHidden').style.visibility = 'visible';
				document.getElementById('schoolHidden').style.visibility = 'hidden';
				document.getElementById('provinceHiddenForm').style.visibility = 'visible';
			}else if(val == "2"){
				document.getElementById('provinceHiddenForm').style.visibility = 'visible';
				document.getElementById('schoolHidden').style.visibility = 'hidden';
				document.getElementById('zonalOfficeHidden').style.visibility = 'hidden';
			}else if(val == "1"){
				document.getElementById('schoolHidden').style.visibility = 'hidden';
				document.getElementById('zonalOfficeHidden').style.visibility = 'hidden';
				document.getElementById('provinceHiddenForm').style.visibility = 'hidden';
			}else{
				
				alert('select a value');
			}
		}
		
		
		function validationForm(){
			
			//alert('kalinga');
		}
		
	
	</script>
	
	
	
</body>
