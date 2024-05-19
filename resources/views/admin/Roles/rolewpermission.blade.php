@extends('admin.layouts.index')
@section('title', 'Role')
@section('title_link', route('role.index'))
@section('action', 'Edit')
@section('content')
    @include('admin.breadcrumb')
    @inject('doctor_name', 'App\Helpers\DoctorHelper')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mt-1">Role: {{ $role->name }}</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['route' => ['role.update', $role->id], 'method' => 'POST']) !!}
            @csrf
            @method('PUT')
            <div class="container">
                <div class="row">
                    @foreach ($permissions as $index => $permission)
                        <div class="col-md-3">
                            <div class="form-check">
                                {!! Form::checkbox(
                                    'permission[]',
                                    $permission->name,
                                    in_array($permission->name, $role->permissions->pluck('name')->toArray()),
                                    ['class' => 'form-check-input', 'id' => 'permission_' . $index],
                                ) !!}
                                {!! Form::label('permission_' . $index, $permission->name, ['class' => 'form-check-label']) !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class=" d-flex justify-content-end mt-3">
                {!! Form::button('Update', [
                    'type' => 'submit',
                    'id' => 'submit',
                    'class' => 'btn btn-sm btn-primary',
                ]) !!}
            </div>
        </div>
    </div>


@endsection
