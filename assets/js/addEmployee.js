


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

    //alert('kalinga');
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
		