@extends('admin.layouts.index')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4">
            <div class="card border-0 shadow">
                <img src="{{ asset($doctor->photo) }}" class="img-fluid rounded-top" alt="...">
                <div class="card-body ">
                    <div class="mb-4">
                        <h4 class=" mb-0">{{ $user->username }}</h4>
                        @foreach ($educations as $education)
                            |<span class="text-primary"> {{ $education->specialization }}</span>
                        @endforeach |
                    </div>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-3"><a href="#!"><i class="far fa-envelope me-3"></i> {{ $user->email }}</a>
                        </li>
                        <li class="mb-3"><a href="#!"><i
                                    class="fas fa-mobile-alt me-3"></i>{{ $doctor->phone_num }}</a>
                        </li>
                        <li><a href="#!"><i
                                    class="fas fa-map-marker-alt me-3"></i>{{ $doctor->province->english_name }}
                                {{ $doctor->district->eng_district_name }}
                                {{ $doctor->municipality->nep_municipality_name }},
                                {{ $doctor->country->country_name }}</a></li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">
                        <h4> Personal Information</h4>
                    </div>
                    <a href="{{ route('editprofile') }}" class="rounded-3" data-toggle="tooltip" data-placement="top"
                    title="Edit Profile"><i class="fa-solid fa-pen-to-square btn-outline-primary"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <ul>
                        <strong>
                            <li>  <p>Licence No:
                        </strong> {{ $doctor->licence_no }}</p>
                        <strong>
                            <li>  <p>DOB:
                        </strong> {{ $doctor->dob_ad }}</p>
                        <strong>
                            <li>  <p>Gender:
                        </strong> {{ $doctor->gender }}</p>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="card mt-3 shadow">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">
                        <h4> Education </h4>
                    </div>
                    <div>
                        <a href="{{ route('editeducation') }}" class="rounded-3"data-toggle="tooltip" data-placement="top"
                            title="Edit Education"><i class="fa-solid fa-pen-to-square btn-outline-primary"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <ul>
                        @foreach ($educations as $education)

                                <li>
                                    <strong>{{ $education->education_level }} in
                                        {{ $education->specialization }}</strong> - {{ $education->institute_name }},
                                    Graduated {{ $education->graduation_year_start_bs }}
                                </li> <br>

                        @endforeach
                    </ul>
                    </div>
                </div>
            </div>

            <div class="card mt-3 shadow">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">
                        <h4> Experience </h4>
                    </div>
                    <div>
                        <a href="{{ route('editexperience') }}" data-toggle="tooltip" data-placement="top"
                            title="Edit Experience"><i class="fa-solid fa-pen-to-square btn-outline-primary"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
            </div>
        </div>
    </div>
    </div>




    </div>
    </div>
@endsection
