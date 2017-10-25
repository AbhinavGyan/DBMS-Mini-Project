<html>
<head>
<title>Forgot</title>
<script>
    function ValidateAlpha2(evt) {
			var keyCode = (evt.which) ? evt.which : evt.keyCode
            if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && (keyCode < 48 || keyCode > 57){
            	alert ("Enter Characters");   
            	return false;
            }
            return true;
    }

</script>
</head>
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

                    $sql = "select question from adminLogin where adminID = 1;";
                    $result = $conn->query($sql);

                    $array = array();

                    if ($result->num_rows === 1) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                           $question = $row["question"];
                        }
                    } 
                    else {
                        echo "0 results";
                    }

    ?>


<form name="person1" method="post" action="answer.php" onsubmit="return validateForm();">

		<div class="input-group">
			<label><?php echo $question ?></label>
			<input type="text" name="answer" placeholder="answer" onkeypress="return ValidateAlpha2(event)" required/>
		</div>
        <div class="input-group">
			<button type="submit" class="btn" name="register">Submit</button>
		</div>
</form>

</body>
