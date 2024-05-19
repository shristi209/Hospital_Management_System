@extends('admin.layouts.index')
@section('content')
@section('title', 'User')
@section('title_link', route('user.index'))
@section('action', 'Edit')
@section('content')
@inject('role_helper', 'App\Helpers\RoleHelper')
@include('admin.breadcrumb')
    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row mb-3">
                            <div class="col ">
                                <label for="inputEmail4">User Name</label>
                                <input type="text" class="form-control" id="inputname" name="username"
                                    value="{{ $user->username }}">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col ">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email"
                                    value="{{ $user->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-4">
                                {!! Form::label('role_id', 'Role') !!}<span class="text-danger">*</span>
                                {!! Form::select('role_id[]', $role_helper->dropdown(), $user->roles->pluck('name', 'name')->all() , [
                                    'id' => 'role_id',
                                    'class' => 'js-example-basic-multiple form-control form-select',
                                    'placeholder' => 'Select Role',
                                    'multiple'=>"multiple",
                                ]) !!}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">

                            <a href="{{ route('user.index', $user->id) }}" class="btn btn-sm btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
