function changePassValidateForm() {
    var errors = [];

    var currentPass = document.getElementById("cPass").value;
    if (!validatePass(currentPass, "cPass", "errorCPass")) {
        errors.push("errorCPass");
    }

    var newPass = document.getElementById("nPass").value;
    if (!validatePass(newPass, "nPass", "errorNPass")) {
        errors.push("errorNPass");
    }

    var newPass = document.getElementById("cnPass").value;
    if (!validatePass(newPass, "cnPass", "errorCNPass")) {
        errors.push("errorCNPass");
    }

    if (errors.length > 0) {
        return false;
    } else {
        return true;
    }
}

    //method to validate EmploymentID
function validatePass(text, txtBox, errorMsg) {
    if (text == "" || text == null) {
        document.getElementById(txtBox).focus();
        document.getElementById(txtBox).style.borderColor = "red";
        document.getElementById(errorMsg).innerHTML = "Required";
        document.getElementById(errorMsg).style.color = "red";
        return false; 
    } else {
        document.getElementById(txtBox).style.borderColor = "green";
        document.getElementById(errorMsg).innerHTML = "";
        return true;
    }
}