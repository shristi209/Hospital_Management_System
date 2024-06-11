$(document).ready(function () {
    $('#province_id').change(function () {
        var idProvince = this.value;
        console.log(idProvince);

        if (idProvince) {
            $.ajax({
                url: "/fetchdistrict" + "/" + idProvince,
                method: 'get',
                dataType: 'json',
                success: function (response) {
                    var district = $('#district_id');
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
});

$(document).ready(function () {
    $('#district_id').change(function () {
        var idDistrict = this.value;
        console.log(idDistrict);
        if (idDistrict) {
            $.ajax({
                url: "/fetchmunicipality" + "/" + idDistrict,
                method: 'get',
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    var municipality = $('#municipality_id');
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
