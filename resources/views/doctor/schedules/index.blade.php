@extends('admin.layouts.index')
@section('title', 'Schedule')
@section('content')
@section('add_button', route('doctorschedule.create'))
    @include('admin.breadcrumb')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Date</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="col-2">Action</th>
                            </tr>
                        </thead>
                         <tbody>
@php
    $count=1;
@endphp
                            @foreach ($schedules as $schedule)

                            @foreach ($schedule->getTimeIntervals() as $interval)
                            <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $interval['schedule_date'] }}</td>
                                        <td>{{ $interval['start_time'] }}</td>
                                        <td>{{ $interval['end_time'] }}</td>
                                        <td>{!! Form::select('gender', config('dropdown.status'), null, [
                                            'id' => 'gender',
                                            'class' => 'form-control form-select',
                                            'placeholder' => 'Select Gender',
                                        ]) !!}</td>
                            @endforeach

                                    <td class="d-flex">
                                        <a href="{{ route('schedule.show', $schedule->id) }}"
                                            class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="top"
                                            title="View"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('doctorschedule.edit', $schedule->id) }}"
                                            class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('doctorschedule.destroy', $schedule->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mr-1"
                                                onclick="return confirm('Are you sure you want to delete this user?')"
                                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
