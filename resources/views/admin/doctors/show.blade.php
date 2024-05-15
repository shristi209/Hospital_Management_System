@extends('admin.layouts.index')
@section('title', 'Doctor')
@section('title_link', route('doctor.index'))
@section('action', 'View')
@section('content')
    @include('admin.breadcrumb')

    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
            <div class="card border-0 shadow">
                <img src="{{ asset($doctor->photo) }}" alt="...">
                <div class="card-body p-1-9 p-xl-5">
                    <div class="mb-4">
                        <h3 class="h6 fw-bold mb-0">{{$doctor->first_name}} {{$doctor->middle_name}} {{$doctor->last_name}} </h3>
                        @foreach ($educations as $education)
                           |<span class="text-primary"> {{ $education->specialization }}</span>
                        @endforeach |
                    </div>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-3"><a href="#!"><i
                                    class="fas fa-mobile-alt display-25 me-3 text-secondary"></i>{{ $doctor->phone_num }}</a>
                        </li>
                        <li><a href="#!"><i
                                    class="fas fa-map-marker-alt display-25 me-3 text-secondary"></i>{{ $doctor->province->english_name }}
                                {{ $doctor->district->eng_district_name }}
                                {{ $doctor->municipality->nep_municipality_name }},
                                {{ $doctor->country->country_name }}</a></li>
                        <li><a href="#!"><i
                                    class="fas fa-map-marker-alt display-25 me-3 text-secondary"></i>
                                    {{$doctor->district->eng_district_name}}
                                {{ $doctor->municipality->nep_municipality_name }},
                                {{$doctor->country->country_name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="ps-lg-1-6 ps-xl-5">
                <div class="mb-5 wow fadeIn">
                    <div class="mb-5 wow fadeIn">
                        <div class="text-start mb-1-6 wow fadeIn">
                            <h2 class="h4 mb-0 text-primary">#About</h2>
                        </div>
                        <p>Hello! I'm Dr. {{$doctor->first_name}} {{$doctor->middle_name}} {{$doctor->last_name}} , a dedicated and experienced medical professional
                            committed to providing high-quality healthcare services. With a solid educational background
                            and extensive practical experience, I strive to deliver the best possible care to my
                            patients.</p>
                        <div class="text-start d-flex justify-content-between mb-1-6 wow fadeIn">
                            <h2 class="h4 text-primary">#Education</h2>
                           
                        </div>
                        <ul>
                            @foreach ($educations as $education)
                                <li>
                                    <strong>{{ $education->education_level }} in
                                        {{ $education->specialization }}</strong> - {{ $education->institute_name }},
                                    Graduated {{ $education->graduation_year_start_bs }}
                                </li>
                            @endforeach
                        </ul>
                        <div class="text-start d-flex justify-content-between mb-1-6 wow fadeIn">
                            <h3 class="h4 mb-0 text-primary">#Professional Experience</h3>
                           
                        </div>
                        <ul>
                            @foreach ($experiences as $experience)
                                <li>
                                    <strong>{{ $experience->organization_name }}</strong>
                                    ({{ $experience->org_start_bs }} - {{ $experience->org_end_bs }})
                                    <br>
                                    {!! $experience->description !!}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
               
                {{-- <div class="wow fadeIn">
                    <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="mb-0 text-primary">#Skills &amp; Experience</h2>
                    </div>
                    <p class="mb-4">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose.</p>
                    <div class="progress-style1">
                        <div class="progress-text">
                            <div class="row">
                                <div class="col-6 fw-bold">Wind Turbines</div>
                                <div class="col-6 text-end">70%</div>
                            </div>
                        </div>
                        <div class="custom-progress progress rounded-3 mb-4">
                            <div class="animated custom-bar progress-bar slideInLeft" style="width:70%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                        </div>
                        <div class="progress-text">
                            <div class="row">
                                <div class="col-6 fw-bold">Solar Panels</div>
                                <div class="col-6 text-end">90%</div>
                            </div>
                        </div>
                        <div class="custom-progress progress rounded-3 mb-4">
                            <div class="animated custom-bar progress-bar bg-secondary slideInLeft" style="width:90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                        </div>
                        <div class="progress-text">
                            <div class="row">
                                <div class="col-6 fw-bold">Hybrid Energy</div>
                                <div class="col-6 text-end">80%</div>
                            </div>
                        </div>
                        <div class="custom-progress progress rounded-3">
                            <div class="animated custom-bar progress-bar bg-dark slideInLeft" style="width:80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    </div>
@endsection
