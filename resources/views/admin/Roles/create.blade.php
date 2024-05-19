@extends('admin.layouts.index')
@section('title', 'Role')
@section('content')
    @include('admin.breadcrumb')

    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open(['route' => 'role.store', 'method' => 'POST']) !!}
                @csrf
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

                    <div class="form-row ">
                        <div class="col-4">
                            {!! Form::label('name', 'Role Name') !!}

                            {!! Form::text('name', null, [
                                'id' => 'name',
                                'class' => 'form-control',
                                'placeholder' => 'Enter role',
                            ]) !!}
                            <div class=" d-flex justify-content-end mt-3">
                                {!! Form::button('Submit', [
                                    'type' => 'submit',
                                    'id' => 'submit',
                                    'class' => 'btn btn-sm btn-primary',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
