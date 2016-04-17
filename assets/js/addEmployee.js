//nic validation 
function nicValidation(form, inputName) {
    var nic = document.forms[form][inputName].value;
	var pattern = /^[0-9]{9}(V|v){1}/;

    if ((pattern.test(nic)) == false || nic.length < 10) {
        document.getElementById(inputName).focus();
        document.getElementById(inputName).style.borderColor = "red";
        document.getElementById(inputName + "Error").innerHTML = "invalid type";
        document.getElementById(inputName + "Error").style.color = "red";
        return false;
    }
    else {
        document.getElementById(inputName).style.borderColor = "green";
        document.getElementById(inputName + "Error").innerHTML = "";
        return true;
    }
}

//required field validation 
function requiredValidation(form,inputName) {
    var text = document.forms[form][inputName].value;

    if (text == null || text == "") {
        document.getElementById(inputName).focus();
        document.getElementById(inputName).style.borderColor = "red";
        document.getElementById(inputName + "Error").innerHTML = "required";
        document.getElementById(inputName + "Error").style.color = "red";
        return false;
    }
    else {
        document.getElementById(inputName).style.borderColor = "green";
        document.getElementById(inputName + "Error").innerHTML = "";
        return true;
    }
}

//login validation
function addEmployeeFormValidation() {
    var nic = document.forms["addEmployeeForm"]["nic"].value;
    //var password = document.forms["loginForm"]["password"].value;

    var nicValid = requiredValidation("addEmployeeForm","nic") && nicValidation("addEmployeeForm","nic");
    //var passwordValid = requiredValidation("loginForm","password");

    if( !(nicValid) ){
        return false;
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


function validationForm() {

    //alert('please validate Form');
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
		