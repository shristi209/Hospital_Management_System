function basicDetailsValidation() {
    var isValid = true;
    $("#error_first_name").hide();
    // $("#error_middle_name").hide();
    $("#error_last_name").hide();
    $("#error_gender").hide();
    $("#error_dob_bs").hide();
    $("#error_department_name").hide();
    $("#error_licenceno").hide();
    $("#error_phoneno").hide();

    if (document.getElementById('first_name').value.trim() == "") {
        isValid = false;
        $("#error_first_name").show();
    }

    // if (document.getElementById('middle_name').value.trim() == "") {
    //     isValid = false;
    //     $("#error_middle_name").show();
    // }

    if (document.getElementById('last_name').value.trim() == "") {
        isValid = false;
        $("#error_last_name").show();
    }

    if (document.getElementById('gender').value.trim() == "") {
        isValid = false;
        $("#error_gender").show();
    }

    if (document.getElementById('date_of_birth_BS').value.trim() == "") {
        isValid = false;
        $("#error_dob_bs").show();
    }

    if (document.getElementById('date_of_birth_AD').value.trim() == "") {
        isValid = false;
        $("#error_dob_ad").show();
    }

    if (document.getElementById('department_id').value.trim() == "") {
        isValid = false;
        $("#error_department_name").show();
    }

    if (document.getElementById('licenceno').value.trim() == "") {
        isValid = false;
        $("#error_licenceno").show();
    }

    if (document.getElementById('phoneno').value.trim() == "") {
        isValid = false;
        $("#error_phoneno").show();
    }

    return isValid;
}


