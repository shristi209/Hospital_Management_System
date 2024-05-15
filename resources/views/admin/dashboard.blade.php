@extends('admin.layouts.index')
@section('content')
<div id="content">

    <!-- Topbar -->
    {{-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button> --}}

        <!-- Topbar Search -->
        {{-- <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form> --}}

        <!-- Topbar Navbar -->
        {{-- <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Messages -->


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                    <img class="img-profile rounded-circle" src="{{asset('/backend/img/download.jpeg')}}" alt="logo">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    {{-- <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a> --}}
                    {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>  --}}

    
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>

        <!-- Content Row -->
        @if(Auth::check() && Auth::user()->role_id==1)
         <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Departments</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalDepartments}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-building fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Doctors</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalDoctors}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-user-doctor fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Appointments
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$totalAppointments}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Users</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalUsers}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(Auth::check() && Auth::user()->role_id==2)
         <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Schedules</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$schedule}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-calendar-days fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Appointments</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$appointment}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-calendar-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Appointments
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$totalAppointments}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Patients</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$patient}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5 wow fadeIn">
                    <div class="text-start mb-1-6 wow fadeIn">
                        <h4 class="h4 mt-3 mb-0 text-gray-800">Achievements</h4>

                    </div>
                    <div class="row mt-n4">
                        @foreach ($educations as $education)
                            <div class="col-sm-6 col-xl-4 mt-4">

                                <div class="card text-center border-0 rounded-3">
                                    <div class="card-body">
                                        <i class="ti-bookmark-alt icon-box medium rounded-3 mb-4"></i>
                                        <h3 class="h5 fw-bold mb-3">{{ $education->specialization }}</h3>
                                        <p class="mb-0">{{ $education->education_level }} in
                                            {{ $education->institute_name }}</p><br>
                                        <p>{{ $education->graduation_year_start_bs }} Graduate</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($experiences as $experience)
                            <div class="col-sm-6 col-xl-4 mt-4">
                                <div class="card text-center border-0 rounded-3">
                                    <div class="card-body">
                                        <i class="ti-medall-alt icon-box medium rounded-3 mb-4"></i>
                                        <h3 class="h5 mb-3">{{ $experience->organization_name }}</h3>
                                        <p class="mb-0">{!! $experience->description !!}</p>
                                        <p>{{ $experience->org_start_bs }}-{{ $experience->org_end_bs }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
        @endif

    </div>
    <!-- /.container-fluid -->
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

@endsection
