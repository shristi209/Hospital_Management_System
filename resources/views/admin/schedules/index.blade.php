@extends('admin.layouts.index')
@section('title', 'Schedule')
@section('content')
@include('admin.breadcrumb')

    <div class="d-flex justify-content-end mb-3 align-items-center">
        <a href="{{ route('schedule.create') }}" class="btn btn-sm btn-primary mr-2">
            <i class="fa-solid fa-plus"></i> Add
        </a>
        <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Trash</a>
    </div>

{{--
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
                                    <td>{{ $doctor->department_id }}</td>
                                    <td>{{ $doctor->first_name }}
                                        {{ $doctor->middle_name }}
                                        {{ $doctor->last_name }}</td>
                                    <td>{{ $doctor->gender }}</td>
                                    <td>{{ $doctor->licence_no }}</td>
                                    <td>{{ $doctor->phone_num }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('doctor.show', $doctor->id) }}"
                                            class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" data-placement="top"
                                            title="View"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('doctor.edit', $doctor->id) }}"
                                            class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" data-placement="top"
                                            title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('doctor.destroy', $doctor->id) }}" method="POST">
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
        </div> --}}
@endsection
