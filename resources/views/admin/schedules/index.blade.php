@extends('admin.layouts.index')
@section('title', 'Schedule')
@section('content')
@section('add_button', route('schedule.create'))

    @include('admin.breadcrumb')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">Date</th>
                                <th scope="col" class=" col-4">Intervals</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
@php
    $count=1;
@endphp
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $schedule->doctor->first_name }} {{ $schedule->doctor->middle_name }}
                                        {{ $schedule->doctor->last_name }}</td>
                                    <td>{{ $schedule->schedule_date }}</td>
                                    <td >
                                    @foreach ($schedule->getTimeIntervals() as $interval)
                                        {{ $interval['start_time'] }} - {{ $interval['end_time'] }} <br>
                                        @endforeach 
                                        
                                        </td>
                                    <td class="d-flex">
                                        {{-- <a href="{{ route('schedule.show', $schedule->id) }}"
                                            class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" data-placement="top"
                                            title="View"><i class="fa-solid fa-eye"></i></a> --}}
                                        <a href="{{ route('schedule.edit', $schedule->id) }}"
                                            class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST">
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
                    {{$schedules->links()}}
                </div>
            </div>
        </div>
    @endsection
