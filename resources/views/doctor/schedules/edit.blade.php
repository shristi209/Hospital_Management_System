@extends('admin.layouts.index')
@section('title', 'Schedule')
@section('title_link', route('schedule.index'))
@section('action', 'Edit')
@section('content')
    @include('admin.breadcrumb')
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

                    {!! Form::open(['route' => ['doctorschedule.update', $schedule->id], 'method' => 'POST']) !!}
                    @csrf
                    @method('PUT')
                    <div class="form-row mb-3">
                        <div class="col-6">
                            {!! Form::label('schedule_date', 'Schedule Date') !!}<span class="text-danger">*</span>
                            {!! Form::date('schedule_date', $schedule->schedule_date, [
                                'class' => 'form-control',
                                'id' => 'schedule_date',
                                'placeholder' => 'Select schedule date',
                            ]) !!}
                            @error('schedule_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            {!! Form::label('start_time', 'Start Time') !!}<span class="text-danger">*</span>
                            {!! Form::time('start_time', $schedule->start_time, [
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
                            {!! Form::time('end_time', $schedule->end_time, [
                                'class' => 'form-control',
                                'id' => 'end_time',
                                'placeholder' => 'Enter end time',
                            ]) !!}
                            @error('end_time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-5 mb-3">
                    <a href="{{ route('doctorschedule.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>

@endsection
