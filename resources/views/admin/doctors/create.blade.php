@extends('admin.layouts.index')
@section('title', 'Doctor')
@section('title_link', route('doctor.index'))
@section('action', 'Add')
@section('content')
    @include('admin.breadcrumb')
    @inject('country_helper', 'App\Helpers\CountryHelper')
    @inject('province_helper', 'App\Helpers\ProvinceHelper')
    @inject('department_helper', 'App\Helpers\DepartmentHelper')

    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open(['route' => 'doctor.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                @csrf
                {{-- Page one Doctor basic details --}}
                <div id="page1">
                    <div class="card-header">
                        <h5 class="card-title">Basic Details</h5>
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
                                {!! Form::label('first_name', 'First Name') !!}<span class="text-danger">*</span>
                                {!! Form::text('first_name', null, [
                                    'id' => 'first_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'First name',
                                ]) !!}
                                <span id="first_name_error" class="text-danger"></span>
                                <span class="text-danger">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                {!! Form::label('middle_name', 'Middle Name') !!}
                                {!! Form::text('middle_name', null, [
                                    'id' => 'middle_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Middle name',
                                ]) !!}
                                <span class="text-danger">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="col">
                                {!! Form::label('last_name', 'Last Name') !!}<span class="text-danger">*</span>
                                {!! Form::text('last_name', null, [
                                    'id' => 'last_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Last name',
                                ]) !!}
                                <span id="last_name_error" class="basic-error text-danger"></span>

                                <span class="text-danger">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                {!! Form::label('gender', 'Gender') !!}<span class="text-danger">*</span>
                                {!! Form::select('gender', config('dropdown.gender'), null, [
                                    'id' => 'gender',
                                    'class' => 'form-select',
                                    'placeholder' => 'Select Gender',
                                ]) !!}
                                <span id="gender_error" class="basic-error text-danger"></span>

                                <span class="text-danger">
                                    @error('gender')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="col">
                                {!! Form::label('date_of_birth_BS', 'Date of Birth (BS)') !!}<span class="text-danger">*</span>
                                <input type="text" id="date_of_birth_BS" name="dob_bs" placeholder="Select Nepali Date"
                                    class="form-control" />
                                <span id="date_of_birth_BS_error" class="basic-error text-danger"></span>

                                <span class="text-danger">
                                    @error('dob_bs')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                {!! Form::label('date_of_birth_AD', 'Date of Birth (AD)') !!}<span class="text-danger">*</span>
                                <input type="text" id="date_of_birth_AD" name="dob_ad" placeholder="English Date"
                                    class="form-control" />
                                <span id="date_of_birth_AD_error" class="basic-error text-danger"></span>

                                <span class="text-danger">
                                    @error('dob_ad')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                {!! Form::label('departmentname', 'Department Name') !!}<span class="text-danger">*</span>
                                {!! Form::select('department_id', $department_helper->dropdown(), null, [
                                    'id' => 'department_id',
                                    'class' => 'form-select',
                                    'placeholder' => 'Select Department Name',
                                ]) !!}
                                <span id="department_id_error" class="basic-error text-danger"></span>

                                <span class="text-danger">
                                    @error('department_id')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="col">
                                {!! Form::label('licenceno', 'Licence Number') !!}<span class="text-danger">*</span>
                                {!! Form::text('licence_no', null, [
                                    'id' => 'licenceno',
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your Licence Number',
                                ]) !!}
                                <span id="licenceno_error" class="basic-error text-danger"></span>

                                <span class="text-danger">
                                    @error('licence_no')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="col">
                                {!! Form::label('phoneno', 'Phone Number') !!}<span class="text-danger">*</span>
                                {!! Form::text('phone_num', null, [
                                    'id' => 'phoneno',
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your Phone Number',
                                ]) !!}
                                <span id="phoneno_error" class="basic-error text-danger"></span>

                                <span class="text-danger">
                                    @error('phone_num')
                                        {{ $message }}
                                    @enderror
                                </span>
                                {{-- <span id="error_phoneno" class="text-danger">Please enter your phone number</span> --}}

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                {!! Form::label('photo', 'Profile') !!}
                                {!! Form::file('photo', ['class' => 'form-control-file']) !!}
                                <span class="text-danger">
                                    @error('photo')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                {!! Form::button('Next', [
                                    'type' => 'button',
                                    'id' => 'nextPage1',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Doctor Address --}}
                <div id="page2" style="display: d-none">
                    <div class="card-header">
                        <h5 class="card-title">Permanent Address</h5>
                    </div>
                    <div class="card-body">
                        <div id="addressAdd">
                            <div class="form-row mb-3">
                                <div class="col ">
                                    {!! Form::label('country', 'Country', ['class' => 'form-label']) !!}<span class="text-danger">*</span>
                                    {!! Form::select('country_id', $country_helper->dropdown(), 'Nepal', [
                                        'class' => 'form-select',
                                        'id' => 'country_id',
                                    ]) !!}
                                    <span id="country_id_error" class="address-error text-danger"></span>
                                    <span class="text-danger">
                                        @error('country_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col ">
                                    {!! Form::label('province', 'Province', ['class' => 'form-label']) !!}<span class="text-danger">*</span>
                                    {!! Form::select('province_id', $province_helper->dropdown(), null, [
                                        'class' => 'form-select',
                                        'id' => 'province_id',
                                        'placeholder' => 'Select Province',
                                    ]) !!}
                                    <span id="province_id_error" class="address-error text-danger"></span>
                                    <span class="text-danger">
                                        @error('province_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col ">
                                    {!! Form::label('district', 'District', ['class' => 'form-label']) !!}<span class="text-danger">*</span>
                                    <select id="district_id" name='district_id', class="form-select",
                                        placeholder = 'Select Province',></select>
                                    <span id="district_id_error" class="address-error text-danger"></span>
                                    <span class="text-danger">
                                        @error('district_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-4">
                                    {!! Form::label('municipality', 'Municipality', ['class' => 'form-label']) !!}<span class="text-danger">*</span>
                                    <select id="municipality_id", name='municipality_id', class="form-select"
                                        placeholder = 'Select Province',></select>
                                    <span id="municipality_id_error" class="address-error text-danger"></span>
                                    <span class="text-danger">
                                        @error('municipality_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-4">
                                    {!! Form::label('street', 'Street') !!}<span class="text-danger">*</span>
                                    {!! Form::text('street', null, [
                                        'class' => 'form-control',
                                        'id' => 'street',
                                        'placeholder' => 'Enter your street',
                                    ]) !!}
                                    <span id="street_error" class="address-error text-danger"></span>
                                    <span class="text-danger">
                                        @error('street')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="card-header d-flex justify-content-center">
                                {!! Form::button('<i class="fa-solid fa-plus"></i>', [
                                    'type' => 'button',
                                    'id' => 'addressbtn',
                                    'class' => 'btn btn-sm btn-primary mr-1',
                                    'data-toggle' => 'tooltip',
                                    ' data-placement' => 'top',
                                    'title' => 'Add',
                                ]) !!}
                            </div>
                        </div>
                        <div id="addressContainer">
                            {{-- --cloned address --}}
                        </div>

                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                {!! Form::button('Previous', [
                                    'type' => 'button',
                                    'id' => 'prevPage2',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>
                            <div class="col-auto">
                                {!! Form::button('Next', [
                                    'type' => 'button',
                                    'id' => 'nextPage2',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>
                        </div>

                    </div>


                </div>
                {{-- Doctors education --}}
                <div id="page3" style="display: none">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">Education</h5>
                    </div>
                    <div class="card-body">
                        <div id="educationAdd">
                            <div class="form-row mb-3">
                                <div class="col">
                                    {!! Form::label('education_level', 'Level') !!}<span class="text-danger red_*">*</span>
                                    {!! Form::select('education_level[]', config('dropdown.education_level'), null, [
                                        'id' => 'education_level',
                                        'class' => 'form-select',
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

                        <div id="educationContainer">

                            <!-- cloned js -->

                        </div>
                        <div class="card-header d-flex justify-content-center">
                            {!! Form::button('<i class="fa-solid fa-plus"></i>', [
                                'type' => 'button',
                                'id' => 'educationbtn',
                                'class' => 'btn btn-sm btn-primary mr-1',
                                'data-toggle' => 'tooltip',
                                'data-placement' => 'top',
                                'title' => 'Add',
                            ]) !!}
                            {{-- <div class="removeBtn">

                            </div> --}}

                        </div>
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                {!! Form::button('Previous', [
                                    'type' => 'button',
                                    'id' => 'prevPage3',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>
                            <div class="col-auto">
                                {!! Form::button('Next', [
                                    'type' => 'button',
                                    'id' => 'nextPage3',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>
                        </div>


                    </div>
                </div>

                {{-- Doctors Experiences --}}
                <div id="page4" style="display: none">
                    <div class="card-header">
                        <h5 class="card-title">Experience</h5>
                    </div>
                    <div class="card-body">
                        <div id="experienceAdd">
                            <div class="form-row mb-3">
                                <div class="col ">
                                    {!! Form::label('organization_name', 'Organization Name') !!}<span class="text-danger red_*">*</span>
                                    {!! Form::text('organization_name[]', null, [
                                        'class' => 'form-control',
                                        'name' => 'organization_name[]',
                                        'placeholder' => 'Organization Name',
                                    ]) !!}
                                    <span id="organization_name_error" class="text-danger"></span>
                                </div>
                                <div class="col">
                                    {!! Form::label('org_start_bs', 'Start Date(BS)') !!}<span class="text-danger red_*">*</span>
                                    {!! Form::text('org_start_bs[]', null, [
                                        'class' => 'form-control',
                                        'id' => 'org_start_bs',
                                        'placeholder' => 'Select start date',
                                    ]) !!}
                                    <span id="org_start_bs_error" class="text-danger"></span>
                                </div>
                                <div class="col">
                                    {!! Form::label('org_start_ad', 'Start Date(AD)') !!}<span class="text-danger red_*">*</span>
                                    {!! Form::text('org_start_ad[]', null, [
                                        'class' => 'form-control',
                                        'id' => 'org_start_ad',
                                        'placeholder' => 'English date',
                                    ]) !!}
                                    <span id="org_start_ad_error" class="text-danger"></span>
                                </div>
                                <div class="col">
                                    {!! Form::label('org_end_bs', 'End Date(BS)') !!}<span class="text-danger red_*">*</span>
                                    {!! Form::text('org_end_bs[]', null, [
                                        'class' => 'form-control',
                                        'id' => 'org_end_bs',
                                        'placeholder' => 'Select end date',
                                    ]) !!}
                                    <span id="org_end_bs_error" class="text-danger"></span>
                                </div>
                                <div class="col">
                                    {!! Form::label('org_end_ad', 'End Date(AD)') !!}<span class="text-danger red_*">*</span>
                                    {!! Form::text('org_end_ad[]', null, [
                                        'class' => 'form-control',
                                        'id' => 'org_end_ad',
                                        'placeholder' => 'English date',
                                    ]) !!}
                                    <span id="org_end_ad_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    {!! Form::label('description', ' Description') !!}<span class="text-danger red_*">*</span>
                                    {!! Form::textarea('description[]', null, ['class' => 'form-control', 'id' => 'editor']) !!}
                                    <span id="description_error" class="text-danger"></span>
                                </div>
                            </div>

                        </div>
                        <div id="experienceContainer">
                            {{-- cloned experience --}}
                        </div>
                        <div class="card-header d-flex justify-content-center">
                            {!! Form::button('<i class="fa-solid fa-plus"></i>', [
                                'type' => 'button',
                                'id' => 'experiencebtn',
                                'name' => 'action',
                                'class' => 'btn btn-sm btn-primary mr-1',
                                'data-toggle' => 'tooltip',
                                'data-placement' => 'top',
                                'title' => 'Add',
                            ]) !!}
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                {!! Form::button('Previous', [
                                    'type' => 'button',
                                    'id' => 'prevPage4',
                                    'name' => 'action',
                                    'value' => 'previous',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>
                            <div class="col-auto">
                                {!! Form::button('Next', [
                                    'type' => 'button',
                                    'id' => 'nextPage4',
                                    'name' => 'action',
                                    'value' => 'next',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>

                        </div>
                    </div>
                </div>

                <div id="page5" style="display: none">
                    <div class="card-header">
                        <h5 class="card-title">Account Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('inputEmail4', 'Email') !!}<span class="text-danger">*</span>
                                {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'inputEmail4']) !!}
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                {!! Form::label('password', 'Password') !!}<span class="text-danger">*</span>
                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('password_confirmation', 'Confirm Password') !!}<span class="text-danger">*</span>
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation']) !!}
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                {!! Form::button('Previous', [
                                    'type' => 'button',
                                    'id' => 'prevPage5',
                                    'name' => 'action',
                                    'value' => 'previous',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>
                            <div class="col-auto">
                                {!! Form::button('Submit', [
                                    'type' => 'submit',
                                    'id' => 'submit',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
    </div>
    </div>
    </div>

@endsection
