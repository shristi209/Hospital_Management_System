@extends('admin.layouts.index')
@section('title', 'Department')
@section('title_link', route('department.index'))
@section('action', 'Trash');
@section('content')

    @include('admin.breadcrumb')
    @foreach ($departments as $department)
        <div class="d-flex mr-3">
            <div class="card mw=100">
                <div class="card-body">
                    <h5 class="card-title">{{ $department->department_name }} Department</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Department Code: {{ $department->department_code }}</h6>
                    <p class="card-text">{!! Str::limit($department->description, 30) !!}</p>
                    <div class="d-flex justify-content-end mr-3">
                        <form action="{{ route('trashid', $department->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-primary mr-3" data-toggle="tooltip"
                                data-placement="top" title="Restore"><i class="fa-solid fa-trash-arrow-up "></i></button>
                        </form>
                        <form action="{{ route('trashdelete', $department->id) }}" method="POST">
                            @csrf
                            @method('Delete')
                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top"
                                title="Delete"
                                onclick="return confirm('Are you sure you want to delete this department?')"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
