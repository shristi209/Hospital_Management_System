@extends('admin.layouts.index')
@section('content')
@section('title', 'Department')
@section('title_link', route('department.index'))
@section('action', 'Edit')
@section('content')
    @include('admin.breadcrumb')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('department.update', $department->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="department_name">Department Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="department_name"
                                value="{{ $department->department_name }}" name="department_name">
                            @error('department_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="department_code">Department Code<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="department_code"
                                value="{{ $department->department_code }}" name="department_code">
                            @error('department_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="editor" rows="4" name="description">{{ $department->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('department.index', $department->id) }}"
                                class="btn btn-danger ml-3">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
