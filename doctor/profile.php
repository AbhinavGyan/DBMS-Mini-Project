<?php

session_start();


require_once "../includes/connect.php";

?>

<html>
<head>
<title>Profile</title>
        <meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1">    
       <link rel="stylesheet" href="../css/bootstrap.min.css">
	    <script src="../scripts/jquery.min.js"></script>
	    <script src="../scripts/bootstrap.min.js"></script>
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

<div class="container a">
	<div class="row">
		<div class="col-sm-9">

            <?php
    
                $doctorID = $_SESSION['doctorID'];

                $sql1 = "select * from booking where doctorID = $doctorID and bookingStatus = 'confirm';";
                $result1 = mysqli_query($conn,$sql1);

                if($result1->num_rows > 0) {
                    // output data of each row
                    while($row = $result1->fetch_assoc()) {
                        $bookingID = $row["bookingID"];
                        $bookingDate = $row["bookingDate"];
                        $appointmentDate = $row["appointmentDate"]; 
                        $slot = $row["slot"];
                        $bookingStatus = $row["bookingStatus"];
                    ?>
                    <div class="media thumb">
                        <div class="media-body b">
                           <h4 class="media-heading"><b>Booking ID : <?php echo $bookingID;?></b></h4>
                           <p>Booking Date : <?php echo $bookingDate;?></p>
		                   <p>Appointment Date :  <?php echo $appointmentDate;?></p>
		                   <p>slot : <?php echo $slot;?></p>
                            <p>Booking Status : <?php echo $bookingStatus; ?></p>

                            <a href="../includes/doctor-cancel.php?bookingID=<?php echo $bookingID; ?>"><span class="btn btn-info">
	                       Cancel &rsaquo;&rsaquo;
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
        <a href="../index.php">Back to Main Page</a>

</body>
</html>
