var addressCounter = 0;

document.getElementById('addressbtn').addEventListener('click', function () {

    if (addressCounter === 0) {

        addressCounter++;
        var addressTemplate = document.getElementById('addressAdd');
        var clonedAddress = addressTemplate.cloneNode(true);

        var countryId = clonedAddress.querySelector('#country_id');
        var newCountryId = countryId.id + [addressCounter];
        countryId.id = newCountryId;
        console.log(newCountryId);

        var provinceId = clonedAddress.querySelector('#province_id');
        var newProvinceId = provinceId.id + [addressCounter];
        provinceId.id = newProvinceId;
        console.log(newProvinceId);

        var districtId = clonedAddress.querySelector('#district_id');
        var newDistrictId = districtId.id + [addressCounter];
        districtId.id = newDistrictId;
        console.log(newDistrictId);

        var municipalityId = clonedAddress.querySelector('#municipality_id');
        var newMunicipalityId = municipalityId.id + [addressCounter];
        municipalityId.id = newMunicipalityId;
        console.log(newMunicipalityId);
        document.getElementById("addressContainer").appendChild(clonedAddress);
    }

    $('#' + newProvinceId).change(function () {
        var idProvince = this.value;
        console.log(idProvince);
        if (idProvince) {
            $.ajax({
                url: "/addfetchdistrict" + "/" + idProvince,
                method: 'get',
                dataType: 'json',
                success: function (response) {

                    console.log(response);
                    var district = $('#' + newDistrictId);
                    district.empty().append(
                        '<option value="">Select District</option>');
                    $.each(response, function (index, val) {
                        district.append('<option value=" ' + val.id + ' "> ' +
                            val.eng_district_name + ' </option>');
                    });
                },
                error: function () {
                    alert('Error Fetching District !!!');
                }
            });
        } else {
            $('#district').empty().append('<option value="">Select Your District</option>');
        }
    });
    $('#'+ newDistrictId).change(function () {
        var idDistrict = this.value;
        console.log(idDistrict);
        if (idDistrict) {
            $.ajax({
                url: "/addfetchmunicipality" + "/" + idDistrict,
                method: 'get',
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    var municipality = $('#' + newMunicipalityId);
                    municipality.empty().append('<option value="">Select Municipality</option>');
                    $.each(response, function (index, val) {
                        municipality.append('<option value=" ' + val.id + ' "> ' +
                            val.nep_municipality_name + ' </option>');

                    });
                },
                error: function () {
                    alert('Error Fetching Municipality !!!');
                }
            });
        }
    });

    
});








