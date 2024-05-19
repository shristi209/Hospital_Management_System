@extends('admin.layouts.index')
@section('title', 'Profile')
@section('title_link', route('doctorprofile'))
@section('action', 'Edit Education')
@section('content')
    @include('admin.breadcrumb')

    {{-- Doctors education --}}
    {!! Form::open([
        'route' => ['updateeducation', $doctorId],
        'method' => 'PUT',
        'enctype' => 'multipart/form-data',
        'id' => 'updateEducationForm',
    ]) !!}
    @csrf

    @foreach ($educations as $education)
        <div class="card mb-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">Edit Education</h5>
                        <div>
                            <input type="hidden" name="delete_education[]" value="0" id="delete_education_{{ $education->id }}">
                            <button type="button" class="btn btn-sm btn-outline-danger mr-1"
                                onclick="document.getElementById('delete_education_{{ $education->id }}').value = 1; this.closest('form').submit();"
                                data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
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
                                {!! Form::label('education_level', 'Level') !!}<span class="text-danger">*</span>
                                {!! Form::select('education_level[]', config('dropdown.education_level'), $education->education_level, [
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
                            <div class="col">
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
                        <input type="hidden" name="education_id[]" value="{{ $education->id }}">
                        <br>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="row justify-content-end mb-3">
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
