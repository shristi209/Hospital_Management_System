<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-hospital"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CareSync</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if (Auth::check() && Auth::user()->hasAnyRole(['super-admin', 'admin']))
        <li class="nav-item {{ Request::routeIs('user*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fa-solid fa-user"></i>
                <span>User</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('department*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('department.index') }}">
                <i class="fa-solid fa-building"></i>
                <span>Department</span>
            </a>
        </li>
        <li class="nav-item {{ Request::routeIs('doctor*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('doctor.index') }}">
                <i class="fa-solid fa-user-doctor"></i>
                <span>Doctor</span>
            </a>
        </li>
        <li class="nav-item {{ Request::routeIs('schedule*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('schedule.index') }}">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Schedule</span>
            </a>
        </li>
        <li class="nav-item {{ Request::routeIs('page*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('page.index') }}">
                <i class="fa-regular fa-file"></i>
                <span>Page</span>
            </a>
        </li>
        <li class="nav-item {{ Request::routeIs('menu*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('menu.index') }}">
                <i class="fa-solid fa-bars"></i>
                <span>Menu</span>
            </a>
        </li>
    @endif
    @if (Auth::check() && Auth::user()->hasRole('super-admin'))
        <li class="nav-item {{ Request::routeIs('role*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('role.index') }}">
                <i class="fa-solid fa-user-lock"></i>
                <span>Roles & Permissions</span>
            </a>
        </li>
    @endif

    @if (Auth::check() && Auth::user()->hasRole('doctor'))
        <li class="nav-item {{ Request::routeIs('doctorprofile*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('doctorprofile') }}">
                <i class="fa-solid fa-user"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="nav-item {{ Request::routeIs('doctorschedule*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('doctorschedule.index') }}">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Schedule</span>
            </a>
        </li>

        <li class="nav-item {{ Request::routeIs('doctorappointment*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('doctorappointment.index') }}">
                <i class="fa-solid fa-calendar-check"></i>
                <span>Appointment</span>
            </a>
        </li>
    @endif

    <hr class="sidebar-divider">
    <li class="nav-item ">
        <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
            <i class="fa-solid fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
    {{-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="buttons.html"></a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div> --}}
    {{-- </li> --}}

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> --}}

    {{-- <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    {{-- <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="backend/img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>
