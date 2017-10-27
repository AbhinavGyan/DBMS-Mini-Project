<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style>
			sup {
				color : red;
			}
	</style>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
			function ValidateAlpha(evt) {
				var keyCode = (evt.which) ? evt.which : evt.keyCode
            	if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123)){
            		alert ("Enter Characters (No spaces Allowed)");   
            		return false;
            	}
                return true;
			}

			function ValidateAlpha2(evt) {
				var keyCode = (evt.which) ? evt.which : evt.keyCode
            	if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32){
            		alert ("Enter Characters");   
            		return false;
            	}
                return true;
			}

			function validateEmail(emailField){
        		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        		if (reg.test(emailField.value) == false) 
        		{
            		alert('Invalid Email Address');
            		return false;
        		}

        		return true;

			}

			var length;
			function validatenum(number) {
				var reg = /^([0-9])+$/;
				length = (number.value).length;
				if (reg.test(number.value) == false) {
					alert('10 Digit number');
					return false;
				}
				return true
			}

			function validateForm() {
				if(length != 10) {
					alert("contact should be 10 digit");
					return false;
				}
				return true;
			}
	</script>
</head>
<body>
	<div class="header">
		<h2>Register !</h2>
	</div>
	
	<form name="person1" method="post" action="doctorWel.php" onsubmit="return validateForm();">

		<div class="input-group">
			<label>FirstName<sup>*</sup></label>
			<input type="text" name="fname" placeholder="Required" onkeypress="return ValidateAlpha(event)" required/>
		</div>
		<div class="input-group">
			<label>MiddleName</label>
			<input type="text" name="mname" placeholder="Required" onkeypress="return ValidateAlpha2(event)" />
		</div>
		<div class="input-group">
			<label>SurName<sup>*</sup></label>
			<input type="text" name="lname" placeholder="Required" onkeypress="return ValidateAlpha(event)" required/>
		</div>
		<div class="input-group">
			<label>Date Of Birth<sup>*</sup></label>
			<input type="Date" name="dob" required/>
		</div>
		<div>
			<label>Gender<sup>*</sup></label><br>
			<select name="Gender">
 				<option value="Male"  >Male</option>
 				<option value="Female">Female</option>
				<option value="Other">Others</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password<sup>*</sup></label>
			<label><input type="password" name="pass" placeholder = "**************" required/></label>
		</div>
		<div class="input-group">
			<label>Contact<sup>*</sup></label>
			<input type="number" name="mobile" placeholder = "10 digits required" onblur = "return validatenum(this)" required/>
		</div>
		<div class="input-group">
			<label>Qualifications<sup>*</sup></label>
			<label><input type="text" name="qual" placeholder = "M.B.B.S , B.D.S" required/></label>
		</div>
		<div>
			<label>Department<sup>*</sup></label><br>
			<select name="department">
 				<option value="dentist">Dentist</option>
 				<option value="dermatologist">Dermatologist</option>
				<option value="ayurveda">Ayurveda</option>
				<option value="cardiologist">Cardiologist</option>
				<option value="gastroenterolo">Gastroenterolo</option>
				<option value="dietitian">Dietitian</option>
				<option value="urologist">Urologist</option>
 				<option value="pediatrician">Pediatrician</option>
				<option value="ent">Ear-Nose-Throat (ENT)</option>
				<option value="homeopath">Homeopath</option>
				<option value="gynecologist">Gynecologist</option>
				<option value="psychiatrist">Psychiatrist</option>
			</select>
		</div>
		<div class="input-group">
			<label>Email ID<sup>*</sup></label>
			<input type="email" name="email" placeholder = "Required" onblur="return validateEmail(this)" required/>
		</div>
		<div class="input-group">
			<label>Fee<sup>*</sup></label>
			<input type="number" name="fee" placeholder = "Reasonable Price" onblur="return validatenum(this)" required/>
		</div>
		<div class="input-group">
			<label>Hospital/Clinic Name<sup>*</sup></label>
			<input type="text" name="building" placeholder = "Required" required/>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register">Register</button>
		</div>
		<p>
			Already a member? <a href="doctorLogin.php">Log in</a>
		</p>
	</form>
	<br><br><br>
</body>
</html>
