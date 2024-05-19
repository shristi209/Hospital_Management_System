@extends('admin.layouts.index')
@section('title', 'Profile')
@section('title_link', route('doctorprofile'))
@section('action', 'Experience Create')
@section('content')
    @include('admin.breadcrumb')
    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open([
                    'route' => ['storeexperience'],
                    'method' => 'POST',
                ]) !!}
                @csrf

                <div id="experienceAdd">
                    <div class="card-header d-flex justify-content-between rem">
                        <h5 class="card-title">Experience</h5>
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
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-4">
                                {!! Form::label('org_end_bs', 'End Date(BS)') !!}<span class="text-danger red_*">*</span>
                                {!! Form::text('org_end_bs[]', null, [
                                    'class' => 'form-control',
                                    'id' => 'org_end_bs',
                                    'placeholder' => 'Select end date',
                                ]) !!}
                                <span id="org_end_bs_error" class="text-danger"></span>
                            </div>
                            <div class="col-4">
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
                </div>
                <div id="experienceContainer">
                    {{-- cloned experience --}}
                </div>
                <div class="d-flex justify-content-center">
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
                <div class="row justify-content-end">
                    <div class="col-auto">
                        {!! Form::button('Submit', [
                            'type' => 'submit',
                            'class' => 'btn btn-primary',
                        ]) !!}
                    </div>
                </div>
            </div>
@endsection
