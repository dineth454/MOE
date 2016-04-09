//nic validation for login
function nicValidation() {
    var nic = document.forms["loginForm"]["nic"].value;
    var nic = document.forms["loginForm"]["nic"].value;
    
    if (nic == null || nic == "") {
        alert("Form must be filled out");
        return false;
    }
}