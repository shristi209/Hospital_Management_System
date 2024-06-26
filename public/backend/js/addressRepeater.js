var addressCounter = 0;

document.getElementById('addressbtn').addEventListener('click', function () {
    if (addressCounter === 0) {
        addressCounter++;

//hiding + button when clicked
        $("#addressbtn").hide();

//created and cloned title and button for the cloned field
        var addressDiv = document.createElement("div");
        addressDiv.className = "card-header d-flex mt-3 justify-content-between";

        var addressTitle = document.createElement("h5");
        addressTitle.textContent = "Temporary Address";
        addressDiv.appendChild(addressTitle);

        var add_removeBtn = document.createElement("button");
        add_removeBtn.innerHTML = '<i class="fa-solid fa-trash"></i>';
        add_removeBtn.setAttribute("type", "button");
        add_removeBtn.setAttribute("class", "btn btn-sm btn-danger ml-auto exp-remove-btn");

        addressDiv.appendChild(add_removeBtn);
        document.getElementById("addressContainer").appendChild(addressDiv);

//parent div clonning process
        var addressTemplate = document.getElementById('addressAdd');
        var clonedAddress = addressTemplate.cloneNode(true);

//removing previous parent's header
        var permanentAddressHeader = clonedAddress.querySelector('.rem');
        permanentAddressHeader.parentNode.removeChild(permanentAddressHeader);

//generating unique id for all the cloned field
        var countryId = clonedAddress.querySelector('#country_id');
        var newCountryId = 'temp_'+ countryId.id ;
        countryId.id = newCountryId;
        console.log(newCountryId);

        var provinceId = clonedAddress.querySelector('#province_id');
        var newProvinceId = 'temp_' + provinceId.id;
        provinceId.id = newProvinceId;
        console.log(newProvinceId);

        var districtId = clonedAddress.querySelector('#district_id');
        var newDistrictId = 'temp_' + districtId.id;
        districtId.id = newDistrictId;
        console.log(newDistrictId);

        var municipalityId = clonedAddress.querySelector('#municipality_id');
        var newMunicipalityId = 'temp_' +  municipalityId.id;
        municipalityId.id = newMunicipalityId;
        console.log(newMunicipalityId);

        // naming all as temp_
        clonedAddress.querySelectorAll('[id^="temp_"]').forEach(function(element) {
            var currentId = element.id;
            var newName = 'temp_' + currentId.split('_')[1] + '_id';
            element.setAttribute('name', newName);


            var addressContainer=document.getElementById("addressContainer")
            add_removeBtn.onclick = function(){
                addressCounter--;
                // const mainDiv = document.getElementById('educationAdd');
                addressContainer.removeChild(addressDiv);
                addressContainer.removeChild(clonedAddress);
                $("#addressbtn").show();
            }
        });

        var street = clonedAddress.querySelector('#street');
        street.id = 'temp_street';
        street.setAttribute('name', 'temp_street');

//cloned after all unique id and name
        document.getElementById("addressContainer").appendChild(clonedAddress);

//empty value of the previousfield
        var clonedInputs = clonedAddress.querySelectorAll('input, select, textarea');
        clonedInputs.forEach(function(input) {
            input.value = '';
        });
    }
//for all unique id
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








