@extends('admin.layouts.index')
@section('title', 'Doctor')
@section('content')
@section('add_button', route('doctor.create'))
@section('trash_button', route('doctortrash'))
@include('admin.breadcrumb')
@inject('department_helper', 'App\Helpers\DepartmentHelper')
@inject('doctor_helper', 'App\Helpers\SpecializationHelpers')

{!! Form::open(['route' => 'doctorsearch', 'method' => 'get', 'class' => 'form-inline d-flex']) !!}
<div class="form-group col-4">
    {!! Form::select(
        'department_name',
        $department_helper->dropdown(),
        [],
        [
            'class' => 'form-select',
            'id' => 'department_name',
            'placeholder' => 'Search department',
        ],
    ) !!}
</div>

<div class="form-group col-4">
    {!! Form::select('specialization', $doctor_helper->dropdown(), null, [
        'class' => 'form-select',
        'id' => 'specialization',
        'placeholder' => 'Search specialization ',
    ]) !!}
</div>

<div class="form-group search-button col-4">
    {!! Form::text('search', null, [
        'class' => 'form-control mr-sm-2',
        'placeholder' => 'Search',

    ]) !!}

    {!! Form::button('<i class="fa-solid fa-magnifying-glass"></i>', [
        'class' => 'btn mr-1 btn-outline-primary btn-sm my-2 my-sm-0',
        'data-toggle'=>"tooltip",
        'aria-label' => 'Search',
        'data-toggle'=>'tooltip',
        'data-placement'=>'top',
        'title'=>'Search',
        'type'=>'submit',
    ]) !!}

    {!! Form::button('<i class="fa-solid fa-arrow-rotate-left"></i>', [
        'class' => 'btn btn-sm btn-outline-danger my-2 my-sm-0',
        'onclick' => 'window.location.href="'.url('/doctor').'"',
        'aria-label' => 'Search',
        'data-toggle'=>"tooltip",
        'data-placement'=>"top",
        'title'=>"Reset",
    ]) !!}
</div>
{!! Form::close() !!}

<div class="card mt-3">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Department</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Licence</th>
                            <th scope="col">Phone</th>
                            <th scope="col" class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $doctor->department->department_name }}</td>
                                <td>{{ $doctor->first_name }}
                                    {{ $doctor->middle_name }}
                                    {{ $doctor->last_name }}</td>
                                <td>{{ $doctor->gender }}</td>
                                <td>{{ $doctor->licence_no }}</td>
                                <td>{{ $doctor->phone_num }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('doctor.show', $doctor->id) }}"
                                        class="btn btn-sm btn-outline-success mr-1" data-toggle="tooltip" data-placement="top"
                                        title="View"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('doctor.edit', $doctor->id) }}"
                                        class="btn btn-sm btn-outline-primary mr-1" data-toggle="tooltip" data-placement="top"
                                        title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <form action="{{ route('doctor.destroy', $doctor->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger mr-1"
                                            onclick="return confirm('Are you sure you want to delete this user?')"
                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{$doctors->links()}} --}}
            </div>
        </div>
    </div>
</div>
@endsection
