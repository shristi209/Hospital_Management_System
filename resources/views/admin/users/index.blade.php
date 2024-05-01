@extends('admin.layouts.index')
@section('title', 'User')
@section('content')
@include('admin.breadcrumb')

    <div class="d-flex justify-content-end mb-3 align-items-center">
        <form action="{{ route('user.create') }}">
            <button type="submit" class="btn btn-sm btn-primary mr-2"><i class="fa-solid fa-plus"></i> Add </button>
        </form>
        <a href="{{ route('usertrash') }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Trash</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col" class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" data-placement="top" title="View"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mr-1"
                                                onclick="return confirm('Are you sure you want to delete this user?')" data-toggle="tooltip" data-placement="top"
                                                title="Delete"><i class="fa-solid fa-trash"></i></button>
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
