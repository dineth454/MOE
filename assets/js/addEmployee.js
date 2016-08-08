function validateForm() {
    var errors = [];

    /*if (!validateName("firstName", "errorFirstName")) {
     errors.push("errorFirstName");
     }*/
    // validate Nic 
    var nicNumber = document.getElementById("nic").value;
    if (!validateNicNumber(nicNumber)) {
        errors.push("errorNicNumber");
    }
    //validate Roletype
    if (!validateDropDown("select_role", "errorRole")) {
        errors.push("errorRole");
    }

    if (!validateDropDown("designation", "errorDesignation")) {
        errors.push("errorDesignation");
    }
    var validateDropdownID = document.getElementById("designation").value;

    if (validateDropdownID == 1) {
        // alert(validateDropdownID);
    } else if (validateDropdownID == 2) {

        if (!validateDropDown("provinceID", "errorProvince")) {
            errors.push("errorProvince");
        }

    } else if (validateDropdownID == 3) {
        if (!validateDropDown("provinceID", "errorProvince")) {
            errors.push("errorProvince");
        }
        if (!validateDropDown("abc", "errorZonal")) {
            errors.push("errorZonal");
        }
    } else if (validateDropdownID == 4) {
        if (!validateDropDown("provinceID", "errorProvince")) {
            errors.push("errorProvince");
        }
        if (!validateDropDown("abc", "errorZonal")) {
            errors.push("errorZonal");
        }
        if (!validateDropDown("abcd", "errorSchool")) {
            errors.push("errorSchool");
        }
    } else {

        if (!validateDropDown("provinceID", "errorProvince")) {
            errors.push("errorProvince");
        }
        if (!validateDropDown("abc", "errorZonal")) {
            errors.push("errorZonal");
        }
        if (!validateDropDown("abcd", "errorSchool")) {
            errors.push("errorSchool");
        }

        if (!validateDropDown("subject", "errorSubject")) {
            errors.push("errorSubject");
        }
    }

    var nameWithInit = document.getElementById("name").value;
    if (!validatenameWithInit(nameWithInit)) {
        errors.push("errorFirstName");
    }

    var fullName = document.getElementById("fname").value;
    if (!validatefullName(fullName)) {
        errors.push("errorLastName");
    }

    var employmentID = document.getElementById("eId").value;
    if (!validateemploymentID(employmentID)) {
        errors.push("errorEmployID");
    }

    var address = document.getElementById("address").value;
    if (!validateaddress(address)) {
        errors.push("errorAddress");
    }

    if (!validateDropDown("gender", "errorGender")) {
        errors.push("errorGender");
    }

    if (!validateDropDown("marrrige", "errorMarriage")) {
        errors.push("errorMarriage");
    }

    var mobileNumber = document.getElementById("mobileNm").value;
    if (!validateMobileNumber(mobileNumber)) {
        errors.push("errormobileNumbber");
    }

    var email = document.getElementById("email").value;
    if (!validateEmail(email)) {
        errors.push("errorEmail");
    }



    if (errors.length > 0) {
        return false;
    } else {
        return true;
    }
}

//Update Employee Front Validation
function validateEmpUpdateFront() {
    var errors = [];

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

//Update Employee Form Validation
function validateEmpUpdateForm() {
    var errors = [];

    //validate Roletype
    if (!validateDropDown("select_role", "errorRole")) {
        errors.push("errorRole");
    }

    var nameWithInit = document.getElementById("name").value;
    if (!validatenameWithInit(nameWithInit)) {
        errors.push("errorFirstName");
    }

    var fullName = document.getElementById("fname").value;
    if (!validatefullName(fullName)) {
        errors.push("errorLastName");
    }

    var employmentID = document.getElementById("eId").value;
    if (!validateemploymentID(employmentID)) {
        errors.push("errorEmployID");
    }

    if (!validateDropDown("gender", "errorGender")) {
        errors.push("errorGender");
    }

    if (!validateDropDown("marrrige", "errorMarriage")) {
        errors.push("errorMarriage");
    }

    var address = document.getElementById("address").value;
    if (!validateaddress(address)) {
        errors.push("errorAddress");
    }

    var mobileNumber = document.getElementById("mobileNm").value;
    if (!validateMobileNumber(mobileNumber)) {
        errors.push("errormobileNumbber");
    }

    var email = document.getElementById("email").value;
    if (!validateEmail(email)) {
        errors.push("errorEmail");
    }

    if (errors.length > 0) {
        return false;
    } else {
        return true;
    }
}

//method to validate nameWithInitials
function validatenameWithInit(text) {
    var pattern = /^[a-zA-Z_ ]*$/;
    if (text == "" || text == null) {
        document.getElementById("name").focus();
        document.getElementById("name").style.borderColor = "red";
        document.getElementById("errorFirstName").innerHTML = "Required";
        document.getElementById("errorFirstName").style.color = "red";
        return false;
    } else if (!(pattern.test(text))) {
        document.getElementById("name").focus();
        document.getElementById("name").style.borderColor = "red";
        document.getElementById("errorFirstName").innerHTML = "You can't enter numbers here";
        document.getElementById("errorFirstName").style.color = "red";
        return false;
    } else {
        document.getElementById("name").style.borderColor = "green";
        document.getElementById("errorFirstName").innerHTML = "";
        return true;
    }
}

//method to validate fullName
function validatefullName(text) {
    var pattern = /^[a-zA-Z_ ]*$/;
    if (text == "" || text == null) {
        document.getElementById("fname").focus();
        document.getElementById("fname").style.borderColor = "red";
        document.getElementById("errorLastName").innerHTML = "Required";
        document.getElementById("errorLastName").style.color = "red";
        return false;
    } else if (!(pattern.test(text))) {
        document.getElementById("fname").focus();
        document.getElementById("fname").style.borderColor = "red";
        document.getElementById("errorLastName").innerHTML = "You can't enter numbers here";
        document.getElementById("errorLastName").style.color = "red";
        return false;
    } else {
        document.getElementById("fname").style.borderColor = "green";
        document.getElementById("errorLastName").innerHTML = "";
        return true;
    }
}

//method to validate EmploymentID
function validateemploymentID(text) {
    if (text == "" || text == null) {
        document.getElementById("eId").focus();
        document.getElementById("eId").style.borderColor = "red";
        document.getElementById("errorEmployID").innerHTML = "Required";
        document.getElementById("errorEmployID").style.color = "red";
        return false;
    } else {
        document.getElementById("eId").style.borderColor = "green";
        document.getElementById("errorEmployID").innerHTML = "";
        return true;
    }
}

//method to validate Address
function validateaddress(text) {
    if (text == "" || text == null) {
        document.getElementById("address").focus();
        document.getElementById("address").style.borderColor = "red";
        document.getElementById("errorAddress").innerHTML = "Required";
        document.getElementById("errorAddress").style.color = "red";
        return false;
    } else {
        document.getElementById("address").style.borderColor = "green";
        document.getElementById("errorAddress").innerHTML = "";
        return true;
    }
}

//method to validate name field is empty or not
function validateName(text, errorLbl) {
    if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
        document.getElementById(text).focus();
        document.getElementById(text).style.borderColor = "red";
        document.getElementById(errorLbl).innerHTML = "Required";
        document.getElementById(errorLbl).style.color = "red";
        return false;
    } else {
        document.getElementById(text).style.borderColor = "green";
        document.getElementById(errorLbl).innerHTML = "";
        return true;
    }
}

//method to validate nic number
function validateNicNumber(text) {
    var pattern = /^[0-9]{9}(V|v){1}/;
    if (text == "" || text == null) {
        document.getElementById("nic").focus();
        document.getElementById("nic").style.borderColor = "red";
        document.getElementById("errornicNum").innerHTML = "Required";
        document.getElementById("errornicNum").style.color = "red";
        return false;
    } else if ((pattern.test(text)) == false || text.length < 10) {
        document.getElementById("nic").focus();
        document.getElementById("nic").style.borderColor = "red";
        document.getElementById("errornicNum").innerHTML = "Please enter a valid NIC number";
        document.getElementById("errornicNum").style.color = "red";
        return false;
    } else {
        document.getElementById("nic").style.borderColor = "green";
        document.getElementById("errornicNum").innerHTML = "";
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

//method to validate mobile number
function validateMobileNumber(text) {
    var pattern = /^\d{10}$/
    if (text == null || text == "") {
        document.getElementById("mobileNm").focus();
        document.getElementById("mobileNm").style.borderColor = "red";
        document.getElementById("errormobileNumb").innerHTML = "Required";
        document.getElementById("errormobileNumb").style.color = "red";
        return false;
    } else if (!(pattern.test(text))) {
        document.getElementById("mobileNm").focus();
        document.getElementById("mobileNm").style.borderColor = "red";
        document.getElementById("errormobileNumb").innerHTML = "Please enter a valid mobile number";
        document.getElementById("errormobileNumb").style.color = "red";
        return false;
    } else {
        document.getElementById("mobileNm").style.borderColor = "green";
        document.getElementById("errormobileNumb").innerHTML = "";
        return true;
    }
}

//method to validate email address
function validateEmail(text) {
    var pattern = /^[a-z0-9._-]+@[a-z]+.[a-z.]{2,5}$/i;
    if (text == "" || text == null) {
        document.getElementById("email").focus();
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("errorEmail").innerHTML = "Required";
        document.getElementById("errorEmail").style.color = "red";
        return false;
    } else if ((pattern.test(text)) == false) {
        document.getElementById("email").focus();
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("errorEmail").innerHTML = "Please enter a valid email address";
        document.getElementById("errorEmail").style.color = "red";
        return false;
    } else {
        document.getElementById("email").style.borderColor = "green";
        document.getElementById("errorEmail").innerHTML = "";
        return true;
    }
}






//$(document).ready(function () {

/*document.getElementById("provinceHiddenForm").style.visibility = 'hidden';
 document.getElementById("zonalOfficeHidden").style.visibility = 'hidden';
 document.getElementById("schoolHidden").style.visibility = 'hidden';
 document.getElementById('subjectHidden').style.visibility = 'hidden';*/
//});

function selectionForm(val) {
    if (val == "5") {

        $('#provinceIDDiv').slideDown("slow");
        $('#zonalOfficeDiv').slideDown("slow");
        $('#schoolIdDiv').slideDown("slow");
        $('#subjectHiddenDiv').slideDown("slow");


    } else if (val == "4") {

        $('#provinceIDDiv').slideDown("slow");
        $('#zonalOfficeDiv').slideDown("slow");
        $('#schoolIdDiv').slideDown("slow");
        $('#subjectHiddenDiv').slideUp("slow");

    } else if (val == "3") {
        $('#provinceIDDiv').slideDown("slow");
        $('#zonalOfficeDiv').slideDown("slow");
        $('#schoolIdDiv').slideUp("slow");
        $('#subjectHiddenDiv').slideUp("slow");

    } else if (val == "2") {
        $('#provinceIDDiv').slideDown("slow");
        $('#zonalOfficeDiv').slideUp("slow");
        $('#schoolIdDiv').slideUp("slow");
        $('#subjectHiddenDiv').slideUp("slow");

    } else if (val == "1") {
        $('#provinceIDDiv').slideUp("slow");
        $('#zonalOfficeDiv').slideUp("slow");
        $('#schoolIdDiv').slideUp("slow");
        $('#subjectHiddenDiv').slideUp("slow");

    } else {

        alert('Required to select');
    }
}





function showUser(str) {
    if (str == "") {
        document.getElementById("abc").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("abc").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "loadZonalOffices.php?q=" + str, true);
    xmlhttp.send();
}

function loadSchool(str) {
    //alert('dfdgw');
    //alert(str);
    if (str == "") {
        document.getElementById("abcd").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("abcd").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "loadSchools.php?q=" + str, true);
    xmlhttp.send();

}

function myFunction() {
    var x = document.getElementById("select_role").value;

    //select Ministry Officer Role
    if (x == 2) {
        //$("#designation").val("1");
        $('#designationDiv').slideDown("slow");
        $("#designation option[value='2']").hide();
        $("#designation option[value='3']").hide();
        $("#designation option[value='4']").hide();
        $("#designation option[value='5']").hide();
    } else if (x == 3) {
        $('#designationDiv').slideDown("slow");
        $("#designation option[value='1']").hide();
        $("#designation option[value='4']").hide();
        $("#designation option[value='5']").hide();

    } else if (x == 4) {
        $('#designationDiv').slideDown("slow");
        $("#designation option[value='1']").hide();
        $("#designation option[value='2']").hide();
        $("#designation option[value='3']").hide();
        $("#designation option[value='5']").hide();

    } else if (x == 5) {
        $('#designationDiv').slideDown("slow");
        $("#designation option[value='1']").hide();
        $("#designation option[value='2']").hide();
        $("#designation option[value='3']").hide();
        $("#designation option[value='5']").hide();

    } else if(x == 6){
        $('#designationDiv').slideDown("slow");
        $("#designation option[value='1']").hide();
        $("#designation option[value='2']").hide();
        $("#designation option[value='3']").hide();
        $("#designation option[value='4']").hide();
    }else{
        $("#designation option[value='1']").hide();
        $("#designation option[value='2']").hide();
        $("#designation option[value='3']").hide();
        $("#designation option[value='4']").hide();
        $("#designation option[value='5']").hide();
    }
}


		