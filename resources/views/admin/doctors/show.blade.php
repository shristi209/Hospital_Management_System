@extends('admin.layouts.index')
@section('title', 'Doctor')
@section('title_link', route('doctor.index'))
@section('action', 'View')
@section('content')
    @include('admin.breadcrumb')

<div class="container emp-profile">
    <form method="post">
        <div class="card">
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
            <div class="col-md-6">


            <h4>{{$doctor->first_name}} {{$doctor->middle_name}} {{$doctor->last_name}}    </h4>                        </h5>
                            {{-- <h7>Id:
                               {{$doctor->id}}
                            </h7><br> --}}
                            <h7>Licence No:
                                {{$doctor->licence_no}}
                            </h7>
                            {{-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> --}}
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Experience</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p><i class="fa-solid fa-mobile"></i> {{$doctor->phone_num}}<br>
                    <p><i class="fa-regular fa-address-book"></i> Permanent Address<br>Province: {{$doctor->province->english_name}}<br>Dictrict: {{$doctor->district->eng_district_name}}<br> Municipality: {{$doctor->municipality->nep_municipality_name}}<br> Country: {{$doctor->country->country_name}}</p>
                    {{-- <p><i class="fa-regular fa-address-book"></i> Temporary Address<br>Province: {{$doctor->temp_country_id->name}}<br>Dictrict: {{$doctor->district->eng_district_name}}<br> Municipality: {{$doctor->municipality->nep_municipality_name}}<br> Country: {{$doctor->country->country_name}}</p> --}}
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        @foreach($educations as $education)
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Institute Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p> {{$education->institute_name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Degree</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$education->education_level}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Specialization</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$education->specialization}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Graduation Date</label>
                                    </div>
                                    <div class="col-md-6">
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
                                        <label>Organization Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$experience->organization_name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Period</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$experience->org_start_bs}}-{{$experience->org_end_bs}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Description</label>
                                    </div>
                                    <div class="col-md-6">
                                        {!!$experience->description!!}
                                    </div>
                                </div>
                                <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
