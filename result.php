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
$result2 = $conn->query($sql2);

//$result = mysqli_query("select * from doctor where department = '$x';");

//$sql = "select * from doctor where department = '$x';";

//$result = mysqli_query($conn, $sql);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        echo "Name: " . $row["firstName"]. " " .$row["lastName"]. "<br>";
        echo "Gender - " . $row["gender"]. "<br>"; 
        echo "Qualification: " . $row["qualification"]. "<br>";
        echo "Fee - " .$row["fee"]. "<br>";
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
