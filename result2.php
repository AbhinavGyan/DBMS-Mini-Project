<html>
<head><title>View Doctor</title>
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

<?php

require_once "includes/connect.php"; 

$x = $_GET["doctorID"];

$sql = "select * from doctor where doctorID = '$x';";
$result = mysqli_query($conn, $sql);

if($result->num_rows === 1) {
    while($row = $result->fetch_assoc()) {
        
        $firstName = $row["firstName"];
        $middleName = $row["middleName"];
        $lastName = $row["lastName"];
        $gender = $row["gender"]; 
        $qualification = $row["qualification"];
        $phoneNumber = $row["phoneNumber"];
        $fee = $row["fee"];
        $doctorID = $row["doctorID"];
    ?>
    <div class="media thumb">
        <div class="media-body b">
           <h4 class="media-heading"> <?php echo $firstName;?> <?php echo $middleName;?> <?php echo $lastName;?></h4>
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
<a href="index.html">Back to Main Page</a>

</body>
</html>
