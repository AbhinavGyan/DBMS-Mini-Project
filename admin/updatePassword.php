<html>
<body>
<?php
session_start();

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

$pass = $_POST["password"];

$sql = "update adminLogin set password = '$pass' where adminID = 1;";


if ($conn->query($sql) === TRUE) {
    echo "Password changed";
}
else {
    header('Location: Failed.php');
    exit;
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
<br><br>Back to Login ?<a href="Login.php">Click here !</a>
</body>
</html>
