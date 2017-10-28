<?php
$servername = "localhost";
$username = "root";
$password = "adirocks!?";
$dbname = "sabs";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand B" href="#" >S.A.B.S</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>    
    </div>
  </div>
</nav>



	<div class="container a">
	<div class="row">
		<div class="col-sm-9">

            <?php

                $x = $_GET["searchText"];

                $sql1 = "select departmentID from department where name = '$x';";
                $result1 = mysqli_query($conn,$sql1);

                if($result1->num_rows === 1) {
                    while($row = $result1->fetch_assoc()) {
                        $departmentID = $row['departmentID'];
                    }
                //$departmentID = $row['departmentID'];
                }
                else {
                    echo "0 result ";
                }

                $sql2 = "select * from doctor where departmentID = '$departmentID';";
                $result2 = mysqli_query($conn,$sql2);

                //$result = mysqli_query("select * from doctor where department = '$x';");

                //$sql = "select * from doctor where department = '$x';";

                //$result = mysqli_query($conn, $sql);

                if ($result2->num_rows > 0) {
                    // output data of each row
                    while($row = $result2->fetch_assoc()) {
                        $firstName = $row["firstName"];
                        $lastName = $row["lastName"];
                        $gender = $row["gender"]; 
                        $qualification = $row["qualification"];
                        $fee = $row["fee"];
                        $doctorID = $row["doctorID"];
                    ?>
                    <div class="media thumb">
                        <div class="media-body b">
                           <h4 class="media-heading"> <?php echo $firstName;?> <?php echo $lastName;?></h4>
                           <p>Gender : <?php echo $gender;?></p>
		                   <p>Qualification :  <?php echo $qualification;?></p>
		                   <p>Fee : <?php echo $fee;?></p>
			
		    	            <a href="result2.php?doctorID=<?php echo $doctorID; ?>"><span class="btn btn-info">
	                       Book Now &rsaquo;&rsaquo;
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
        <a href="index.html">Back to Main Page</a>

</body>
</html>
