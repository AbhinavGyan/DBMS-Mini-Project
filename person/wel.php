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
$gender = $_POST['Gender'];
$pass = $_POST["pass"];
$mobile = $_POST["mobile"];
$mail = $_POST["email"];

$password = md5($pass);

$sql1 = "insert into person(firstName,middleName,lastName,dob,gender,phoneNumber)
    	values('$x','$y','$z','$dob','$gender','$mobile');";
$sql2 = "insert into personLogin(email,password)
        values('$mail','$password');";

//mysql_query($sql1, $con);
//mysql_query($sql2, $con);


if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
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
<a href="Login.php">Back to Login</a>

</body>
</html>
