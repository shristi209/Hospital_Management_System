@extends('admin.layouts.index')
@section('title', 'User')
@section('title_link', route('user.index'))
@section('title_link', route('user.index'))
@section('action', 'Add')
@section('content')
@inject('role_helper', 'App\Helpers\RoleHelper')

    @include('admin.breadcrumb')

    <div class="card">
        <div class="row">
            <div class="col-lg-12">
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
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputName">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="inputName" name="username"
                                    value="{{ old('username') }}" placeholder="Enter full name">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="inputEmail" name="email"
                                    value="{{ old('email') }}" placeholder="Enter email address">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputPassword">Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Enter password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPasswordConfirmation">Confirm Password<span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" id="inputPasswordConfirmation"
                                    class="form-control" placeholder="Confirm password">
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('role_id', 'Role') !!}<span class="text-danger">*</span>
                                {!! Form::select('role_id[]', $role_helper->dropdown(), null, [
                                    'id' => 'role_id',
                                    'class' => 'js-example-basic-multiple form-control form-select',
                                    'placeholder' => 'Select Role',
                                    'multiple'=>"multiple",
                                ]) !!}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-5 mb-3">
                            <a href="{{ route('user.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
