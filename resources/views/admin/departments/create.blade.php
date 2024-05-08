@extends('admin.layouts.index')
@section('title', 'Department')
@section('title_link', route('department.index'))
@section('action', 'Add')
@section('content')
    @include('admin.breadcrumb')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('department.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="department_name">Department Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="department_name"
                                value="{{ old('department_name') }}" name="department_name" required>
                            @error('department_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="department_code">Department Code<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="department_code"
                                value="{{ old('department_code') }}" name="department_code" required>
                            @error('department_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description<span class="text-danger">*</span></label>
                            <textarea cols="30" id="editor" rows="4" name="description"
                                value="{{ old('description') }}"class="form-control"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between mt-3 mb-3">
                            <a href="{{ route('department.index') }}" class="btn btn-sm btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
