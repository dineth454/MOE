function validatetranserForm() {
    
    
    var errors = [];

    /*if (!validateName("firstName", "errorFirstName")) {
     errors.push("errorFirstName");
     }*/
    // validate Nic 
    var nicNumber = document.getElementById("nic").value;
    if (!validateNicNumber(nicNumber)) {
        errors.push("errorNicNumber");
    }
    
    if (errors.length > 0) {
        
        return false;
    } else {
        return true;
        
    }
    
    }
    
    
//method to validate nic number
function validateNicNumber(text) {
    var pattern = /^[0-9]{9}(V|v){1}/;
    if (text == "" || text == null) {
        
        
        document.getElementById("nic").focus();
        document.getElementById("nic").style.borderColor = "red";
        document.getElementById("errorNicNumbertranser").innerHTML = "required";
        alert('1');
        document.getElementById("errorNicNumbertranser").style.color = "red";
        return false;
    } else if ((pattern.test(text)) == false || text.length < 10) {
        document.getElementById("nic").focus();
        document.getElementById("nic").style.borderColor = "red";
        document.getElementById("errorNicNumbertranser").innerHTML = "invalid type";
        document.getElementById("errorNicNumbertranser").style.color = "red";
        return false;
    } else {
        document.getElementById("nic").style.borderColor = "green";
        document.getElementById("errorNicNumbertranser").innerHTML = "";
        return true;
    }
}

