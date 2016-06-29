<script type="text/javascript">
            function validateForm() {
                var errors = [];

                if (!validateSchoolName("School", "errorSchoolName")) {
                    errors.push("errorSchoolName");

                }
                if (!validateStudentNumber("students", "errorStudentNumber")) {
                    errors.push("errorStudentNumber");

                }
                if (!validateProvince("provinceID", "errorProvince")) {
                    errors.push("errorProvince");

                }
                if (!validateZonal("zonalID", "errorZonal")) {
                    errors.push("errorZonal");

                }
                if (!validateSchoolType("SchoolTypeSelect", "errorSchoolType")) {
                    errors.push("errorSchoolType");

                }
                if (!validateLatitude("latbox", "errorLat")) {
                    errors.push("errorLat");

                }
                if (!validateLongtitude("lngbox", "errorLng")) {
                    errors.push("errorLng");

                }
                if (errors.length > 0) {
                    return false;
                } else {
                    return true;
                }
            }

            /*___School name validation function___*/
            function validateSchoolName(text, errorLbl) {
                var pattern = /^[a-zA-Z_ /-,.]*$/;
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Please enter school name";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else if (!isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "School name can't be a number";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                }else if(!(pattern.test(document.getElementById(text).value))){
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Please don't enter both numbers and letters";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "green";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }

            /*____Number of students validation function_____*/
            function validateStudentNumber(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Please enter Number of students";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else if (!isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).style.borderColor = "green";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                } else {

                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Number of students can't be a letter";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                }
            }

            /*___Provine selection validation function___*/
            function validateProvince(text, errorLbl) {
                if (document.getElementById(text).value == "") {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "please select a Province";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "green";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }

            /*___Zonal selection validation function___*/
            function validateZonal(text, errorLbl) {
                if (document.getElementById(text).value == "") {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "please select a Zonal";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "green";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }

            /*___School Type selection validation function___*/
            function validateSchoolType(text, errorLbl) {
                if (document.getElementById(text).value == "") {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "please select a schoolType";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "green";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }


            /*___School destination latitude validation function___*/
            function validateLatitude(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Please Select the Latitude";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else if (isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Invalid type";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "green";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }

            /*___School destination longtitude validation function___*/
            function validateLongtitude(text, errorLbl) {
                if (document.getElementById(text).value == "" || document.getElementById(text).value == null) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Please Select the Longitude";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else if (isNaN(document.getElementById(text).value)) {
                    document.getElementById(text).focus();
                    document.getElementById(text).style.borderColor = "red";
                    document.getElementById(errorLbl).innerHTML = "Invalid type";
                    document.getElementById(errorLbl).style.color = "red";
                    return false;
                } else {
                    document.getElementById(text).style.borderColor = "green";
                    document.getElementById(errorLbl).innerHTML = "";
                    return true;
                }
            }
        </script>