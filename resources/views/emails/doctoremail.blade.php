@include('admin.layouts.partials.head')
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="text-center">New Appointment Booked</h1>
                <p>Hello Doctor,</p>
                <p>A new appointment has been booked. Here are the details:</p>
                <ul class="list-unstyled">
                    <li>Full Name: {{ $patient->full_name }}</li>
                    <li>Gender: {{ $patient->gender }}</li>
                    <li>Date of Birth: {{ $patient->date_of_birth }}</li>
                    <li>Temporary Address: {{ $patient->temporary_address }}</li>
                    <li>Permanent Address: {{ $patient->permanent_address }}</li>
                    <li>Phone: {{ $patient->phone }}</li>
                    <li>Email: {{ $patient->email }}</li>
                    <li>Parents Name: {{ $patient->parents_name }}</li>
                    <li>Appointment Message: {{ $patient->appointment_message }}</li>
                </ul>
                <p>Thank you.</p>
            </div>
        </div>
    </div>
</body>
