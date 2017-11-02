<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SABS - Sign Up</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap and jQuery standard library files --><!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

	<!-- CAUTION: DO NOT EDIT THESE FILES -->
	<!-- Offline version of the above files -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../scripts/jquery.min.js"></script>
	<script src="../scripts/bootstrap.min.js"></script>


	<?php

		$doctorID = $_SESSION['doctorID'];
		
		require_once "../includes/connect.php";

		$sql1 = "select * from doctorLogin where doctorID = '$doctorID';";
		$result1 = $conn->query($sql1);

		if ($row = $result1->fetch_assoc()) {

			$email = $row['email'];
			$lastLogin = $row['lastLogin'];
		}

		$sql2 = "select * from doctor where doctorID = '$doctorID';";
		$result2 = $conn->query($sql2);

		if ($row = $result2->fetch_assoc()) {

			$firstName = $row['firstName'];
			$middleName = $row['middleName'];
			$lastName = $row['lastName'];
			$phoneNumber = $row['phoneNumber'];
			$departmentID = $row['departmentID'];
			$buildingID = $row['buildingID'];
			$experience = $row['experience'];
			$fee = $row['fee'];
			$qualification = $row['qualification'];
			$dob = $row['dob'];
		}

		$sql3 = "select * from department where departmentID = '$departmentID';";
		$result3 = $conn->query($sql3);

		if ($row = $result3->fetch_assoc()) {

			$department = $row['name'];
		}		

		$sql4 = "select * from building where buildingID = '$buildingID';";
		$result4 = $conn->query($sql4);

		if ($row = $result4->fetch_assoc()) {

			$building = $row['name'];
		}
	?>
</head>
<body>
	<br>
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 style="text-align: center;">My Profile</h4>
			</div>
			<div class="panel-body">
				<br>
				<form class="form-horizontal" action="../includes/doctor-profile.php" method="POST">
					<div class="form-group">
						<label class="control-label col-md-3">First Name:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="first" value="<?php echo $firstName; ?>" placeholder="Enter First Name" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Middle Name:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="middle" value="<?php echo $middleName; ?>" placeholder="Enter Middle Name">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Last Name:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="last" value="<?php echo $lastName; ?>" placeholder="Enter Last Name" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Gender:</label>
						<div class="col-md-9">
							<select class="form-control" name="gender">
								<option value="Female">Female</option>
								<option value="Male">Male</option>
								<option value="Other">Other</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Date of Birth:</label>
						<div class="col-md-9">
							<input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Phone Number:</label>
						<div class="col-md-9">
							<input type="number" class="form-control" name="phone" value="<?php echo $phoneNumber; ?>" placeholder="Enter Phone Number" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Qualification:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="qualification" value="<?php echo $qualification; ?>" placeholder="M.B.B.S , B.D.S" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Department:</label>
						<div class="col-md-9">
							<select class="form-control" name="department">
 								<option value="dentist">Dentist</option>
 								<option value="dermatologist">Dermatologist</option>
								<option value="ayurveda">Ayurveda</option>
								<option value="cardiologist">Cardiologist</option>
								<option value="gastroenterolo">Gastroenterolo</option>
								<option value="dietitian">Dietitian</option>
								<option value="urologist">Urologist</option>
				 				<option value="pediatrician">Pediatrician</option>
								<option value="ent">Ear-Nose-Throat (ENT)</option>
								<option value="homeopath">Homeopath</option>
								<option value="gynecologist">Gynecologist</option>
								<option value="psychiatrist">Psychiatrist</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Fee:</label>
						<div class="col-md-9">
							<input type="number" class="form-control" name="fee" value="<?php echo $fee; ?>" placeholder="Reasonable Amount" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Hospital/Clinic Name:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="building" value="<?php echo $building; ?>" placeholder="Appollo" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Experience (In years):</label>
						<div class="col-md-9">
							<input type="number" class="form-control" name="experience" value="<?php echo $experience; ?>" placeholder="In years" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Time Slots:</label>
						<div class="col-md-9">
							<input type="checkbox" name="slot1" value="y">slot @ 10:00
							<input type="checkbox" name="slot2" value="y">slot @ 10:30
							<input type="checkbox" name="slot3" value="y">slot @ 11:00
							<input type="checkbox" name="slot4" value="y">slot @ 11:30<br><br><br>
							<input type="checkbox" name="slot5" value="y">slot @ 14:00
							<input type="checkbox" name="slot6" value="y">slot @ 14:30
							<input type="checkbox" name="slot7" value="y">slot @ 15:00
							<input type="checkbox" name="slot8" value="y">slot @ 15:30<br><br><br>
							<input type="checkbox" name="slot9" value="y">slot @ 18:00
							<input type="checkbox" name="slot10" value="y">slot @ 18:30
							<input type="checkbox" name="slot11" value="y">slot @ 19:00
							<input type="checkbox" name="slot12" value="y">slot @ 19:30
						</div>
					</div>
					<br>
					<div class="form-group">
						<label class="control-label col-md-3"></label>
						<div class="col-md-9">
							<button type="submit" class="btn btn-primary" name="submitDoctorChanges">Save Changes</button>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"></label>
						<div class="col-md-9">
							<p>Already a member? <a href="login.php">Log In</a></p>
							<p><a href="../doctor.php">Home</a></p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</body>
</html>
