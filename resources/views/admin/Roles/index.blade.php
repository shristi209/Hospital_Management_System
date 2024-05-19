@extends('admin.layouts.index')
@section('title', 'Role')
@can('create role')
    @section('add_button', route('role.create'))
@endcan
        @section('content')
            @include('admin.breadcrumb')

            <div class="card mt-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">S.N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Permission</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td class="d-flex">
                                            @can('edit role')
                                                <a href="{{ route('role.edit', $role->id) }}"
                                                    class="btn btn-sm btn-outline-primary mr-1" data-toggle="tooltip"
                                                    data-placement="top" title="Give Permission">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                            @endcan
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
