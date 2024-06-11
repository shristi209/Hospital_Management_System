@extends('admin.layouts.index')
@section('content')
    @inject('department_helper', 'App\Helpers\DepartmentHelper')
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
            @if (Auth::check() && Auth::user()->hasRole(['super-admin', 'admin']))
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Departments</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDepartments }}</div>
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
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDoctors }}</div>
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
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    {{ $totalAppointments }}</div>
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
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
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

            @if (Auth::check() && Auth::user()->hasRole('doctor'))
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Schedules</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $schedule }}</div>
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
                                            Approved Appointments</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $approvedappointment }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-calendar-check fa-2x text-gray-300"></i>
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
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending
                                            Appointments
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    {{ $pendingappointment }}</div>
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
                                            Patients</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $patient }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-solid fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header d-flex justify-content-between">
                                <div class="iq-card-title">
                                    <h4> New Appointments</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Patient</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Timing</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">Pending</th>
                                                <th scope="col">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($appointments as $appointment)
                                                <tr>
                                                    <td>{{ $appointment->patient->full_name }} </td>
                                                    <td>{{ $appointment->schedule->schedule_date }}</td>
                                                    <td>{{ $appointment->time_interval }}</td>
                                                    <td>{{ $appointment->patient->phone }}</td>
                                                    <td>
                                                        @if ($appointment->status == 'pending')
                                                            <div class="dropdown">
                                                                <button
                                                                    class="btn btn-outline-primary badge dropdown-toggle"
                                                                    type="button" id="approvalDropdown"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    Pending
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="approvalDropdown">
                                                                    {!! Form::open(['route' => ['statusupdate', $appointment->id], 'method' => 'POST']) !!}
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    {!! Form::button('Approved', [
                                                                        'type' => 'submit',
                                                                        'class' => 'dropdown-item',
                                                                        'name' => 'status',
                                                                        'value' => 'approved',
                                                                    ]) !!}
                                                                    {!! Form::close() !!}

                                                                    {!! Form::open(['route' => ['statusupdate', $appointment->id], 'method' => 'POST']) !!}
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    {!! Form::button('Cancel', [
                                                                        'type' => 'submit',
                                                                        'class' => 'dropdown-item',
                                                                        'name' => 'status',
                                                                        'value' => 'cancel',
                                                                    ]) !!}
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        @elseif($appointment->status == 'approved')
                                                            <span class="badge bg-success">Approved</span>
                                                        @else
                                                            <span class="badge bg-danger">Cancelled</span>
                                                        @endif

                                                        <script>
                                                            function submitForm() {
                                                                document.getElementById('statusForm').submit();
                                                            }
                                                        </script>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('doctorappointment.show', $appointment->id) }}"
                                                            class="btn btn-sm btn-outline-success mr-1"
                                                            data-toggle="tooltip" data-placement="top" title="View"><i
                                                                class="fa-solid fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endif
        {!! Form::open(['url' => '/graph', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mt-3 d-flex">
                    <div class="card-header mb-4 d-flex justify-content-between" style="min-height:76px">
                        <div class="iq-card-title col-4">
                            <h5> Doctor Based Patients</h5>
                        </div>
                        <div class="d-flex col-8" style="flex:auto">
                            <div class="col">
                                {!! Form::label('department_id', 'Department') !!}
                                {!! Form::select('department_id', $department_helper->dropdown(), null, [
                                    'required',
                                    'placeholder' => 'Select by department',
                                ]) !!}
                            </div>
                            <div class="col">
                                {!! Form::label('start_date', 'From') !!}
                                {!! Form::date('start_date', null, [
                                    'required',
                                ]) !!}
                            </div>
                            <div class="col">
                                {!! Form::label('end_date', 'To') !!}
                                {!! Form::date('end_date', null, ['class' => '', 'required']) !!}
                            </div>
                            <div class="d-flex justify-content-center align-items-end">
                                {!! Form::submit('Send', ['class' => 'btn btn-outline-primary btn-sm']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <canvas id="myChart" class=""></canvas>

                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('myChart');
            const doctor_names = @json(session('doctor_name' ?? []));
            const patient_count = @json(session('patient_count' ?? []));

            console.log(doctor_names);
            console.log(patient_count);
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: doctor_names,
                    datasets: [{
                        label: 'Number of Patient visited by doctor',
                        data: patient_count,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,

                            title: {
                                display: true,
                                text: 'Number of Patient',
                                padding: {
                                    top: 10,
                                    bottom: 30
                                },
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }

                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Doctor Names',
                                padding: {
                                    top: 10,
                                    bottom: 30
                                },
                                font: {
                                    size: 14,
                                    weight: 'bold'
                                }
                            }
                        }

                    }

                }
            });
        </script>
        <p></p>
        {{-- <div class="d-flex">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Direct
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Social
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Referral
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /.container-fluid -->
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

@endsection
