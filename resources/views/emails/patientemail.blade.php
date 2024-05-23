@include('admin.layouts.partials.head')

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1>Status of your appointment</h1>
                <p>Hello Patient,</p>
                <p>Your appointment with CareSync is {{$appointment->status}}</p>
                {{-- <p>Please come according to your scheduled time: {{$appointment->time_interval}}</p> --}}
                <p>Thank you.</p>
            </div>
        </div>
    </div>
</body>


