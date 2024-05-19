@extends('admin.layouts.index')
@section('title', 'Patient Appointment')
@section('content')
    @include('admin.breadcrumb')

    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="d-flex justify-content-center mb-5">
                    <div class="header ">
                        <h2 class="card-title">Patient Information</h2>
                        <p>Schedule Date: {{ $patient->appointment->schedule->schedule_date }}
                            <br>Schedule Time: {{ $patient->appointment->time_interval }}
                        </p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="table-responsive">
                        <table class="table mb-0 ">
                            <thead>
                                <tr>
                                    <th>Field</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Name:</td>
                                    <td>{{ $patient->full_name }}</td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td>{{ $patient->gender }}</td>
                                </tr>
                                <tr>
                                    <td>Parent's Name:</td>
                                    <td>{{ $patient->parents_name }}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth:</td>
                                    <td>{{ $patient->date_of_birth }}</td>
                                </tr>
                                <tr>
                                    <td>Appointment Message:</td>
                                    <td>{{ $patient->email }}</td>
                                </tr>
                                <tr>
                                    <td>Reason:</td>
                                    <td>{{ $patient->appointment->reason }}</td>
                                </tr>
                                <tr>
                                    <td>Temporary Address:</td>
                                    <td>{{ $patient->temporary_address }}</td>
                                </tr>
                                <tr>
                                    <td>Permanent Address:</td>
                                    <td>{{ $patient->permanent_address }}</td>
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td>{{ $patient->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>{{ $patient->email }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-1">
                </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Medical History</h5>
                        <embed src="{{ asset($patient->medical_history) }}" type="application/pdf" width="100%"
                            height="600px" />

                    </div>
                </div>
            </div>
        </div>

    @endsection
