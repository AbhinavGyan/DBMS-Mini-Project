<html>
<body>

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

$x = $_POST["fname"];
$y = $_POST["mname"];
$z = $_POST["lname"];
$dob = $_POST["dob"];
$qual = $_POST["qual"];
$dept = $_POST["department"];
$gender = $_POST['Gender'];
$pass = $_POST["pass"];
$mobile = $_POST["mobile"];
$mail = $_POST["email"];
$fee = $_POST["fee"];
$building = $_POST["building"];
$password = md5($pass);

$sql1 = "select departmentID from department where name = '$dept';";

$result = mysqli_query($conn,$sql1);

if($result->num_rows === 1) {
    while($row = $result->fetch_assoc()) {
        $departmentID = $row['departmentID'];
    }
    //$departmentID = $row['departmentID'];
}
else {
    header('Location: doctorFailed.php');
    exit();
}


$sql2 = "select buildingID from building where name = '$building';";

$result1 = mysqli_query($conn,$sql2);

if($result1->num_rows === 1) {
    while($row = $result1->fetch_assoc()) {
        $buildingID = $row['buildingID'];
    }
//$buildingID = $row['buildingID'];
}
else {
    header('Location: doctorFailed.php');
    exit();
}


$sql3 = "insert into doctor(firstName,middleName,lastName,dob,gender,phoneNumber , registerDate , qualification , departmentID , buildingID , fee , status)
    	values('$x','$y','$z','$dob','$gender' , '$mobile' , curdate() , '$qual' , '$departmentID' , '$buildingID' , '$fee' , 'pending');";
$sql4 = "insert into doctorLogin(doctorID , email,password,question,answer,lastLogin)
        values(last_insert_id(), '$mail','$password','What is your name','aditya',CURRENT_TIMESTAMP());";

//mysql_query($sql1, $con);
//mysql_query($sql2, $con);

if ($conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE) {
    echo "New record created successfully";   
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
<a href="doctorLogin.php">Back to Login</a>

</body>
</html>
