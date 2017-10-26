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

$x = $_POST["searchText"];

$sql = "select * from doctor where department = '$x';";
$result = $conn->query($sql);


//$result = mysqli_query("select * from doctor where department = '$x';");

//$sql = "select * from doctor where department = '$x';";

//$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "name: " . $row["firstName"]. " - qualification: " . $row["qualification"]. "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
    }
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
