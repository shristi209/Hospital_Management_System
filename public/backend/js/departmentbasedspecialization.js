$(document).ready(function () {
    $('#department_name').change(function () {
        var iddept = this.value;
        console.log(iddept);

        if (iddept) {
            $.ajax({
                url: "/fetchspecialization" + "/" + iddept,
                method: 'get',
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    var district = $('#specialization');
                    district.empty().append(
                        '<option value="">Select Specialization</option>');

                    $.each(response.specializations, function (index, specialization) {
                        district.append('<option value="' + specialization + '">' + specialization + '</option>');

                    });
                },
                error: function () {
                    alert('Error Fetching Specializations !!!');
                }
            });
        }
    });
});
