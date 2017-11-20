<?php

session_start();

?>
<html>
<head><title>View Doctor</title>
      <meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1">    
       <link rel="stylesheet" href="css/bootstrap.min.css">
	    <script src="scripts/jquery.min.js"></script>
	    <script src="scripts/bootstrap.min.js"></script>
</head>
<style>
.b{padding-left:15px;
padding-top:10px;}

.c{padding:3px;}
.a{margin-top:55px;}

.thumb{margin-top:2px;
border:1px solid black;
background-color:rgb(240, 240, 240);
}
 #footer{ margin-top:3px;
padding:10px;	
border-top:1px solid DodgerBlue;
color: #eeeeee;
background-color: #211f22;
text-allign:centre;
}
.btn-info{margin-right:10px;
float:right;}

</style>
<body>

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
<br><br>
<?php

require_once "includes/connect.php"; 

$x = $_GET["doctorID"];

$sql = "select * from doctor where doctorID = '$x';";
$result = mysqli_query($conn, $sql);

if($result->num_rows === 1) {
    while($row = $result->fetch_assoc()) {
        
        $firstName = $row["firstName"];
        $lastName = $row["lastName"];
        $gender = $row["gender"]; 
        $qualification = $row["qualification"];
        $phoneNumber = $row["phoneNumber"];
        $fee = $row["fee"];
        $doctorID = $row["doctorID"];
    ?>
    <div class="media thumb">
        <div class="media-body b">
           <h4 class="media-heading"><b> <?php echo $firstName;?> <?php echo $lastName;?></b></h4>
           <p>Gender : <?php echo $gender;?></p>
           <p>Qualification :  <?php echo $qualification;?></p>
           <p>Contact :  <?php echo $phoneNumber;?></p>
           <p>Fee : <?php echo $fee;?>/-</p>
    
            <a href="result2.php?doctorID=<?php echo $doctorID; ?>"><span class="btn btn-info">
	        BOOK NOW &rsaquo;&rsaquo;
	       </span></a>

        </div>

    </div>
<?php   } 
}
else {
    echo "0 results";
}

/*$result = mysql_query("SELECT number FROM one");

$array = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
        $array[] = $row;
        echo $row['number'];
    }
    print_r($array);
    echo $array[0];
} 
else {
    echo "0 results";
}
*/
$conn->close();
?>
<br>
<a href="index.php">Back to Main Page</a>

</body>
</html>
