@extends('admin.layouts.index')
@section('title', 'Doctor')
@section('title_link', route('doctor.index'))
@section('action', 'View')
@section('content')
    @include('admin.breadcrumb')
    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                              {{$doctor->first_name}} {{$doctor->middle_name}} {{$doctor->last_name}}
                              <div class="card-text">
                                <p>Licence No: {{$doctor->licence_no}}<br>
                                Phone No: {{$doctor->phone_num}}<br>
                                Gender: {{$doctor->gender}}</p>

                              </div>
                            </div>
                          </div>
                    </div>


@endsection
