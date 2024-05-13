@extends('website.layouts.index')
@section('content')

<div class="card m-5">
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['route' => 'appointmentform.store', 'method' => 'POST']) !!}
            @csrf
                <div class="card-header">
                    <h5 class="card-title">Appointment Form</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col-4">
                            {!! Form::label('full_name', 'Full Name') !!}<span class="text-danger">*</span>
                            {!! Form::text('full_name', null, [
                                'id' => 'full_name',
                                'class' => 'form-control',
                                'placeholder' => 'Enter your full name',
                            ]) !!}
                            <span class="text-danger">
                                @error('full_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-4">
                            {!! Form::label('gender', 'Gender') !!}<span class="text-danger">*</span>
                            {!! Form::select('gender', config('dropdown.gender'), null, [
                                'id' => 'gender',
                                'class' => 'form-control form-select',
                                'placeholder' => 'Select your gender',
                            ]) !!}
                            <span class="text-danger">
                                @error('gender')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-4">
                            {!! Form::label('date_of_birth', 'Date of Birth (BS)') !!}<span class="text-danger">*</span>
                            {!! Form::date('date_of_birth', null, [
                                'id' => 'date_of_birth',
                                'class' => 'form-control',
                                'placeholder' => 'Select your date of birth',
                            ]) !!}
                            <span class="text-danger">
                                @error('dob_bs')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            {!! Form::label('temporary_address', 'Temporary Address') !!}<span class="text-danger">*</span>
                            {!! Form::text('temporary_address', null, [
                                'id' => 'temporary_address',
                                'class' => 'form-control',
                                'placeholder' => 'Enter your temporary address',
                            ]) !!}
                            <span class="text-danger">
                                @error('temporary_address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-4">
                            {!! Form::label('permanent_address', 'Permanent Address') !!}<span class="text-danger">*</span>
                            {!! Form::text('permanent_address', null, [
                                'id' => 'permanent_address',
                                'class' => 'form-control',
                                'placeholder' => 'Enter your permanent address',
                            ]) !!}
                            <span class="text-danger">
                                @error('permanent_address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-4">
                            {!! Form::label('phone', 'Phone Number') !!}<span class="text-danger">*</span>
                            {!! Form::text('phone', null, [
                                'id' => 'phone',
                                'class' => 'form-control',
                                'placeholder' => 'Enter your phone number',
                            ]) !!}
                            <span class="text-danger">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            {!! Form::label('email', 'Email') !!}<span class="text-danger">*</span>
                            {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email','placeholder'=>'Enter your email']) !!}
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            {!! Form::label('parents_name', "Parents' Name") !!}<span class="text-danger">*</span>
                            {!! Form::text('parents_name', null, [
                                'id' => 'parents_name',
                                'class' => 'form-control',
                                'placeholder' => "Enter your parents' name",
                            ]) !!}
                            <span id="parents_name_error" class="text-danger"></span>
                            <span class="text-danger">
                                @error('parents_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-4">
                            {!! Form::label('appointment_message', 'Appointment Message') !!}<span class="text-danger">*</span>
                            {!! Form::text('appointment_message', null, [
                                'id' => 'appointment_message',
                                'class' => 'form-control',
                                'placeholder' => 'Enter your appointment message',
                            ]) !!}
                            <span id="appointment_message_error" class="text-danger"></span>
                            <span class="text-danger">
                                @error('appointment_message')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            {!! Form::label('reason', 'Reason') !!}<span class="text-danger">*</span>
                            {!! Form::text('reason', null, [
                                'id' => 'reason',
                                'class' => 'form-control',
                                'placeholder' => 'Enter your reason',
                            ]) !!}
                            <span id="reason_error" class="text-danger"></span>
                            <span class="text-danger">
                                @error('reason')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-4">
                            {!! Form::label('time_interval', 'Time interval') !!}<span class="text-danger">*</span>
                            {!! Form::text('time_interval', null, [
                                'id' => 'selected_interval_patient_form',
                                'class' => 'form-control',
                                'placeholder' => 'Enter your time_interval',
                                'readonly' => 'readonly',
                            ]) !!}
                            <span id="time_interval_error" class="text-danger"></span>
                            <span class="text-danger">
                                @error('time_interval')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <input type="hidden" id="selected_interval_patient_form" name="schedule_id" value="{{ $schedule->id }}">

                        <div class="col-4">
                            {!! Form::label('medical_history', 'Medical History (PDF)') !!}<span class="text-danger">*</span>
                            {!! Form::file('medical_history', [
                                'id' => 'medical_history',
                                'class' => 'form-control-file',
                                'placeholder' => 'Upload your medical history (PDF)',
                            ]) !!}
                            <span id="medical_history_error" class="text-danger"></span>
                            <span class="text-danger">
                                @error('medical_history')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>
                    <div class="form-row mb-3">
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                {!! Form::button('Submit', [
                                    'type' => 'submit',
                                    'id' => 'submit',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
