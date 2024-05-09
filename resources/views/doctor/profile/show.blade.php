@extends('admin.layouts.index')
@section('title', 'Profile')
@section('content')
    @include('admin.breadcrumb')

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{ asset($doctor->photo) }}" alt=""/>
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file"/>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-head">
                            <h5>
                                {{$user->username}} <a href="{{ route('editprofile') }}" class="btn btn-outline-primary btn-sm"data-toggle="tooltip" data-placement="top" title="Edit Profile"><i class="fa-regular fa-pen-to-square"></i></a>

                            </h5>
                            <h7 class="f-2">Licence No:
                               {{$doctor->licence_no}}
                            </h7>
                            {{-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> --}}
                    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                        <li class="nav-item d-flex">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Education</a>
                            <a href="{{ route('editeducation') }}" class="btn btn-sm"data-toggle="tooltip" data-placement="top" title="Edit Education"><i class="fa-regular fa-pen-to-square"></i></a>
                        </li>
                        <li class="nav-item d-flex justify-content-center">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Experience</a>
                            <a href="{{ route('editexperience') }}" class="btn btn-sm"data-toggle="tooltip" data-placement="top" title="Edit Experience"><i class="fa-regular fa-pen-to-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p><i class="fa-solid fa-mobile"></i> {{$doctor->phone_num}}<br>
                    <i class="fa-solid fa-envelope"></i> {{$user->email}}</p>
                    <p><i class="fa-regular fa-address-book"></i> Permanent Address<br>Province: {{$doctor->province->english_name}}<br>Dictrict: {{$doctor->district->eng_district_name}}<br> Municipality: {{$doctor->municipality->nep_municipality_name}}<br> Country: {{$doctor->country->country_name}}</p>
{{-- @dd($doctor->municipality_id==municipality) --}}

                    <p><i class="fa-regular fa-address-book"></i> Temporary Address<br>Country: {{$doctor_temp_province->english_name}}<br>Dictrict: {{$doctor_temp_district->eng_district_name}}<br> Municipality: {{$doctor_temp_municipality->nep_municipality_name}}<br> Country: {{$doctor_temp_country->country_name}}</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        @foreach($educations as $education)
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Institute Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{$education->institute_name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Degree</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>{{$education->education_level}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Specialization</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>{{$education->specialization}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Graduation Date</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>{{$education->graduation_year_start_bs}}</p>
                                    </div>
                                </div>
                                <hr>

                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @foreach($experiences as $experience)
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Organization Name</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>{{$experience->organization_name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Period</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>{{$experience->org_start_bs}}-{{$experience->org_end_bs}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Description</p>
                                    </div>
                                    <div class="col-md-8">
                                        {!!$experience->description!!}
                                    </div>
                                </div>
                                <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
