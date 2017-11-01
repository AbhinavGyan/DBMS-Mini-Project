<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>SABS - Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../scripts/jquery.min.js"></script>
	<script src="../scripts/bootstrap.min.js"></script>

	<?php
		
	if (isset($_SESSION['doctorSignup']) && $_SESSION['doctorSignup']) {

		//display sign up success modal
		echo '
			<script>
				$(document).ready(function(){
					$("#signUpSuccessModal").modal();
				});
			</script>';
		$_SESSION['doctorSignup'] = 0;
	}

	if (isset($_SESSION['invalid_login']) && $_SESSION['invalid_login']) {

		//display invalid log in modal
		echo '
			<script>
				$(document).ready(function(){
					$("#invalidLogInModal").modal();
				});
			</script>';
		$_SESSION['invalid_login'] = 0;
	}

	if (isset($_SESSION['reset']) && $_SESSION['reset']) {

		//display reset success modal
		echo '
			<script>
				$(document).ready(function(){
					$("#resetSuccessModal").modal();
				});
			</script>';
		$_SESSION['reset'] = 0;
	}

	?>
</head>
<body>

	<!-- Sign Up Success Modal -->
	<div id="signUpSuccessModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Sign Up Successful!</h3>
				</div>
				<div class="modal-body">
					<h4>Please log in to continue...</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<!-- Invalid Log In Modal -->
	<div id="invalidLogInModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Invalid Email or Password!</h3>
				</div>
				<div class="modal-body">
					<h4>Please try again...</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<!-- Reset Success Modal -->
	<div id="resetSuccessModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Password Reset Successful!</h3>
				</div>
				<div class="modal-body">
					<h4>Please log in to continue...</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>


	<br>
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 style="text-align: center;">Log In</h4>
			</div>
			<div class="panel-body">
				<br>
				<form class="form-horizontal" action="../includes/doctor-login.php" method="POST">
					<div class="form-group">
						<label class="control-label col-md-3">Email:</label>
						<div class="col-md-9">
							<input type="email" class="form-control" name="email" placeholder="Enter Email" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Password:</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="password" placeholder="Enter Password" required>
						</div>
					</div>
					<br>
					<div class="form-group">
						<label class="control-label col-md-3"></label>
						<div class="col-md-9">
							<button type="submit" class="btn btn-primary" name="submitDoctorLogin">Submit</button>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"></label>
						<div class="col-md-9">
							<p>Not a member? <a href="signup.php">Sign Up</a></p>
							<p><a href="forgot-password.php">Forgot Password?</a></p>
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
