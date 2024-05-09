@extends('admin.layouts.index')
@section('title', 'Profile')
@section('title_link', route('doctorprofile'))
@section('action', 'Education Edit')
@section('content')
    @include('admin.breadcrumb')

    {{-- Doctors education --}}
    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open([
                    'route' => ['updateeducation', $doctorId],
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                @csrf
                @method('PUT')
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">Education</h5>
                </div>
                <div class="card-body">
                    <div id="educationAdd">
                        @foreach ($educations as $education)
                            <div class="form-row mb-3">
                                <div class="col">
                                    {!! Form::label('education_level', 'Level') !!}<span class="text-danger">*</span>
                                    {!! Form::select('education_level', config('dropdown.education_level'), $education->education_level, [
                                        'id' => 'education_level',
                                        'class' => 'form-select',
                                        'placeholder' => 'Select level',
                                    ]) !!}
                                    <span class="text-danger">
                                        @error('education_level')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col ">
                                    {!! Form::label('institute_name', 'Institute Name') !!}<span class="text-danger">*</span>
                                    {!! Form::text('institute_name[]', $education->institute_name, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Institute name',
                                    ]) !!}
                                    <span class="text-danger">
                                        @error('institute_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col">
                                    {!! Form::label('specialization', 'Specialization') !!}<span class="text-danger">*</span>
                                    {!! Form::text('specialization[]', $education->specialization, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Specialization',
                                    ]) !!}
                                    <span class="text-danger">
                                        @error('specialization')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-4">
                                    {!! Form::label('graduation_year_start_bs', 'Date of Graduation(BS)') !!}<span class="text-danger">*</span>
                                    {!! Form::text('graduation_year_start_bs[]', $education->graduation_year_start_bs, [
                                        'id' => 'graduation_year_start_bs',
                                        'class' => 'form-control',
                                        'placeholder' => 'Select Nepali Date',
                                    ]) !!}
                                    @error('graduation_year_start_bs')
                                        {{ $message }}
                                    @enderror
                                    </span>
                                </div>
                                <div class="col-4">
                                    {!! Form::label('graduation_year_start_ad', 'Date of Graduation(AD)') !!}<span class="text-danger">*</span>
                                    {!! Form::text('graduation_year_start_ad[]', $education->graduation_year_start_ad, [
                                        'id' => 'graduation_year_start_ad',
                                        'class' => 'form-control',
                                        'placeholder' => 'English Date',
                                    ]) !!}

                                    @error('graduation_year_start_ad')
                                        {{ $message }}
                                    @enderror
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                <div id="educationContainer">

                    <!-- cloned js -->

                </div>
            </div>
                <div class="card-header d-flex justify-content-center">
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
