//======================== validation for add new subject =======================//
function validateaddNewSubjectForm() {
    var errors = [];

    var subCode = document.getElementById("subcode").value;
    if (!validatesubCode(subCode)) {
        errors.push("errorsubcode");
    }

    var subName = document.getElementById("subname").value;
    if (!validatesubName(subName)) {
        errors.push("errorsubname");
    }

   
    if (errors.length > 0) {
        return false;
    } else {
        return true;
    }
}


//method to validate subject Code
function validatesubCode(text) {
    var pattern = /^[a-zA-Z0-9]*$/;
    if (text == "" || text == null) {
        document.getElementById("subcode").focus();
        document.getElementById("subcode").style.borderColor = "red";
        document.getElementById("errorsubcode").innerHTML = "Required";
        document.getElementById("errorsubcode").style.color = "red";
        return false; 
    } else if (!(pattern.test(text))) {
        document.getElementById("subcode").focus();
        document.getElementById("subcode").style.borderColor = "red";
        document.getElementById("errorsubcode").innerHTML = "Please enter only numbers and letters here";
        document.getElementById("errorsubcode").style.color = "red";
        return false;
    } else {
        document.getElementById("subcode").style.borderColor = "green";
        document.getElementById("errorsubcode").innerHTML = "";
        return true;
    }
}

//method to validate subject Name
function validatesubName(text) {
    var pattern = /^[a-zA-Z0-9 ]*$/;
    if (text == "" || text == null) {
        document.getElementById("subname").focus();
        document.getElementById("subname").style.borderColor = "red";
        document.getElementById("errorsubname").innerHTML = "Required";
        document.getElementById("errorsubname").style.color = "red";
        return false; 
    } else if (!(pattern.test(text))) {
        document.getElementById("subname").focus();
        document.getElementById("subname").style.borderColor = "red";
        document.getElementById("errorsubname").innerHTML = "You are not allowed to enter special characters here";
        document.getElementById("errorsubname").style.color = "red";
        return false;
    } else {
        document.getElementById("subname").style.borderColor = "green";
        document.getElementById("errorsubname").innerHTML = "";
        return true;
    }
}


//======================== validation for update subject front =======================//

function validateUpdateSubjectFront() {
    var errors = [];

    if (!validateDropDown("subcode", "errorsubcode")) {
        errors.push("errorsubcode");
    }

    if (errors.length > 0) {
        return false;
    } else {
        return true;
    }
}

//method to validate a dropdown is selected or not
function validateDropDown(text, errorLbl) {
    if (document.getElementById(text).value == "") {
        document.getElementById(text).focus();
        document.getElementById(text).style.borderColor = "red";
        document.getElementById(errorLbl).innerHTML = "Required to select";
        document.getElementById(errorLbl).style.color = "red";

        return false;
    } else {
        document.getElementById(text).style.borderColor = "green";
        document.getElementById(errorLbl).innerHTML = "";
        return true;
    }
}

