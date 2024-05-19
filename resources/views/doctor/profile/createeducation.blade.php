@extends('admin.layouts.index')
@section('title', 'Profile')
@section('title_link', route('doctorprofile'))
@section('action', 'Education Create')
@section('content')
@include('admin.breadcrumb')

<div class="card">
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open([
            'route' => ['storeeducation'],
            'method' => 'POST',
            ]) !!}
            @csrf

            <div id="educationAdd">
                <div class="card-header d-flex justify-content-between rem">
                    <h5 class="card-title">Education Details</h5>
                    <div class="cancel-button">
                        {!! Form::button('<i class="fa-solid fa-times"></i> Cancel', [
                            'type' => 'button',
                            'class' => 'btn btn-sm btn-danger mr-1',
                            'data-toggle' => 'tooltip',
                            'data-placement' => 'top',
                            'title' => 'Cancel',
                            'onclick' => "window.location.href='".route('doctorprofile')."'"
                        ]) !!}
                    </div>
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
                    <div class="form-row mb-3">
                        <div class="col">
                            {!! Form::label('education_level', 'Level') !!}<span class="text-danger red_*">*</span>
                            {!! Form::select('education_level[]', config('dropdown.education_level'), null, [
                            'id' => 'education_level',
                            'class' => 'form-control form-select',
                            'placeholder' => 'Select level',
                            ]) !!}
                            <span class="text-danger" id="education_level_error"></span>
                            <span class="text-danger">
                                @error('education_level')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col ">
                            {!! Form::label('institute_name', 'Institute Name') !!}<span class="text-danger red_*">*</span>
                            {!! Form::text('institute_name[]', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Institute name',
                            ]) !!}
                            <span class="text-danger" id="institute_name_error"></span>
                            <span class="text-danger">
                                @error('institute_name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col">
                            {!! Form::label('specialization', 'Specialization') !!}<span class="text-danger red_*">*</span>
                            {!! Form::text('specialization[]', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Specialization',
                            ]) !!}
                            <span class="text-danger" id="specialization_error"></span>

                            <span class="text-danger">
                                @error('specialization')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-4">
                            {!! Form::label('graduation_year_start_bs', 'Date of Graduation(BS)') !!}<span class="text-danger red_*">*</span>
                            {!! Form::text('graduation_year_start_bs[]', null, [
                            'id' => 'graduation_year_start_bs',
                            'class' => 'form-control',
                            'placeholder' => 'Select Nepali Date',
                            ]) !!}
                            <span class="text-danger" id="graduation_year_start_bs_error"></span>

                            <span class="text-danger">
                                @error('graduation_year_start_bs')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-4">
                            {!! Form::label('graduation_year_start_ad', 'Date of Graduation(AD)') !!}<span class="text-danger red_*">*</span>
                            {!! Form::text('graduation_year_start_ad[]', null, [
                            'id' => 'graduation_year_start_ad',
                            'class' => 'form-control',
                            'placeholder' => 'English date',
                            ]) !!}
                            <span class="text-danger" id="graduation_year_start_ad_error"></span>
                            <span class="text-danger">
                                @error('graduation_year_start_ad')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="educationContainer">

            </div>
            <div class="d-flex justify-content-center">
                {!! Form::button('<i class="fa-solid fa-plus"></i>', [
                    'type' => 'button',
                    'id' => 'educationbtn',
                    'class' => 'btn btn-sm btn-primary mr-1',
                    'data-toggle' => 'tooltip',
                    ' data-placement' => 'top',
                    'title' => 'Add',
                ]) !!}
            </div>
            <div class="row justify-content-end">
                <div class="col-auto">
                    {!! Form::button('Submit', [
                        'type' => 'submit',
                        'class' => 'btn btn-primary',
                    ]) !!}
                </div>
            </div>
        </div>
    </div>
</div>
            @endsection
