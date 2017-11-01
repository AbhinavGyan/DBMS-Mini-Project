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
