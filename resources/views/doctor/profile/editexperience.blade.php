@extends('admin.layouts.index')
@section('title', 'Profile')
@section('title_link', route('doctorprofile'))
@section('action', 'Experience Edit')
@section('content')
    @include('admin.breadcrumb')

    {{-- Doctors education --}}
    @foreach ($experiences as $experience)
        <div class="card mb-3">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::open([
                        'route' => ['updatexperience', $doctorId],
                        'method' => 'POST',
                        'enctype' => 'multipart/form-data',
                    ]) !!}
                    @csrf
                    @method('PUT')
                    {{-- Doctors Experiences --}}
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">Edit Experience</h5>
                        <div>
                            {!! Form::button('<i class="fa-solid fa-trash"></i>', [
                                'type' => 'button',
                                'name' => 'action',
                                'class' => 'btn btn-sm btn-outline-danger',
                                'data-toggle' => 'tooltip',
                                'data-placement' => 'top',
                                'title' => 'Remove',
                            ]) !!}
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="page4">
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
                            <br>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach


    <div class="row justify-content-end mb-3">
        <div class="col-auto">
            {!! Form::button('Submit', [
                'type' => 'submit',
                'class' => 'btn btn-primary',
            ]) !!}

            <script>
                window.onload = function() {
                    var mainInput = document.getElementById("org_start_bs");
                    mainInput.nepaliDatePicker();
                };

                function dateconversion() {
                    var nepali = $('#org_start_bs').val();
                    var english = NepaliFunctions.BS2AD(nepali);
                    $('#org_start_ad').val(english);
                }
                setInterval(() => {
                    dateconversion();
                }, 1000);

                $('#org_end_bs').nepaliDatePicker({
                    onChange: function() {
                        var nepali = $('#org_end_bs').val();
                        console.log(nepali);

                        var english = NepaliFunctions.BS2AD(nepali);
                        console.log(english);
                        $('#org_end_ad').val(english);
                    }
                })
            </script>
        @endsection
