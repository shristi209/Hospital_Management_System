<nav aria-label="breadcrumb" class="mt-3">
    <div class="row">
        <div class="col-lg-12"> 
            <ol class="breadcrumb d-flex" style="font-size: 1.1rem;">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #007bff;">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="@yield('title_link', '#')" style="color: #007bff;">@yield('title')</a></li>
                @hasSection('action')
                    <li class="breadcrumb-item active" aria-current="page" style="color: #517fb0;">@yield('action')</li>
                @endif
            </ol>
        </div>
    </div>
</nav>
