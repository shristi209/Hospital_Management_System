@extends('admin.layouts.index')
@section('title', 'Doctor')
@section('title_link', route('doctor.index'))
@section('action', 'Edit')
@section('content')
    @include('admin.breadcrumb')
    @inject('country_helper', 'App\Helpers\CountryHelper')
    @inject('province_helper', 'App\Helpers\ProvinceHelper')
    @inject('department_helper', 'App\Helpers\DepartmentHelper')

    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open([
                    'route' => ['doctor.update', $doctor->id],
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                @csrf
                @method('PUT')
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
                                {!! Form::text('first_name', $doctor->first_name, [
                                    'id' => 'first_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'First name',
                                ]) !!}
                                <span class="text-danger">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                {!! Form::label('middle_name', 'Middle Name') !!}
                                {!! Form::text('middle_name', $doctor->middle_name, [
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
                                {!! Form::text('last_name', $doctor->last_name, [
                                    'id' => 'last_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Last name',
                                ]) !!}
                                <span class="text-danger">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                                {{-- <span id="error_last_name" class="text-danger">Please enter your last name</span> --}}
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col">
                                {!! Form::label('gender', 'Gender') !!}<span class="text-danger">*</span>
                                {!! Form::select('gender', config('dropdown.gender'), $doctor->gender, [
                                    'id' => 'gender',
                                    'class' => 'form-select',
                                    'placeholder' => 'Select Gender',
                                ]) !!}
                                <span class="text-danger">
                                    @error('gender')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                {!! Form::label('date_of_birth_BS', 'Date of Birth (BS)') !!}<span class="text-danger">*</span>
                                {!! Form::text('dob_bs', $doctor->dob_bs, [
                                    'id' => 'date_of_birth_BS',
                                    'placeholder' => 'Select Nepali Date',
                                    'class' => 'form-control nepali-datepicker',
                                ]) !!}
                                <span class="text-danger">
                                    @error('dob_bs')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                {!! Form::label('date_of_birth_AD', 'Date of Birth (AD)') !!}<span class="text-danger">*</span>
                                {!! Form::date('dob_ad', $doctor->dob_ad, [
                                    'id' => 'date_of_birth_AD',
                                    'placeholder' => 'English Date',
                                    'class' => 'form-control',
                                ]) !!}
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
                                {!! Form::select('department_id', $department_helper->dropdown(), $doctor->department_id, [
                                    'id' => 'department_id',
                                    'class' => 'form-select',
                                    'placeholder' => 'Select Department Name',
                                ]) !!}
                                <span class="text-danger">
                                    @error('department_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                                {{-- <span id="error_department_name" class="text-danger">Please enter your department name</span> --}}

                            </div>
                            <div class="col">
                                {!! Form::label('licenceno', 'Licence Number') !!}<span class="text-danger">*</span>
                                {!! Form::text('licence_no', $doctor->licence_no, [
                                    'id' => 'licenceno',
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your Licence Number',
                                ]) !!}
                                <span class="text-danger">
                                    @error('licence_no')
                                        {{ $message }}
                                    @enderror
                                </span>
                                {{-- <span id="error_licenceno" class="text-danger">Please enter your liscence number</span> --}}

                            </div>
                            <div class="col">
                                {!! Form::label('phoneno', 'Phone Number') !!}<span class="text-danger">*</span>
                                {!! Form::text('phone_num', $doctor->phone_num, [
                                    'id' => 'phoneno',
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your Phone Number',
                                ]) !!}
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
                <div id="page2" style="display: none">
                    <div class="card-header">
                        <h5 class="card-title">Address</h5>
                    </div>
                    <div class="card-body">
                        <div id="addressAdd">
                            <div class="form-row mb-3">
                                <div class="col ">
                                    {!! Form::label('country', 'Country', ['class' => 'form-label']) !!}<span class="text-danger">*</span>
                                    {!! Form::select('country_id', $country_helper->dropdown(), $doctor->country_id, [
                                        'class' => 'form-select',
                                        'id' => 'country_id',
                                    ]) !!}
                                    <span class="text-danger">
                                        @error('country_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col ">
                                    {!! Form::label('province', 'Province', ['class' => 'form-label']) !!}<span class="text-danger">*</span>
                                    {!! Form::select('province_id', $province_helper->dropdown(), $doctor->province_id, [
                                        'class' => 'form-select',
                                        'id' => 'province_id',
                                        'placeholder' => 'Select Province',
                                    ]) !!}
                                    <span class="text-danger">
                                        @error('province_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col ">
                                    {!! Form::label('district', 'District', ['class' => 'form-label']) !!}<span class="text-danger">*</span>
                                    {!! Form::select('district_id', $districts->pluck('eng_district_name', 'id'), $doctor->district_id, [
                                        'class' => 'form-select',
                                        'id' => 'district_id',
                                        'placeholder' => 'Select District',
                                    ]) !!}
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
                                    {!! Form::select(
                                        'municipality_id',
                                        $municipalities->pluck('nep_municipality_name', 'id'),
                                        $doctor->municipality_id,
                                        [
                                            'class' => 'form-select',
                                            'id' => 'municipality_id',
                                            'placeholder' => 'Select municipality',
                                        ],
                                    ) !!}
                                    <span class="text-danger">
                                        @error('municipality_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-4">
                                    {!! Form::label('street', 'Street') !!}<span class="text-danger">*</span>
                                    {!! Form::text('street', $doctor->street, [
                                        'class' => 'form-control',
                                        'id' => 'street',
                                        'name' => 'street',
                                        'placeholder' => 'Enter your street',
                                    ]) !!}
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
                                    'name' => 'action',
                                    'value' => 'add',
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
                                    'name' => 'action',
                                    'value' => 'previous',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>
                            <div class="col-auto">
                                {!! Form::button('Next', [
                                    'type' => 'button',
                                    'id' => 'nextPage2',
                                    'name' => 'action',
                                    'value' => 'next',
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
                            ' data-placement' => 'top',
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
                                'name' => 'action',
                                'value' => 'previous',
                                'class' => 'btn btn-primary',
                            ]) !!}
                        </div>
                        <div class="col-auto">
                            {!! Form::button('Next', [
                                'type' => 'button',
                                'id' => 'nextPage3',
                                'name' => 'action',
                                'value' => 'next',
                                'class' => 'btn btn-primary',
                            ]) !!}
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
                            @foreach ($experiences as $experience)
                                <div class="form-row mb-3">
                                    <div class="col ">
                                        {!! Form::label('organization_name', 'Organization Name') !!}<span class="text-danger">*</span>
                                        {!! Form::text('organization_name[]', $experience->organization_name, [
                                            'class' => 'form-control',
                                            'name' => 'organization_name[]',
                                            'placeholder' => 'Organization Name',
                                        ]) !!}
                                        <span class="text-danger">
                                            @error('organization_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col">
                                        {!! Form::label('org_start_bs', 'Start Date(BS)') !!}<span class="text-danger">*</span>
                                        {!! Form::text('org_start_bs[]', $experience->org_start_bs, [
                                            'id' => 'org_start_bs',
                                            'class' => 'form-control',
                                            'placeholder' => 'Select start Date',
                                        ]) !!}
                                        <span class="text-danger">
                                            @error('org_start_bs')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col">
                                        {!! Form::label('org_start_ad', 'Start Date(AD)') !!}<span class="text-danger">*</span>
                                        {!! Form::text('org_start_ad[]', $experience->org_start_ad, [
                                            'id' => 'org_start_ad',
                                            'class' => 'form-control',
                                            'placeholder' => '',
                                        ]) !!}
                                        <span class="text-danger">
                                            @error('org_start_ad')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col">
                                        {!! Form::label('org_end_bs', 'End Date(BS)') !!}<span class="text-danger">*</span>
                                        {!! Form::text('org_end_bs[]', $experience->org_end_bs, [
                                            'id' => 'org_end_bs',
                                            'class' => 'form-control',
                                            'placeholder' => 'Select end date',
                                        ]) !!}
                                        <span class="text-danger">
                                            @error('org_end_bs')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col">
                                        {!! Form::label('org_end_ad', 'End Date(AD)') !!}<span class="text-danger">*</span>
                                        {!! Form::text('org_end_ad[]', $experience->org_end_ad, [
                                            'id' => 'org_end_ad',
                                            'class' => 'form-control',
                                            'placeholder' => '',
                                        ]) !!}
                                        <span class="text-danger">
                                            @error('org_end_ad')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col ">
                                        {!! Form::label('description', ' Description') !!}
                                        {!! Form::text('description[]', $experience->description, ['class' => 'form-control', 'id' => '']) !!}
                                        <span class="text-danger">
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="experienceContainer">
                            {{-- cloned experience --}}
                        </div>
                        <div class="card-header d-flex justify-content-center">
                            {!! Form::button('<i class="fa-solid fa-plus"></i>', [
                                'type' => 'button',
                                'id' => 'experiencebtn',
                                'class' => 'btn btn-sm btn-primary mr-1',
                                'data-toggle' => 'tooltip',
                                ' data-placement' => 'top',
                                'title' => 'Add',
                            ]) !!}

                        </div>
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                {!! Form::button('Previous', [
                                    'type' => 'button',
                                    'id' => 'prevPage4',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>
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



            {!! Form::close() !!}
        </div>
    </div>


@endsection
