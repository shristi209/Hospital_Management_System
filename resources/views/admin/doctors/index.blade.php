@extends('admin.layouts.index')
@section('title', 'Doctor')
@section('title_link', route('doctor.index'))
@section('content')

@include('admin.breadcrumb')
    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-header">
                    <div class="heading" style="display: flex; justify-content: space-between">
                        <h5 class="card-title">Doctors</h5>
                        <form action="{{ route('doctor.create') }}">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Add</button></div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
@endsection
