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
        var schedule_id = this.value;

        if (schedule_id) {
            $.ajax({
                url: "/fetchschedule" + "/" + schedule_id,
                method: 'get',
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    var cardBody = $('.schedulefetch');
                    cardBody.empty();
                
                    var cardHtml = '<div class="row card my-3 ">'+
                    '<h4 class="card-head text-center m-4">'+ 'Choose Appropriate Schedule'+'</h4>';

                
                    $.each(response.schedule, function (index, schedule) {
                        cardHtml += '<div class="card-head h5  mt-3 d-flex justify-content-center">' + schedule.schedule_date + '</div>';
                        cardHtml += '<div class="card-body d-flex flex-wrap">';
                    
                        var startTime = moment(schedule.start_time, 'HH:mm:ss');
                        var endTime = moment(schedule.end_time, 'HH:mm:ss');
                    
                        var bookedIntervals = [];
                    
                        $.each(response.appointments, function (i, appointment) {
                            if (appointment.status !== 'cancel') {
                                bookedIntervals.push(appointment.time_interval);
                            }
                        });
                    
                        while (startTime.isBefore(endTime)) {
                            var intervalText = startTime.format('hh:mm A') + ' - ' + startTime.add(30, 'minutes').format('hh:mm A');
                    
                            if (!bookedIntervals.includes(intervalText)) {
                                var baseUrl = document.querySelector('meta[name="base-url"]').getAttribute('content');
                                var appointmentFormUrl = baseUrl + '/appointmentform';
                                appointmentFormUrl += '/' + schedule.id;
                                cardHtml += '<h6 class="col-4 card-title"><a href="' + appointmentFormUrl + '" class="badge badge-primary schedule-slot">' + intervalText + '</a></h6>';
                            }
                        }
                    
                        cardHtml += '</div>';
                    });
                    
                    
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

