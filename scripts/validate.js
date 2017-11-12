function validateName(name) {

	var reg = /^[a-zA-Z ]*$/;

	if (!reg.test(name.value)) {

		alert("Please enter a valid name...");
		return false;
	}
	return true;
}

function validatePhone(phone) {

	var reg = /^[1-9][0-9]{9}$/;

	if (!reg.test(phone.value)) {

		alert("Please enter a valid phone number...");
		return false;
	}
	return true;
}

function validateEmail(email) {

	var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if (!reg.test(email.value)) {

		alert("Please enter a valid email...");
		return false;
	}
	return true;
}

function validateFormPersonSignup() {

	var first = document.forms["myForm"]["first"];
	var last = document.forms["myForm"]["last"];
	var phone = document.forms["myForm"]["phone"];
	var email = document.forms["myForm"]["email"];

	if (!validateName(first)) {

		return false;
	}

	if (!validateName(last)) {

		return false;
	}

	if (!validatePhone(phone)) {

		return false;
	}

	if (!validateEmail(email)) {

		return false;
	}

	return true;
}

function validateFormEmail() {

	var email = document.forms["myForm"]["email"];

	if (!validateEmail(email)) {

		return false;
	}

	return true;
}
