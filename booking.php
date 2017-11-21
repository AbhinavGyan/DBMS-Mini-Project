<?php
session_start();

require_once "includes/connect.php";

if(!isset($_SESSION['login']) && !($_SESSION['login'])) {
		//echo $_SESSION['notLogged']; 
		//display logged in modal
		header("Location: person/login.php?notLogged=1");
		exit();
}
$_SESSION['bookedDoctor'] = $_GET['doctorID'];
?>

<html>
<head><title>Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../scripts/jquery.min.js"></script>
<script src="../scripts/bootstrap.min.js"></script>
<script src="../scripts/validate.js"></script>
</head>
<body>

<br>
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-danger" style="border-color: #d9534f;">
			<div class="panel-heading" style="color: #ffffff; border-color: #d9534f; background-color: #d9534f;">
				<h4 style="text-align: center;">Book</h4>
			</div>
			<div class="panel-body">
				<br>
				<form class="form-horizontal" name="myForm" action="includes/booking.php" method="POST">
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo date("d-m-Y"); ?> :</label>
						<div class="col-md-9">
							<input type="radio" name="slot" value="slot1" checked>10:00&nbsp;&nbsp;
  							<input type="radio" name="slot" value="slot2">11:00&nbsp;&nbsp;
  							<input type="radio" name="slot" value="slot3">12:00&nbsp;&nbsp;  
							<input type="radio" name="slot" value="slot4">14:00&nbsp;&nbsp;  
							<input type="radio" name="slot" value="slot5">15:00&nbsp;&nbsp;  
  							<input type="radio" name="slot" value="slot6">16:00&nbsp;
  							<input type="radio" name="slot" value="slot7">17:00&nbsp;
							<input type="radio" name="slot" value="slot8">20:00
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo date('d-m-Y', strtotime("+1 days")); ?> :</label>
						<div class="col-md-9">
							<input type="radio" name="slot" value="slot9">10:00&nbsp;&nbsp;
  							<input type="radio" name="slot" value="slot10">11:00&nbsp;&nbsp;
  							<input type="radio" name="slot" value="slot11">12:00&nbsp;&nbsp;
							<input type="radio" name="slot" value="slot12">14:00&nbsp;&nbsp;
							<input type="radio" name="slot" value="slot13">15:00&nbsp;&nbsp;
  							<input type="radio" name="slot" value="slot14">16:00&nbsp;
  							<input type="radio" name="slot" value="slot15">17:00&nbsp;
							<input type="radio" name="slot" value="slot16">20:00  
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><?php echo date('d-m-Y', strtotime("+2 days")); ?> :</label>
						<div class="col-md-9">
							<input type="radio" name="slot" value="slot17">10:00&nbsp;&nbsp;
  							<input type="radio" name="slot" value="slot18">11:00&nbsp;&nbsp;
  							<input type="radio" name="slot" value="slot19">12:00&nbsp;&nbsp;
							<input type="radio" name="slot" value="slot20">14:00&nbsp;&nbsp;
							<input type="radio" name="slot" value="slot21">15:00&nbsp;&nbsp;
  							<input type="radio" name="slot" value="slot22">16:00&nbsp;
  							<input type="radio" name="slot" value="slot23">17:00&nbsp;
							<input type="radio" name="slot" value="slot24">20:00  
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"></label>
						<div class="col-md-9">
							<button type="submit" class="btn btn-danger" name="bookedSlot">Book</button>
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

