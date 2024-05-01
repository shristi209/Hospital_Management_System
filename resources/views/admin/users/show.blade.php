@extends('admin.layouts.index')
@section('title', 'User')
@section('title_link', route('user.index'))
@section('action', 'View')
@section('content')
    @include('admin.breadcrumb')
    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">

                    <h4> Details of {{ $user->username }} </h4><hr>
                    <p>Email: {{ $user->email }}</p>
                    <p>Role:{{ $user->role->name }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
