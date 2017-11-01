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
</head>
<body>
	<br>
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 style="text-align: center;">Sign Up</h4>
			</div>
			<div class="panel-body">
				<br>
				<form class="form-horizontal" action="../includes/doctor-signup.php" method="POST">
					<div class="form-group">
						<label class="control-label col-md-3">First Name:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="first" placeholder="Enter First Name" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Middle Name:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="middle" placeholder="Enter Middle Name">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Last Name:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="last" placeholder="Enter Last Name" required>
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
							<input type="date" class="form-control" name="dob" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Phone Number:</label>
						<div class="col-md-9">
							<input type="number" class="form-control" name="phone" placeholder="Enter Phone Number" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Email:</label>
						<div class="col-md-9">
							<input type="email" class="form-control" name="email" placeholder="Enter Email" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Password:</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="password" placeholder="Create a Password" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Qualification:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="qualification" placeholder="M.B.B.S , B.D.S" required>
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
							<input type="number" class="form-control" name="fee" placeholder="Reasonable Amount" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Hospital/Clinic Name:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="building" placeholder="Appollo" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Security Question:</label>
						<div class="col-md-9">
							<select class="form-control" name="question">
								<option value="In what city or town was your mother born?">In what city or town was your mother born?</option>
								<option value="What street did you live on when you were 8 years old?">What street did you live on when you were 8 years old?</option>
								<option value="What was the last name of your first grade teacher?">What was the last name of your first grade teacher?</option>
								<option value="What was your grandfather's occupation?">What was your grandfather's occupation?</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Security Answer:</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="answer" placeholder="Enter Security Answer" required>
						</div>
					</div>
					<br>
					<div class="form-group">
						<label class="control-label col-md-3"></label>
						<div class="col-md-9">
							<button type="submit" class="btn btn-primary" name="submitDoctorSignup">Submit</button>
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
