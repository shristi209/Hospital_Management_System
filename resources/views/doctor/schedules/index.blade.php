@extends('admin.layouts.index')
@section('title', 'Schedule')
@section('content')
{{-- @section('add_button', route('doctorschedule.create')) --}}
@include('admin.breadcrumb')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            {{-- <th scope="col">Date</th>/ --}}
                            <th scope="col">Days</th>
                            <th scope="col" class="col-4">Intervals</th>
                            <th scope="col" class="col-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($schedules as $schedule)
                            <tr>
                                <td>{{ $count++ }}</td>
                                {{-- <td>{{ $schedule->schedule_date }}</td> --}}
                                <td>{{ $schedule->day }}</td>
                                <td>
                                        {{$schedule->start_time }} - {{ $schedule->end_time }} <br>
                                </td>

                                <td>
                                    <div class="form-check form-switch ml-4">
                                        {!! Form::open(['route' => ['availabilitycheck', $schedule->id], 'method' => 'PATCH']) !!}
                                            @csrf
                                            {!! Form::hidden('status', 'unavailable') !!}
                                            {!! Form::checkbox('status', 'available', $schedule->status === 'available', ['class' => 'form-check-input', 'id' => 'flexSwitchCheckChecked', 'role' => 'switch', 'onchange' => 'this.form.submit();']) !!}
                                        {!! Form::close() !!}
                                    </div>

                                </td>

                                {{-- <td class="d-flex">
                                    <a href="{{ route('doctorschedule.edit', $schedule->id) }}"
                                        class="btn btn-sm btn-outline-primary mr-1" data-toggle="tooltip"
                                        data-placement="top" title="Edit"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <form action="{{ route('doctorschedule.destroy', $schedule->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger mr-1"
                                            onclick="return confirm('Are you sure you want to delete this user?')"
                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
