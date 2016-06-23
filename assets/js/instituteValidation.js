//==================== ADD ZONAL OFFICE ==========================//

//method for onclick() in the form
function addZonalOfficeValidation() {
    var errors = [];

    if (!validateDropDown("provinceID", "errorProvince")) {
        errors.push("provinceID");
    }

    var zonalOfficeName = document.getElementById("zonalName").value;
    if (!validateZonalOfficeName(zonalOfficeName)) {
        errors.push("errorZonalOfficeName");
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


//method to validate zonal office Name
function validateZonalOfficeName(text) {
    if (text == "" || text == null) {
        document.getElementById("zonalName").focus();
        document.getElementById("zonalName").style.borderColor = "red";
        document.getElementById("errorZonalOfficeName").innerHTML = "Required";
        document.getElementById("errorZonalOfficeName").style.color = "red";
        return false; 
    } else {
        document.getElementById("zonalName").style.borderColor = "green";
        document.getElementById("errorZonalOfficeName").innerHTML = "";
        return true;
    }
}

