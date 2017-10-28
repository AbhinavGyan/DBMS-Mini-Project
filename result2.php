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
