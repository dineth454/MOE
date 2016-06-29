function validateSubjectwiseReportForm() {
    var errors = [];
 
    if (!validateDropDown("designation", "errorDesignation")) {
        errors.push("errorDesignation");
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


