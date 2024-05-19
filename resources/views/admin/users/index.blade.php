@extends('admin.layouts.index')
@section('title', 'User')
@section('content')

    @can('create user')
        @section('add_button', route('user.create'))
    @endcan

    @can('user trash')
    @section('trash_button', route('usertrash'))
    @endcan
    @include('admin.breadcrumb')

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
                                    <td>
                                        @if ($user->roles->isNotEmpty())
                                            @foreach ($user->roles as $role)
                                                <label class="badge bg-primary">{{ $role->name }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        @can('view user')
                                            <a href="{{ route('user.show', $user->id) }}"
                                                class="btn btn-sm btn-outline-success mr-1" data-toggle="tooltip"
                                                data-placement="top" title="View"><i class="fa-solid fa-eye"></i></a>
                                        @endcan

                                        @can('edit user')
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-sm btn-outline-primary mr-1" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                        @endcan

                                        @can('delete user')
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger mr-1"
                                                    onclick="return confirm('Are you sure you want to delete this user?')"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                        class="fa-solid fa-trash "></i></button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
