@extends('admin.layouts.index')
@section('title', 'Doctor')
@section('title_link', route('doctor.index'))
@section('action', 'View')
@section('content')
    @include('admin.breadcrumb')
    <div class="card">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-body">
                    <img class="card-img-top mb-3" src="..." alt="Doctor Image">
                    <h5 class="card-title">{{$doctor->first_name}} {{$doctor->middle_name}} {{$doctor->last_name}}</h5>
                    <p class="card-text">
                        Licence No: {{$doctor->licence_no}}<br>
                        Phone No: {{$doctor->phone_num}}<br>
                        Gender: {{$doctor->gender}}<br>
                        Address: {{$doctor->address}}
                    </p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card-body">
                    <h4>Education</h4>
                    <ul class="list-group">
                        @foreach($educations as $education)
                            <li class="list-group-item">
                                {{$education->institute_name}}, {{$education->specialization}},
                                {{$education->graduation_year_start_bs}} - {{$education->graduation_year_start_ad}}
                            </li>
                        @endforeach
                    </ul>
                    <h4 class="mt-4">Experiences</h4>
                    <ul class="list-group">
                        @foreach($experiences as $experience)
                            <li class="list-group-item">
                                {{$experience->organization_name}},
                                {{$experience->org_start_bs}} - {{$experience->org_end_bs}},
                                {{$experience->description}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
