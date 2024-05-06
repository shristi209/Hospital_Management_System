function basicDetailsValidation() {
    var isValid = true;

    $('.basic-error').text('');


    if ($('#first_name').val().trim() == "") {
        $('#first_name_error').text('Please enter first name.');
        isValid = false;
    }

    if ($('#last_name').val().trim() == "") {
        $('#last_name_error').text('Please enter last name.');
        isValid = false;
    }

    if ($('#gender').val().trim() == "") {
        $('#gender_error').text('Please select gender.');
        isValid = false;
    }

    if ($('#date_of_birth_BS').val().trim() == "") {
        $('#date_of_birth_BS_error').text('Please enter date of birth (BS).');
        isValid = false;
    }

    if ($('#date_of_birth_AD').val().trim() == "") {
        $('#date_of_birth_AD_error').text('Please enter date of birth (AD).');
        isValid = false;
    }

    if ($('#department_id').val().trim() == "") {
        $('#department_id_error').text('Please select department name.');
        isValid = false;
    }

    if ($('#licenceno').val().trim() == "") {
        $('#licenceno_error').text('Please enter license number.');
        isValid = false;
    }

    if ($('#phoneno').val().trim() == "") {
        $('#phoneno_error').text('Please enter phone number.');
        isValid = false;
    }

    return isValid;
}

function addressDetailsValidation() {
    var isValid = true;

    document.querySelectorAll('.address-error').forEach(function (span) {
        span.textContent = '';
    });

    var countryId = document.getElementById('country_id').value.trim();
    if (countryId == "") {
        isValid = false;
        document.getElementById('country_id_error').textContent = 'Please select a country.';
    }

    var provinceId = document.getElementById('province_id').value.trim();
    if (provinceId == "") {
        isValid = false;
        document.getElementById('province_id_error').textContent = 'Please select a province.';
    }

    var districtId = document.getElementById('district_id').value.trim();
    if (districtId == "") {
        isValid = false;
        document.getElementById('district_id_error').textContent = 'Please select a district.';
    }

    var municipalityId = document.getElementById('municipality_id').value.trim();
    if (municipalityId == "") {
        isValid = false;
        document.getElementById('municipality_id_error').textContent = 'Please select a municipality.';
    }

    var street = document.getElementById('street').value.trim();
    if (street == "") {
        isValid = false;
        document.getElementById('street_error').textContent = 'Please enter a street name.';
    }

    return isValid;
}

function educationDetailsValidation() {
    var isValid = true;

    document.querySelectorAll('#page3 .text-danger').forEach(function (span) {
        span.textContent = '';
    });

    var educationLevel = document.getElementById('education_level').value.trim();
    if (educationLevel === "") {
        document.getElementById('education_level_error').textContent = "Please select an education level.";
        isValid = false;
    }

    var instituteNameInput = document.querySelector('[name^="institute_name[]"]');
    if (instituteNameInput.value.trim() === "") {
        document.getElementById("institute_name_error").textContent = "Please enter institute name.";
        isValid = false;
    }

    var specializationInput = document.querySelector('[name^="specialization[]"]');
    if (specializationInput.value.trim() === "") {
        document.getElementById("specialization_error").textContent = "Please enter specialization.";
        isValid = false;
    }

    var graduationYearBSInput = document.querySelector('[name^="graduation_year_start_bs[]"]');
    if (graduationYearBSInput.value.trim() === "") {
        document.getElementById("graduation_year_start_bs_error").textContent = "Please enter graduation year (BS).";
        isValid = false;
    }

    var graduationYearADInput = document.querySelector('[name^="graduation_year_start_ad[]"]');
    if (graduationYearADInput.value.trim() === "") {
        document.getElementById("graduation_year_start_ad_error").textContent = "Please enter graduation year (AD).";
        isValid = false;
    }

    return isValid;
}

function experienceDetailsValidation() {
    var isValid = true;

    document.querySelectorAll('#page4 .text-danger').forEach(function(span) {
        span.textContent = '';
    });

    var organizationNameInput = document.querySelector('[name="organization_name[]"]');
    if (organizationNameInput.value.trim() === "") {
        document.getElementById("organization_name_error").textContent = "Please enter organization name.";
        isValid = false;
    }

    var orgStartBSInput = document.querySelector('[name="org_start_bs[]"]');
    if (orgStartBSInput.value.trim() === "") {
        document.getElementById("org_start_bs_error").textContent = "Please enter start date (BS).";
        isValid = false;
    }

    var orgStartADInput = document.querySelector('[name="org_start_ad[]"]');
    if (orgStartADInput.value.trim() === "") {
        document.getElementById("org_start_ad_error").textContent = "Please enter start date (AD).";
        isValid = false;
    }

    var orgEndBSInput = document.querySelector('[name="org_end_bs[]"]');
    if (orgEndBSInput.value.trim() === "") {
        document.getElementById("org_end_bs_error").textContent = "Please enter end date (BS).";
        isValid = false;
    }

    var orgEndADInput = document.querySelector('[name="org_end_ad[]"]');
    if (orgEndADInput.value.trim() === "") {
        document.getElementById("org_end_ad_error").textContent = "Please enter end date (AD).";
        isValid = false;
    }

    return isValid;
}
