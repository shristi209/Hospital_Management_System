@extends('admin.layouts.index')
@section('title', 'Doctor')
@section('title_link', route('doctor.index'))
@section('action', 'Trash')
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
                                <th scope="col">Department</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Licence</th>
                                <th scope="col">Phone</th>
                                <th scope="col" class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $doctor->department->department_name }}</td>
                                    <td>{{ $doctor->first_name}}
                                    {{ $doctor->middle_name}}
                                    {{ $doctor->last_name}}</td>
                                    <td>{{ $doctor->gender}}</td>
                                    <td>{{ $doctor->licence_no}}</td>
                                    <td>{{ $doctor->phone_num}}</td>
                                    <td class="d-flex">
                                        <div class="d-flex justify-content-end mr-3">
                                            <div class="d-flex justify-content-end mr-3">
                                                {!! Form::open(['route' => ['trashdoctor', $doctor->id], 'method' => 'PUT']) !!}
                                                    {!! Form::button('<i class="fa-solid fa-trash-arrow-up"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-primary mr-3', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Restore']) !!}
                                                {!! Form::close() !!}
                                                {!! Form::open(['route' => ['trashdeletedoctor', $doctor->id], 'method' => 'DELETE']) !!}
                                                    {!! Form::button('<i class="fa-solid fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure you want to delete this department?')"]) !!}
                                                {!! Form::close() !!}
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

