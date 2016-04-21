function validateaddNewSubjectForm() {
    var errors = [];
  //  alert('kalinga');

    if (!validateName("subject", "errorSubject")) {
        errors.push("errorCurentSubject");
    }
   



    if (errors.length > 0) {
        return false;
    } else {
        return true;
    }
}


//method to validate name field is empty or not
function validateName(text, errorLbl) {
    if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
        document.getElementById(text).focus();
        document.getElementById(text).style.borderColor = "red";
        document.getElementById(errorLbl).innerHTML = "required";
        document.getElementById(errorLbl).style.color = "red";
        return false;
    } else {
        document.getElementById(text).style.borderColor = "green";
        document.getElementById(errorLbl).innerHTML = "";
        return true;
    }
}


