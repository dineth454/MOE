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
    // validate designation
    if (!validateDropDown("designation", "errorDesignation")) {
        errors.push("errorDesignation");
    }

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
    var mobileNumber = document.getElementById("mobileNm").value;
    if (!validateMobileNumber(mobileNumber)) {
        errors.push("errormobileNumbber");
    }



    if (errors.length > 0) {
        return false;
    }
    else {
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
    }
    else {
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
        document.getElementById("errornicNum").innerHTML = "required";
        document.getElementById("errornicNum").style.color = "red";
        return false;
    }
    else if ((pattern.test(text)) == false || text.length < 10) {
        document.getElementById("nic").focus();
        document.getElementById("nic").style.borderColor = "red";
        document.getElementById("errornicNum").innerHTML = "invalid type";
        document.getElementById("errornicNum").style.color = "red";
        return false;
    }
    else {
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
        document.getElementById(errorLbl).innerHTML = "please select a value";
        document.getElementById(errorLbl).style.color = "red";

        return false;
    }
    else {
        document.getElementById(text).style.borderColor = "green";
        document.getElementById(errorLbl).innerHTML = "";
        return true;
    }
}

            //method to validate mobile number
            function validateMobileNumber(text) {
                var pattern = /^([+0-9]{1,3})?([0-9]{10,11})$/i;
                if (text == null || text == "") {
                    document.getElementById("mobileNm").focus();
                    document.getElementById("mobileNm").style.borderColor = "red";
                    document.getElementById("errormobileNumbber").innerHTML = "required";
                    document.getElementById("errormobileNumbber").style.color = "red";
                    return false;
                }
                else if ((pattern.test(text)) == false || text.length < 10) {
                    document.getElementById("mobileNm").focus();
                    document.getElementById("mobileNm").style.borderColor = "red";
                    document.getElementById("errormobileNumbber").innerHTML = "invalid type";
                    document.getElementById("errormobileNumbber").style.color = "red";
                    return false;
                }
                else {
                    document.getElementById("mobileNm").style.borderColor = "green";
                    document.getElementById("errormobileNumbber").innerHTML = "";
                    return true;
                }
            }






$(document).ready(function () {

    /*document.getElementById("provinceHiddenForm").style.visibility = 'hidden';
     document.getElementById("zonalOfficeHidden").style.visibility = 'hidden';
     document.getElementById("schoolHidden").style.visibility = 'hidden';
     document.getElementById('subjectHidden').style.visibility = 'hidden';*/
});

function selectionForm(val) {
    if (val == "5") {
        /*document.getElementById('schoolHidden').style.visibility = 'visible';
         
         document.getElementById('zonalOfficeHidden').style.visibility = 'visible';
         document.getElementById('provinceHiddenForm').style.visibility = 'visible';
         document.getElementById('subjectHidden').style.visibility = 'visible';*/


        //alert('kalinaaaaaaaa');
        $('#provinceIDDiv').slideDown("slow");
        $('#zonalOfficeDiv').slideDown("slow");
        $('#schoolIdDiv').slideDown("slow");
        $('#subjectHiddenDiv').slideDown("slow");


    }
    else if (val == "4") {
        /*document.getElementById('schoolHidden').style.visibility = 'visible';
         document.getElementById('zonalOfficeHidden').style.visibility = 'visible';
         document.getElementById('provinceHiddenForm').style.visibility = 'visible';
         document.getElementById('subjectHidden').style.visibility = 'hidden';*/
        $('#provinceIDDiv').slideDown("slow");
        $('#zonalOfficeDiv').slideDown("slow");
        $('#schoolIdDiv').slideDown("slow");
        $('#subjectHiddenDiv').slideUp("slow");

    }
    else if (val == "3") {
        $('#provinceIDDiv').slideDown("slow");
        $('#zonalOfficeDiv').slideDown("slow");
        $('#schoolIdDiv').slideUp("slow");
        $('#subjectHiddenDiv').slideUp("slow");
        /* document.getElementById('zonalOfficeHidden').style.visibility = 'visible';
         document.getElementById('schoolHidden').style.visibility = 'hidden';
         document.getElementById('provinceHiddenForm').style.visibility = 'visible';
         document.getElementById('subjectHidden').style.visibility = 'hidden';*/
    } else if (val == "2") {
        $('#provinceIDDiv').slideDown("slow");
        $('#zonalOfficeDiv').slideUp("slow");
        $('#schoolIdDiv').slideUp("slow");
        $('#subjectHiddenDiv').slideUp("slow");

        /* document.getElementById('provinceHiddenForm').style.visibility = 'visible';
         document.getElementById('schoolHidden').style.visibility = 'hidden';
         document.getElementById('zonalOfficeHidden').style.visibility = 'hidden';
         document.getElementById('subjectHidden').style.visibility = 'hidden';*/
    } else if (val == "1") {
        $('#provinceIDDiv').slideUp("slow");
        $('#zonalOfficeDiv').slideUp("slow");
        $('#schoolIdDiv').slideUp("slow");
        $('#subjectHiddenDiv').slideUp("slow");

        /* document.getElementById('schoolHidden').style.visibility = 'hidden';
         document.getElementById('zonalOfficeHidden').style.visibility = 'hidden';
         document.getElementById('provinceHiddenForm').style.visibility = 'hidden';
         document.getElementById('subjectHidden').style.visibility = 'hidden';*/
    } else {

        alert('select a value');
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
		