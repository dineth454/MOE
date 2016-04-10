//nic validation 
function nicValidation(form, inputName) {
    var nic = document.forms[form][inputName].value;
	var pattern = /^[0-9]{9}(V|v){1}/;

    if ((pattern.test(nic)) == false || nic.length < 10) {
        document.getElementById(inputName).focus();
        document.getElementById(inputName).style.borderColor = "red";
        document.getElementById(inputName + "Error").innerHTML = "invalid type";
        document.getElementById(inputName + "Error").style.color = "red";
        return false;
    }
    else {
        document.getElementById(inputName).style.borderColor = "green";
        document.getElementById(inputName + "Error").innerHTML = "";
        return true;
    }
}

//required field validation 
function requiredValidation(form,inputName) {
    var text = document.forms[form][inputName].value;

    if (text == null || text == "") {
        document.getElementById(inputName).focus();
        document.getElementById(inputName).style.borderColor = "red";
        document.getElementById(inputName + "Error").innerHTML = "required";
        document.getElementById(inputName + "Error").style.color = "red";
        return false;
    }
    else {
        document.getElementById(inputName).style.borderColor = "green";
        document.getElementById(inputName + "Error").innerHTML = "";
        return true;
    }
}

//login validation
function loginValidation() {
    //var nic = document.forms["loginForm"]["nic"].value;
    //var password = document.forms["loginForm"]["password"].value;

    var nicValid = requiredValidation("loginForm","nic") && nicValidation("loginForm","nic");
    var passwordValid = requiredValidation("loginForm","password");

    if( !(nicValid && passwordValid) ){
        return false;
    }
}