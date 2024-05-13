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
                    alert('Error Fetching Department !!!');
                }
            });
        }
    });

    $('#doctorfetch').change(function () {
        var schedule_id = this.value;

        if (schedule_id) {
            $.ajax({
                url: "/fetchschedule" + "/" + schedule_id,
                method: 'get',
                dataType: 'json',
                success: function (response) {
                    var cardBody = $('.schedulefetch');
                    cardBody.empty();

                    var cardHtml = '<div class="card mb-3">';

                    $.each(response, function (index, schedule) {
                        cardHtml += '<div class="card-head">' + schedule.schedule_date + '</div>';
                        cardHtml += '<div class="card-body">';

                        var startTime = moment(schedule.start_time, 'HH:mm:ss');
                        var endTime = moment(schedule.end_time, 'HH:mm:ss');

                        while (startTime.isBefore(endTime)) {
                            var intervalEnd = startTime.clone().add(30, 'minutes');
                            var baseUrl = document.querySelector('meta[name="base-url"]').getAttribute('content');
                            var appointmentFormUrl = baseUrl + '/appointmentform';
                            appointmentFormUrl += '/' + schedule.id;
                            var intervalText = startTime.format('hh:mm A') + ' - ' + intervalEnd.format('hh:mm A');
                            cardHtml += '<h6 class="card-title"><a href="' + appointmentFormUrl + '" class="badge badge-primary schedule-slot">' + intervalText + '</a></h6>';
                            startTime.add(30, 'minutes');
                        }

                        cardHtml += '</div>';
                    });
                    cardHtml += '</div>';
                    cardBody.append(cardHtml);

                    $(document).on('click', '.schedule-slot', function (event) {
                        var selectedInterval = $(this).text();
                        sessionStorage.setItem('selected_interval', selectedInterval);

                        console.log("Selected Interval: ", selectedInterval);

                        var url = $(this).attr('href');
                        window.location.href = url;
                        event.preventDefault();
                    });
                },
                error: function () {
                    alert('Error Fetching Schedules !!!');
                }
            });
        }
    });
});

$(document).ready(function() {
    var selectedInterval = sessionStorage.getItem('selected_interval');
    // console.log(selectedInterval);
    if (selectedInterval) {
        $('#selected_interval_patient_form').val(selectedInterval);
    }
});

