function basicDetailsValidation() {

    var isValid = true;

    if (document.getElementById('first_name').value.trim() == "") {
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

function addressDetailsValidation() {
    var isValid = true;

    if (document.getElementById('country_id').value.trim() == "") {
        isValid = false;
    }

    if (document.getElementById('province_id').value.trim() == "") {
        isValid = false;
    }

    if (document.getElementById('district_id').value.trim() == "") {
        isValid = false;
    }

    if (document.getElementById('municipality_id').value.trim() == "") {
        isValid = false;
    }

    if (document.getElementById('street').value.trim() == "") {
        isValid = false;
    }

    return isValid;
}
function educationDetailsValidation() {
    var isValid = true;

    var instituteNameInputs = document.querySelectorAll('[name^="institute_name[]"]');
    instituteNameInputs.forEach(function(input) {
        if (input.value.trim() == "") {
            isValid = false;
            return;
        }
    });

    var specializationInputs = document.querySelectorAll('[name^="specialization[]"]');
    specializationInputs.forEach(function(input) {
        if (input.value.trim() == "") {
            isValid = false;
            return;
        }
    });

    var graduationYearBSInputs = document.querySelectorAll('[name^="graduation_year_start_bs[]"]');
    graduationYearBSInputs.forEach(function(input) {
        if (input.value.trim() == "") {
            isValid = false;
            return;
        }
    });

    var graduationYearADInputs = document.querySelectorAll('[name^="graduation_year_start_ad[]"]');
    graduationYearADInputs.forEach(function(input) {
        if (input.value.trim() == "") {
            isValid = false;
            return;
        }
    });

    return isValid;
}


