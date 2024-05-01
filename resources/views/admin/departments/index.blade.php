@extends('admin.layouts.index')
@section('title', 'Department')
@section('title_link', route('department.index'))
@section('content')

    @include('admin.breadcrumb')

    <div class="d-flex justify-content-end mb-3 align-items-center">
        <form action="{{ route('department.create') }}">
            <button type="submit" class="btn btn-sm btn-primary mr-2"><i class="fa-solid fa-plus"></i> Add </button>
        </form>
        <a href="{{ route('departmenttrash') }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Trash</a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Description</th>
                                <th scope="col" class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <style>
                                td.actionbtn a {
                                    margin-bottom: 5px;
                                    margin-top: 4px;
                                    margin-left: 3px;
                                }
                            </style>
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $department->department_name }}</td>
                                    <td>{{ $department->department_code }}</td>
                                    <td>{!! Str::limit($department->description, 30) !!}</td>
                                    <td class="d-flex actionbtn">
                                        <a data-toggle="tooltip" data-placement="top" title="View"
                                            href="{{ route('department.show', $department->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fa-solid fa-eye"></i></a>
                                        <a data-toggle="tooltip" data-placement="top"
                                            href="{{ route('department.edit', $department->id) }}"
                                            class="btn btn-sm btn-primary" title="Edit"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('department.destroy', $department->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this department?')"
                                                data-toggle="tooltip" data-placement="top" title="Delete"
                                                style="margin-top:4px; margin-left:3px;"><i
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
    </div>
@endsection
