<?php
session_start();

if (isset($_SESSION['notLogged']) && $_SESSION['notLogged']) {
		//echo $_SESSION['notLogged']; 
		//display logged in modal
		header("Location: person/login.php");
		exit();
	}

	
?>