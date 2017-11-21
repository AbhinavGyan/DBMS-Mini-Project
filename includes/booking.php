<?php

session_start();
if (isset($_POST['bookedSlot'])) {
    
    require_once "connect.php";

    $slot = $conn->real_escape_string($_POST['slot']);

    if($slot == slot1 || $slot == slot2 || $slot == slot3 || $slot == slot4 || $slot == slot5 || $slot == slot6 || $slot == slot7 || $slot == slot8 ) {        
        $appointmentDate = date("Y-m-d");
    }
    else if($slot == slot9 || $slot == slot10 || $slot == slot11 || $slot == slot12 || $slot == slot13 || $slot == slot14 || $slot == slot15 || $slot == slot16 ) {
        $appointmentDate = date('Y-m-d', strtotime("+1 days"));
    }
    else if($slot == slot17 || $slot == slot18 || $slot == slot19 || $slot == slot20 || $slot == slot21 || $slot == slot22 || $slot == slot23 || $slot == slot24 ) {
        $appointmentDate = date('Y-m-d', strtotime("+2 days"));
    }

    if($slot == slot1 || $slot == slot9 || $slot == slot17) {
        $slot = "10:00:00";
    }
    else if($slot == slot2 || $slot == slot10 || $slot == slot18) {
        $slot = "11:00:00";
    }
    else if($slot == slot3 || $slot == slot11 || $slot == slot19) {
        $slot = "12:00:00";
    }
    else if($slot == slot4 || $slot == slot12 || $slot == slot20) {
        $slot = "14:00:00";
    }
    else if($slot == slot5 || $slot == slot13 || $slot == slot21) {
        $slot = "15:00:00";
    }
    else if($slot == slot6 || $slot == slot14 || $slot == slot22) {
        $slot = "16:00:00";
    }
    else if($slot == slot7 || $slot == slot15 || $slot == slot23) {
        $slot = "17:00:00";
    }
    else if($slot == slot8 || $slot == slot16 || $slot == slot24) {
        $slot = "20:00:00";
    }

    $personID = $_SESSION['personID'];
    $doctorID = $_SESSION['bookedDoctor'];

    //start transaction
	$conn->autocommit(FALSE);


    $sql = "insert into booking(bookingDate, appointmentDate, personID, doctorID, slot, bookingStatus)
            values(curdate(), '$appointmentDate', '$personID', '$doctorID', '$slot', 'Confirm')";
	
    if ($conn->query($sql) !== TRUE) {
        
		$conn->rollback();
		header("Location: ../index.php?booking=error");
		exit();
	}

    //commit transaction
	$conn->commit();

	//enable autocommit
	$conn->autocommit(TRUE);

    //start transaction
	$conn->autocommit(FALSE);

    $_SESSION['appointmentDate'] = $appointmentDate;
    $_SESSION['slot'] = $slot;    

    $sql2 = "select bookingID from booking where appointmentDate = '$appointmentDate' and personID = 
             '$personID' and doctorID = '$doctorID' and slot = '$slot'";
    $result = $conn->query($sql2);
	
    if ($row = $result->fetch_assoc()) {

		$_SESSION['bookingID'] = $row['bookingID'];
	}

    //commit transaction
	$conn->commit();

	//enable autocommit
	$conn->autocommit(TRUE);


    header("Location: ../index.php?booking=success");
	exit();
    
}
else {
    header("Location: ../index.php");
	exit();
}
?>
