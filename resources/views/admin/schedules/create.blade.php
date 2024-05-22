@extends('admin.layouts.index')
@section('title', 'Schedule')
@section('title_link', route('schedule.index'))
@section('action', 'Add')
@section('content')
    @include('admin.breadcrumb')
    @inject('doctor_name', 'App\Helpers\DoctorHelper')

    <div class="card">
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
            <div class="row">
                <div class="col-lg-12">

                    {!! Form::open(['route' => 'schedule.store', 'method' => 'POST']) !!}
                    @csrf
                    <div class="form-row mb-3">
                        <div class="col">
                            {!! Form::label('doctor_id', 'Doctor Name') !!}<span class="text-danger">*</span>
                            {!! Form::select('doctor_id', $doctor_name->dropdown(), null, [
                                'class' => 'form-select',
                                'id' => 'doctor_id',
                                'placeholder' => 'Select doctor name',
                            ]) !!}
                            @error('doctor_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="col">
                            {!! Form::label('schedule_date', 'Schedule Date') !!}
                            {!! Form::date('schedule_date', null, [
                                'class' => 'form-control',
                                'id' => 'schedule_date',
                                'placeholder' => 'Select schedule date',
                            ]) !!}
                            @error('schedule_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            {!! Form::label('start_time', 'Start Time') !!}<span class="text-danger">*</span>
                            {!! Form::time('start_time', null, [
                                'class' => 'form-control',
                                'id' => 'start_time',
                                'placeholder' => 'Enter start time',
                            ]) !!}
                            @error('start_time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            {!! Form::label('end_time', 'End Time') !!}<span class="text-danger">*</span>
                            {!! Form::time('end_time', null, [
                                'class' => 'form-control',
                                'id' => 'end_time',
                                'placeholder' => 'Enter end time',
                            ]) !!}
                            @error('end_time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-6">
                            {!! Form::label('day', 'Schedule days') !!}<span class="text-danger">*</span>
                            {!! Form::select('day[]', config('dropdown.day'), null, [
                                'id' => 'day',
                                'class' => 'js-example-basic-multiple form-control form-select',
                                'multiple' => 'multiple',
                            ]) !!}
                            @error('doctor_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            {!! Form::label('quota', 'Total quotas') !!}<span class="text-danger">*</span>
                            {!! Form::text('quota', null, [
                                'id' => 'quota',
                                'class' => ' form-control',
                                'multiple' => 'multiple',
                            ]) !!}
                            @error('doctor_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-5 mb-3">
                        <a href="{{ route('schedule.index') }}" class="btn btn-danger">Cancel</a>
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
