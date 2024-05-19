<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    {{-- <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-sm btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" title="Notifications">
                <i class="fas fa-solid fa-bell"></i>
                <!-- Counter - Messages -->
                @if(auth()->user()->doctor)
                    <span class="badge badge-danger badge-counter">{{ auth()->user()->doctor->unreadNotifications->count() }}</span>
                @else
                    <span class="badge badge-danger badge-counter"></span>
                @endif
            </a>

            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <div class="dropdown-header d-flex justify-content-between align-items-center">
                <h6 class="">
                    Message Center
                </h6>
                <form action="{{ route('notifications.markAllAsRead') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm  btn-outline-light" data-toggle="tooltip" data-placement="top" title="Mark all as read"><i class="fa-brands fa-readme"></i></button>
                </form>
            </div>
            @if(auth()->user()->doctor)
                @foreach (auth()->user()->doctor->notifications as $notification)
                @if ($notification->read_at === null)
                <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="" alt="...">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">{{ $notification->data['message'] }}</div>
                            <div class="small text-gray-500">{{ $notification->data['type'] }} · {{ $notification->created_at->diffForHumans() }}</div>
                        </div>
                    </a>
                    @endif
                @endforeach

                {{-- <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a> --}}
            @endif
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(Auth::check() && Auth::user()->role_id == 1)

                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                @endif
                
                @if(Auth::check() && Auth::user()->role_id == 2)
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Doctor</span>
                @endif

                @if(Auth::check() && Auth::user()->role_id == 6)
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Super-Admin</span>
                @endif
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
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
