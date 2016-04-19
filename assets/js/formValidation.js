//==========================   validation methods  =============================
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


//================================= login validations =================================
function loginValidation() {

    var nicValid = requiredValidation("loginForm","nic") && nicValidation("loginForm","nic");
    var passwordValid = requiredValidation("loginForm","password");

    if( !(nicValid && passwordValid) ){
        return false;
    }
}

function jsfunction(){

    document.getElementById("password").focus();
    document.getElementById("password").style.borderColor = "red";
    document.getElementById("password" + "Error").innerHTML = "password eka waradiy bn..";
    document.getElementById("password" + "Error").style.color = "red";
}