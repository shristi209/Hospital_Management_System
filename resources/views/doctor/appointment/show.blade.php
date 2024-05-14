@extends('admin.layouts.index')
@section('title', 'Patient Appointment')
@section('content')
@include('admin.breadcrumb')

<div class="card shadow">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">Patient Information</h4>
                <p><strong>Schedule Date:</strong> {{$patient->appointment->schedule->schedule_date}}
                <br><strong>Schedule Time:</strong> {{$patient->appointment->time_interval}}</p>
                <p><strong>Name:</strong> {{$patient->full_name}}
                <br><strong>Gender:</strong> {{$patient->gender}}
                <br><strong>Parent's Name:</strong> {{$patient->parents_name}}

                <br><strong>Date of Birth:</strong> {{$patient->date_of_birth}}</p>
                <p><strong>Temporary Address:</strong> {{$patient->temporary_address}}
                <br><strong>Permanent Address:</strong> {{$patient->permanent_address}}</p>
                <br>
                <p><i class="fa-solid fa-mobile"></i> {{$patient->phone}}
                <br><i class="fa-solid fa-envelope"></i> {{$patient->email}}</p>
            </div>
            <div class="col-md-6">
                <h4 class="card-title">Medical Details</h4>
                <p><strong>Appointment Message:</strong> {{$patient->appointment_message}}
                <br><strong>Reason:</strong> {{$patient->appointment->reason}}</p>
                <embed src="{{ asset($patient->medical_history) }}" type="application/pdf" width="100%" height="600px" />

            </div>
        </div>
    </div>
</div>

@endsection