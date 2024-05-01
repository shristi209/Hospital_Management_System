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
                {!! Form::open(['route' => 'doctor.store', 'method' => 'POST']) !!}
                {{-- Page one Doctor basic details --}}
                <div id="page1">
                    <div class="card-header">
                        <h5 class="card-title">Basic Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row mb-3">
                            <div class="col">
                                {!! Form::label('first_name', 'First Name') !!}
                                {!! Form::text('first_name', null, [
                                    'id' => 'first_name',
                                    'name' => 'first_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'First name',
                                ]) !!}
                                <span id="error_first_name" class="text-danger" style="display: none;">Please enter your
                                    first name.</span>

                            </div>
                            <div class="col">
                                {!! Form::label('middle_name', 'Middle Name') !!}
                                {!! Form::text('middle_name', null, [
                                    'id' => 'middle_name',
                                    'name' => 'middle_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Middle name',
                                ]) !!}
                            </div>
                            <div class="col">
                                {!! Form::label('last_name', 'Last Name') !!}
                                {!! Form::text('last_name', null, [
                                    'id' => 'last_name',
                                    'name' => 'last_name',
                                    'class' => 'form-control',
                                    'placeholder' => 'Last name',
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                {!! Form::label('gender', 'Gender') !!}
                                {!! Form::select('gender', config('dropdown.gender'), null, [
                                    'id' => 'gender',
                                    'name' => 'gender',
                                    'class' => 'form-select',
                                    'placeholder' => 'Select Gender',
                                ]) !!}
                            </div>
                            <div class="col">
                                {!! Form::label('date_of_birth_BS', 'Date of Birth (BS)') !!}
                                <input type="text" id="date_of_birth_BS" name="date_of_birth_BS"
                                    placeholder="Select Nepali Date" class="form-control" />
                            </div>
                            <div class="col">
                                {!! Form::label('date_of_birth_AD', 'Date of Birth (AD)') !!}
                                <input type="text" id="date_of_birth_AD" name="date_of_birth_AD"
                                    placeholder="English Date" class="form-control" disabled />
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                {!! Form::label('departmentname', 'Department Name') !!}
                                {!! Form::select('department_id', $department_helper->dropdown(), null, [
                                    'id' => 'department_id',
                                    'name' => 'department_id',
                                    'class' => 'form-select',
                                    'placeholder' => 'Select Department Name',
                                ]) !!}
                            </div>
                            <div class="col">
                                {!! Form::label('licenceno', 'Licence Number') !!}
                                {!! Form::text('licenceno', null, [
                                    'id' => 'licenceno',
                                    'name' => 'licenceno',
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your Licence Number',
                                ]) !!}
                            </div>
                            <div class="col">
                                {!! Form::label('phoneno', 'Phone Number') !!}
                                {!! Form::text('phoneno', null, [
                                    'id' => 'phoneno',
                                    'name' => 'phoneno',
                                    'class' => 'form-control',
                                    'placeholder' => 'Enter your Phone Number',
                                ]) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                {!! Form::button('Next', [
                                    'type' => 'button',
                                    'id' => 'nextPage1',
                                    'name' => 'action',
                                    'value' => 'next',
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
                        <div class="form-row mb-3">
                            <div class="col ">
                                {!! Form::label('country', 'Country', ['class' => 'form-label']) !!}
                                {!! Form::select('country_id', $country_helper->dropdown(), null, [
                                    'class' => 'form-select',
                                    'id' => 'country_id',
                                ]) !!}
                            </div>

                            <div class="col ">
                                {!! Form::label('province', 'Province', ['class' => 'form-label']) !!}
                                {!! Form::select('province_id', $province_helper->dropdown(), null, [
                                    'class' => 'form-select',
                                    'id' => 'province_id',
                                    'placeholder' => 'Select Province',
                                ]) !!}
                            </div>
                            <div class="col ">
                                {!! Form::label('district', 'District', ['class' => 'form-label']) !!}
                                <select id="district_id" class="form-select"></select>
                                {{-- {!! Form::select('district_id','placeholder'->'Select District' , null, ['class' => 'form-control', 'id' => 'district_id']) !!} --}}
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                {!! Form::label('municipality', 'Municipality', ['class' => 'form-label']) !!}
                                <select id="municipality_id" class="form-select"></select>
                            </div>
                            <div class="col">
                                {!! Form::label('street', 'Street') !!}
                                {!! Form::text('street', null, ['class' => 'form-control', 'placeholder' => 'Enter your district']) !!}
                            </div>

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
                            <div class="form-row mb-3">
                                <div class="col ">
                                    {!! Form::label('institute_name', 'Institute Name') !!}
                                    {!! Form::text('institute_name', null, ['class' => 'form-control', 'placeholder' => 'Institute name']) !!}
                                </div>
                                <div class="col">
                                    {!! Form::label('specialization', 'Specialization') !!}
                                    {!! Form::text('specialization', null, ['class' => 'form-control', 'placeholder' => 'Specialization']) !!}
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    {!! Form::label('graduation_year_start_bs', 'Date of Graduation(BS)') !!}
                                    <input type="text" id="graduation_year_start_bs" placeholder="Select Nepali Date"
                                        class="form-control" />
                                </div>
                                <div class="col">
                                    {!! Form::label('graduation_year_start_ad', 'Date of Graduation(AD)') !!}
                                    <input type="text" id="graduation_year_start_ad" placeholder="English Date"
                                        class="form-control" />
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
                                'name' => 'action',
                                'value' => 'add',
                                'class' => 'btn btn-sm btn-primary mr-1',
                                "data-toggle"=>"tooltip"," data-placement"=>"top", "title"=>"Add"
                            ]) !!}
                            {{-- <div class="removeBtn">

                            </div> --}}
                            {!! Form::button('<i class="fa-solid fa-trash"></i>', [
                                'type' => 'button',
                                'id' => 'educationbtn_remove',
                                'name' => 'action',
                                'value' => 'remove',
                                'class' => 'btn btn-sm btn-danger',
                                "data-toggle"=>"tooltip"," data-placement"=>"top", "title"=>"Delete"
                            ]) !!}
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
                </div>

                {{-- Doctors Experiences --}}
                <div id="page4" style="display: none">
                    <div class="card-header">
                        <h5 class="card-title">Experience</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row mb-3">
                            <div class="col ">
                                {!! Form::label('org_name', 'Organization Name') !!}
                                {!! Form::text('org_name', null, ['class' => 'form-control', 'placeholder' => 'Organization Name']) !!}
                            </div>
                            <div class="col">
                                {!! Form::label('org_start_bs', 'Start Date(BS)') !!}
                                <input type="text" id="org_start_bs" placeholder="Select start Date"
                                    class="form-control" />
                            </div>
                            <div class="col">
                                {!! Form::label('org_start_ad', 'Start Date(AD)') !!}
                                <input type="text" id="org_start_ad" placeholder="Select end Date"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col ">
                                {!! Form::label('description', ' Description') !!}
                                {!! Form::text('description', null, ['class' => 'form-control', 'id' => 'editor']) !!}
                            </div>
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
                                {!! Form::button('Submit', [
                                    'type' => 'submit',
                                    'id' => 'submit',
                                    'name' => 'action',
                                    'value' => 'submit',
                                    'class' => 'btn btn-primary',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>



                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
