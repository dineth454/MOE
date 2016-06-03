/* global kalinga */

function validateVacanciesForm() {
    var errors = [];
  //  alert('kalinga');

    if (!validateDropDown("subject", "errorSubject")) {
        errors.push("errorSubject");
    }
    var x = document.getElementById("vacansies").value;
    if(!validateNumber(x)){
        errors.push("errorNumber");
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
        document.getElementById(errorLbl).innerHTML = "please select a value";
        document.getElementById(errorLbl).style.color = "red";

        return false;
    } else {
        document.getElementById(text).style.borderColor = "green";
        document.getElementById(errorLbl).innerHTML = "";
        return true;
    }
}

//method to validate number
function validateNumber(text) {

    if (text == "" || text == null) {
        document.getElementById("vacansies").focus();
        document.getElementById("vacansies").style.borderColor = "red";
        document.getElementById("errorVacancies").innerHTML = "required";
        document.getElementById("errorVacancies").style.color = "red";
        return false;
    } else if (isNaN(text) || text < 1) {
        //alert(text);
        document.getElementById("vacansies").focus();
        document.getElementById("vacansies").style.borderColor = "red";
        document.getElementById("errorVacancies").innerHTML = "invalid type";
        document.getElementById("errorVacancies").style.color = "red";
        return false;
    } else {
        document.getElementById("vacansies").style.borderColor = "green";
        document.getElementById("errorVacancies").innerHTML = "";
        return true;
    }
}
