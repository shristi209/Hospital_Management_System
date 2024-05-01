@extends('admin.layouts.index')
@section('title', 'Department')
@section('title_link', route('department.index'))
@section('action', 'View')
@section('content')
    @include('admin.breadcrumb')

    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <h4>{{ $departments->department_name }} Department

                    </h4>
                    <hr>
                    <p>Department Code: {{ $departments->department_code }}</p>
                    {!! $departments->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection
