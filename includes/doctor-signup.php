<?php

session_start();

if (isset($_POST['submitDoctorSignup'])) {

    require_once "connect.php";

    $first = $conn->real_escape_string($_POST['first']);
    $middle = $conn->real_escape_string($_POST['middle']);
    $last = $conn->real_escape_string($_POST['last']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $qualification = $conn->real_escape_string($_POST['qualification']);
    $department = $conn->real_escape_string($_POST['department']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $password = $conn->real_escape_string($_POST['password']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $fee = $conn->real_escape_string($_POST['fee']);
    $building = $conn->real_escape_string($_POST['building']);
	$question = $conn->real_escape_string($_POST['question']);
	$answer = $conn->real_escape_string($_POST['answer']);

    //error handlers
	//check for empty fields
	if (empty($building) || empty($fee) || empty($first) || empty($last) || empty($dob) || empty($phone) || empty($email) || empty($password) || empty($answer) || empty($qualification)) {

		header("Location: ../doc/signup.php?signup=empty");
		exit();
	}

    //check for valid inputs
	if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z ]*$/", $middle) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[1-9][0-9]{9}$/", $phone)) {

		header("Location: ../doc/signup.php?signup=invalid");
		exit();
	}

	//check for valid email
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		header("Location: ../doc/signup.php?signup=invalid");
		exit();
	}

	//check for already registered
	$sql = "select * from doctorLogin where email = '$email';";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		header("Location: ../doc/signup.php?signup=already_registered");
		exit();
	}

	//Searching whether department exists in the database or not
	$sql1 = "select departmentID from department where name = '$department';";

	$result1 = mysqli_query($conn,$sql1);

	if($result1->num_rows === 1) {
    	while($row = $result1->fetch_assoc()) {
    	    $departmentID = $row['departmentID'];
    	}
    	//$departmentID = $row['departmentID'];
	}	
	else {
    	header('Location: ../doc/signup.php?signup=Invalid_department');
    	exit();
	}

	//Searching whether building exists in the database or not 
	$sql2 = "select buildingID from building where name = '$building';";

	$result2 = mysqli_query($conn,$sql2);

	if($result2->num_rows === 1) {
    	while($row = $result2->fetch_assoc()) {
        	$buildingID = $row['buildingID'];
    	}
		//$buildingID = $row['buildingID'];
	}
	else {
    	header('Location: ../doc/signup.php?signup=Invalid_building');
    	exit();
	}	

	 //hashing the password
	$hashedPassword = md5($password);

	//hashing the answer
	$hashedAnswer = md5($answer);
	
	//start transaction
	$conn->autocommit(FALSE);

	//insert data into person table
	$sql = "insert into doctor (firstName, middleName, lastName, gender, dob, phoneNumber, qualification, departmentID, buildingID, fee,  registerDate, status) 
            values ('$first', '$middle', '$last', '$gender', '$dob', '$phone','$qualification', '$departmentID', '$buildingID', '$fee', curdate(), 'Pending');";

	if ($conn->query($sql) !== TRUE) {

		//echo "Error: " . $conn->error;
		$conn->rollback();
		header("Location: ../doc/signup.php?signup=error");
		exit();
	}


	//insert data into personLogin table
	$sql = "insert into doctorLogin (doctorID, email, password, question, answer, lastLogin) 
			values (last_insert_id(), '$email', '$hashedPassword', '$question', '$hashedAnswer', now());";

	if ($conn->query($sql) !== TRUE) {

		//echo "Error: " . $conn->error;
		$conn->rollback();
		header("Location: ../doc/signup.php?signup=error");
		exit();
	}

	//commit transaction
	$conn->commit();

	//enable autocommit
	$conn->autocommit(TRUE);

	$_SESSION['doctorSignup'] = 1;

	header("Location: ../doc/login.php?signup=success");
	exit();

} else {
	header("Location: ../doctor.php");
	exit();
}
