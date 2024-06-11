@include('admin.layouts.partials.head')

<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 mt-3>Appointment Confirmation</h1>
                <p>Dear {{$patient->full_name}},</p>
                <p>We are pleased to inform you that your appointment with CareSync Hospital has been booked.</p>
                <p>Please find the details of your appointment below:</p>
                <p><strong>Date and Time:</strong> {{$schedule->start_time.' - '.$schedule->end_time}}</p>
                <p>We kindly ask you to arrive 10 minutes prior to your scheduled appointment time to complete any necessary paperwork.</p>
                <p>If you have any questions or need to reschedule, please contact our office at (123) 456-7890 or email us at superadmin@gmail.com</p>
                <p>We look forward to seeing you soon.</p>
                <p>Thank you for choosing CareSync Hospital.</p><br>
                <p>Best regards,</p>
                <p>The CareSync Hospital Team</p>
            </div>
        </div>
    </div>
</body>
