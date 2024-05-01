@extends('admin.layouts.index')
@section('content')
@section('title', 'User')
@section('title_link', route('user.index'))
@section('action', 'Trash');
@section('content')

@include('admin.breadcrumb')
@foreach($users as $user)
<div class="d-flex mr-3">
<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{ $user->Username }} User</h5>
      <h6 class="card-subtitle mb-2 text-muted">User Role: {{ $user->role->name }}</h6>
      <p class="card-text">Email:{{$user->email}}</p>
      <div class="d-flex justify-content-end" >
        <form action="{{ route('trashuser', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit"  class="btn btn-primary btn-sm mr-3"><i class="fa-solid fa-trash-arrow-up" data-toggle="tooltip" data-placement="top" title="Restore"></i></button>
        </form>
        <form action="{{ route('trashdeleteuser', $user->id) }}" method="POST">
            @csrf
            @method('Delete')
            <button type="submit"  class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete this department?')" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa-solid fa-trash"></i></button>
        </form>
    </div>
    </div>
  </div>
</div>
  @endforeach
@endsection
