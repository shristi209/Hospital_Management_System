@extends('admin.layouts.index')
@section('title', 'Patient Appointment')
@section('content')
@include('admin.breadcrumb')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Name</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Date</th>
                            <th scope="col">Intervals</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $appointment->patient->full_name }} </td>
                                    <td>{{ $appointment->patient->date_of_birth }}</td>
                                    <td>{{$appointment->schedule->schedule_date}}</td>
                                    <td>{{$appointment->time_interval  }}</td>
                                    <td>
                                    @if($appointment->status == 'pending')
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="approvalDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="approvalDropdown">
                                            {!! Form::open(['route' => ['statusupdate', $appointment->id], 'method' => 'POST']) !!}
                                            @csrf
                                            @method('PATCH')
                                            {!! Form::button('Approved', ['type' => 'submit', 'class' => 'dropdown-item', 'name' => 'status', 'value' => 'approved']) !!}
                                            {!! Form::close() !!}

                                            {!! Form::open(['route' => ['statusupdate', $appointment->id], 'method' => 'POST']) !!}
                                            @csrf
                                            @method('PATCH')
                                            {!! Form::button('Cancel', ['type' => 'submit', 'class' => 'dropdown-item', 'name' => 'status', 'value' => 'cancel']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    @elseif($appointment->status == 'approved')
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-danger">Cancelled</span>
                                    @endif

                                    <script>
                                        function submitForm() {
                                            document.getElementById('statusForm').submit();
                                        }
                                    </script>
                                   </td>
                                   <td>
                                <a href="{{ route('doctorappointment.show', $appointment->id) }}"
                                    class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="top"
                                    title="View"><i class="fa-solid fa-eye"></i></a>
                                <!-- <a href="{{ route('doctorappointment.edit', $appointment->id) }}"
                                    class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" data-placement="top"
                                    title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                <form action="{{ route('doctorappointment.destroy', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mr-1"
                                        onclick="return confirm('Are you sure you want to delete this user?')"
                                        data-toggle="tooltip" data-placement="top" title="Delete"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form> -->
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

