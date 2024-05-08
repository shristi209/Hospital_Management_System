@extends('admin.layouts.index')
@section('title', 'User')
@section('title_link', route('user.index'))
@section('content')

    @include('admin.breadcrumb')

    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">

                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name<span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" id="inputname" name="username"
                                    value="{{ old('username') }}">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email<span class="text-danger">*</span> </label>
                                <input type="email" class="form-control" id="inputEmail4" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Password<span class="text-danger">*</span> </label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Confirm Password<span class="text-danger">*</span> </label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control">
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="role">Role<span class="text-danger">*</span> </label>
                                <select name="role_id" class="form-select" id='roleid'>
                                    <option selected disabled>Select your role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }} <i
                                                class="fa-solid fa-trash"></i>
                                        </option>
                                    @endforeach
                                </select>
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
