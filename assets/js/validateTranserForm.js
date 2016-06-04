function validateTranserForm() {
    var errors = [];

    
        if (!validateDropDown("provinceID", "errorProvince")) {
            errors.push("errorProvince");
        }

    
        if (!validateDropDown("abc", "errorZonal")) {
            errors.push("errorZonal");
        }
    
        if (!validateDropDown("abcd", "errorSchool")) {
            errors.push("errorSchool");
        }
    



    if (errors.length > 0) {
        return false;
    } else {
        return true;
    }
}










