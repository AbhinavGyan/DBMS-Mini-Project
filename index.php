<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SABS - Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap and jQuery standard library files --><!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

	<!-- CAUTION: DO NOT EDIT THESE FILES -->
	<!-- Offline version of the above files -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="scripts/jquery.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>

	<?php

	if (isset($_SESSION['login']) && $_SESSION['login']) {

		//display logged in modal
		echo '
			<script>
				$(document).ready(function(){
					$("#loggedInModal").modal();
				});
			</script>';
		$_SESSION['login'] = 0;
	}
	else{
		$_SESSION['notLogged']=1;
	}

	if (isset($_SESSION['logout']) && $_SESSION['logout']) {

		//display logged out modal
		echo '
			<script>
				$(document).ready(function(){
					$("#loggedOutModal").modal();
				});
			</script>';
		$_SESSION['logout'] = 0;
		$_SESSION['notLogged']=1;
	}

	?>

</head>
<body>
	<!-- Logged In Modal -->
	<div id="loggedInModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Welcome!</h3>
				</div>
				<div class="modal-body">
					<h4>You are logged in!</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<!-- Logged Out Modal -->
	<div id="loggedOutModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal Content -->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Bye!</h3>
				</div>
				<div class="modal-body">
					<h4>You are logged out!</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<!-- Bootstrap Navigation Bar Top -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbarTop">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Smart Appointment Booking System</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbarTop">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="index.php">For Patients</a></li>
					<li class="navbar-text"> </li>
					<li><a href="doctor.php">For Doctors</a></li>
					<li class="navbar-text"> </li>

					<?php

					if (isset($_SESSION['personID'])) {

						//logged in
						echo '
							<li><a href="person/profile.php">My Profile</a></li>
							<li class="navbar-text"> </li>
							<li><a href="includes/person-logout.php">Log Out</a></li>';
					} 
                    else {

						//not logged in
						echo '
							<li><a href="person/login.php">Log In</a></li>
							<li class="navbar-text"> </li>
							<li><a href="person/signup.php">Sign Up</a></li>';
					}

					?>

					<li class="navbar-text"> </li>
				</ul>
			</div>
		</div>
	</nav>
	<nav class="navbar navbar-inverse" style="margin-bottom: 0;"></nav>

	<!-- Bootstrap Carousel -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="images/slide.png" alt="Slide 1">
			</div>
			<div class="item">
				<img src="images/slide.png" alt="Slide 2">
			</div>
			<div class="item">
				<img src="images/slide.png" alt="Slide 3">
			</div>
		</div>
		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<!-- Search -->
	<div class="container-fluid" style="background-color: #28328c;">
		<br>
		<h1 style="color: White; text-align: center;">Find and Book</h1>
		<br>
		<form name="search1" action="result.php">
			<div class="container-fluid">
				<div class="col-md-2"></div>
				<div class="col-md-2">
					<div class="input-group input-group-lg">
						<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
						<select class="form-control" id="selectCity">
							<option>Mysore</option>
						</select>
					</div>
					<br>
				</div>
				<div class="col-md-6">
					<div class="input-group input-group-lg">
						<form>
							<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
							<input type="text" class="form-control" name="searchText" placeholder="Search by Department...">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</div>
						</form>
					</div>
					<br>
				</div>
				<div class="col-md-2"></div>
			</div>
		</form>
	</div>
	<!-- Search Image -->
	<div class="carousel-inner">
		<div class="item active">
			<img src="images/search.png" alt="Search Image">
		</div>
	</div>
</body>
</html>
