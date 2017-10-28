<?php

session_start();

if (isset($_POST['submitPersonLogin'])) {

	require_once "connect.php";

	$email = $conn->real_escape_string($_POST['email']);
	$password = $conn->real_escape_string($_POST['password']);

	//error handlers
	//check for empty fields
	if (empty($email) || empty($password)) {

		header("Location: ../person/login.php?login=empty");
		exit();
	}

	//check for valid email
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		header("Location: ../person/login.php?login=invalid");
		exit();
	}

	//verify email
	$sql = "select * from personLogin where email = '$email'";
	$result = $conn->query($sql);

	if ($result->num_rows < 1) {

		header("Location: ../person/login.php?login=invalid_login");
		exit();
	}

	//verify password
	if ($row = $result->fetch_assoc()) {

		//hashing the password
		$hashedPassword = md5($password);

		if ($hashedPassword !== $row['password']) {

			header("Location: ../person/login.php?login=invalid_login");
			exit();
		}

		$_SESSION['personID'] = $row['personID'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['lastLogin'] = $row['lastLogin'];

		header("Location: ../index.php?login=success");
		exit();
	}

} else {
	header("Location: ../index.php");
	exit();
}