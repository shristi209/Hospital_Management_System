function basicDetailsValidation() {
    var isValid = true;
    $("#error_first_name").hide();

    if (document.getElementById('first_name').value.trim() == "") {
        isValid = false;
        $("#error_first_name").show();
    }

    if (document.getElementById('middle_name').value.trim() == "") {
        isValid = false;
    }

    if (document.getElementById('last_name').value.trim() == "") {
        isValid = false;
    }

    if (document.getElementById('gender').value.trim() == "") {
        isValid = false;
    }

    if (document.getElementById('date_of_birth_BS').value.trim() == "") {
        isValid = false;
    }

    if (document.getElementById('date_of_birth_AD').value.trim() == "") {
        isValid = false;
    }

    if (document.getElementById('department_id').value.trim() == "") {
        isValid = false;
    }

    if (document.getElementById('licenceno').value.trim() == "") {
        isValid = false;
    }

    if (document.getElementById('phoneno').value.trim() == "") {
        isValid = false;
    }

    return isValid;
}
$("#nextPage1").click(function() {
    var isValidBasicDetails = basicDetailsValidation();
        // if(isValidBasicDetails==false){
        //     return alert("please fill all the necessary credentials");
        // }

    });


