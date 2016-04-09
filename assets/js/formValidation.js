//nic validation for login
function nicValidation() {
	var pattern = /^[0-9]{9}(V|v){1}/;
    //var nic = document.getElementById("nic").;
    var nic = document.forms["loginForm"]["nic"].value;

    if (nic == null || nic == "") {
        document.getElementById("nic").focus();
        document.getElementById("nic").style.borderColor = "red";
        //document.getElementById("errorNicNumber").innerHTML = "required";
                    //document.getElementById("errorNicNumber").style.color = "red";
        return false;
    }
    else if ((pattern.test(nic)) == false || nic.length < 10) {
        document.getElementById("nic").focus();
        document.getElementById("nic").style.borderColor = "red";
        //document.getElementById("errorNicNumber").innerHTML = "invalid type";
        //document.getElementById("errorNicNumber").style.color = "red";
        return false;
    }
}