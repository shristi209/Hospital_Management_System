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
        console.log(schedule_id);

        if (schedule_id) {
            $.ajax({
                url: "/fetchschedule" + "/" + schedule_id,
                method: 'get',
                dataType: 'json',
                success: function (response) {
                    var cardBody = $('.schedulefetch');
                    cardBody.empty();

                    // Construct the card HTML structure
                    var cardHtml = '<div class="card mb-3">';

                    // Loop through each schedule and construct the card content
                    $.each(response, function (index, schedule) {
                        cardHtml += '<div class="card-head">' + schedule.schedule_date + '</div>';
                        cardHtml += '<div class="card-body">';

                        var startTime = moment(schedule.start_time, 'HH:mm:ss');
                        var endTime = moment(schedule.end_time, 'HH:mm:ss');

                        while (startTime.isBefore(endTime)) {
                            var intervalEnd = startTime.clone().add(30, 'minutes');
                            cardHtml += '<h6 class="card-title"> <a href="user\appointment\form" class="badge badge-primary">' + startTime.format('hh:mm A') + ' - ' + intervalEnd.format('hh:mm A') + '</a></h6>';
                            startTime.add(30, 'minutes');
                        }

                        cardHtml += '</div>';
                    });

                    // Close the card HTML structure
                    cardHtml += '</div>';

                    // Append the constructed card HTML to the card body
                    cardBody.append(cardHtml);
                },
                error: function () {
                    alert('Error Fetching Schedules !!!');
                }
            });
        }
    });
});
