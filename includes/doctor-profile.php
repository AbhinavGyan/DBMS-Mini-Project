<?php

session_start();

if (isset($_POST['submitDoctorChanges'])) {

    require_once "connect.php";

    $first = $conn->real_escape_string($_POST['first']);
    $middle = $conn->real_escape_string($_POST['middle']);
    $last = $conn->real_escape_string($_POST['last']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $qualification = $conn->real_escape_string($_POST['qualification']);
    $department = $conn->real_escape_string($_POST['department']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $fee = $conn->real_escape_string($_POST['fee']);
    $building = $conn->real_escape_string($_POST['building']);
	$experience = $conn->real_escape_string($_POST['experience']);
	$slot1 = $conn->real_escape_string($_POST['slot1']);
	$slot2 = $conn->real_escape_string($_POST['slot2']);
	$slot3 = $conn->real_escape_string($_POST['slot3']);
	$slot4 = $conn->real_escape_string($_POST['slot4']);
	$slot5 = $conn->real_escape_string($_POST['slot5']);
	$slot6 = $conn->real_escape_string($_POST['slot6']);
	$slot7 = $conn->real_escape_string($_POST['slot7']);
	$slot8 = $conn->real_escape_string($_POST['slot8']);
	$slot9 = $conn->real_escape_string($_POST['slot9']);
	$slot10 = $conn->real_escape_string($_POST['slot10']);
	$slot11 = $conn->real_escape_string($_POST['slot11']);
	$slot12 = $conn->real_escape_string($_POST['slot12']);



    //error handlers
	//check for empty fields
	if (empty($building) || empty($fee) || empty($first) || empty($last) || empty($dob) || empty($phone) || empty($qualification) || empty($experience)) {

		header("Location: ../doc/signup.php?changes=empty");
		exit();
	}

    //check for valid inputs
	if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z ]*$/", $middle) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[1-9][0-9]{9}$/", $phone)) {

		header("Location: ../doc/signup.php?changes=invalid");
		exit();
	}

	//check for valid email
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		header("Location: ../doc/signup.php?changes=invalid");
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
    	header('Location: ../doc/signup.php?changes=Invalid_department');
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
    	header('Location: ../doc/signup.php?changes=Invalid_building');
    	exit();
	}

	$email = $_SESSION['email'];

	$sql3 = "select * from doctorLogin where email = '$email';";
	$result3 = $conn->query($sql3);

	if ($row = $result3->fetch_assoc()) {

		$doctorID = $row['doctorID'];
	}		
	
	//start transaction
	$conn->autocommit(FALSE);

	$sql = "update doctor set firstName = "$firstName", middleName = "$middleName", lastName = "$lastName", gender = "$gender", dob = "$dob", phoneNumber = $phone,  
			qualification = "$qualification", departmentID = $departmentID , buildingID = $buildingID, experience = $experience, fee = $fee where doctorID = $doctorID;";


	//if ($conn->query($sql) === TRUE)

	$sql4 = "select * from timeSlot where doctorID = '$doctorID';";
	$result4 = $conn->query($sql4);

	if ($result4->num_rows > 0) {
    	// output data of each row
    	$sql2 = "update timeSlot set slot1000 = "$slot1", slot1030 = "$slot2", slot1100 = "$slot3", slot1130 = "$slot4", slot1400 = "$slot5", slot1430 = "$slot6", slot1500 = "$slot7",
				 slot1530 = "$slot8", slot1800 = "$slot9", slot1830 = "$slot10", slot1900 = "$slot11", slot1930 = "$slot12" where doctorID = "doctorID";";
	} 
	else {
	    $sql6 = "insert into timeSlot(doctorID, slot1000, slot1030, slot1100, slot1130, slot1400, slot1430, slot1500, slot1530, slot1800, slot1830, slot1900, slot1930)
				 values($doctorID, '$slot1', '$slot2', '$slot3', '$slot4', '$slot5', '$slot6', '$slot7', '$slot8', '$slot9', '$slot10', '$slot11', '$slot12');"; 
	}

	//commit transaction
	$conn->commit();

	//enable autocommit
	$conn->autocommit(TRUE);

	$_SESSION['doctorChanges'] = 1;

	header("Location: ../doctor.php?changes=success");
	exit();

} else {
	header("Location: ../doctor.php");
	exit();
}
