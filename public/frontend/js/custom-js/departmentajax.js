$(document).ready(function () {
    $('#department_id').change(function () {
        var dept_id = this.value;
        console.log(dept_id);

        if (dept_id) {
            $.ajax({
                url: "/fetchdoctor" + "/" + dept_id,
                method: 'get',
                dataType: 'json',
                success: function (response) {
                    var doctorContainer = $('#doctorfetch');
                    doctorContainer.empty().append('<option value="">Select Doctors</option>');;

                    $.each(response, function (index, val) {
                        doctorContainer.append('<option value=" ' + val.id + ' "> ' +
                            val.first_name + ' </option>');
                    });
                },
                error: function () {
                    alert('Error Fetching Doctor !!!');
                }
            });
        }
    });

    $('#doctorfetch').change(function () {
        var doctor_id = this.value;
        // console.log(doctor_id);

        if (doctor_id) {
            $.ajax({
                url: "/fetchschedule" + "/" + doctor_id,
                method: 'get',
                dataType: 'json',
                success: function (response) {
                    // console.log(response);
                    var cardBody = $('.schedulefetch');
                    cardBody.empty();

                    var cardHtml = '<div class="row card my-3 ">'+
                    '<h4 class="card-head text-center m-4">'+ 'Choose Appropriate Schedule'+'</h4>';

                    $.each(response, function (_, schedule) {
                        // console.log(schedule);
                        cardHtml += '<div class="card-body d-flex">';

                        var startTime = moment(schedule.start_time, 'HH:mm:ss');
                        var endTime = moment(schedule.end_time, 'HH:mm:ss');

                            var intervalText = startTime.format('hh:mm A') + ' - ' + endTime.format('hh:mm A');

                                var baseUrl = document.querySelector('meta[name="base-url"]').getAttribute('content');
                                var appointmentFormUrl = baseUrl + '/appointmentform';
                                appointmentFormUrl += '/' + schedule.id;
                                cardHtml += '<h6 class="col-4 card-title"><a href="' + appointmentFormUrl + '" class="badge badge-primary schedule-slot ">' +schedule.day + ', '+ intervalText + '</a></h6>';

                        cardHtml += '</div>';
                    });


                    cardBody.append(cardHtml);

                    $(document).on('click', '.schedule-slot', function (event) {
                        var selectedInterval = $(this).text();
                        console.log(selectedInterval);
                        sessionStorage.setItem('selected_interval', selectedInterval);
                    });
                },

                error: function () {
                    alert('Error Fetching Schedules !!!');
                }
            });
        }
    });

    var selectedInterval = sessionStorage.getItem('selected_interval');
    if (selectedInterval) {
        $('#selected_interval_patient_form').val(selectedInterval);
    }
});

