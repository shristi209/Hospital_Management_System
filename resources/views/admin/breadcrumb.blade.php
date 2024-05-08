<nav aria-label="breadcrumb" class="bg-transparent">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb d-flex justify-content-between align-items-center"style="padding: 0.5rem 8px; ">
                <div class="d-flex">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #007bff;">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="@yield('title_link', '#')" style="color: {{ empty($__env->yieldContent('action')) ? '#6c757d' : '#007bff' }};">@yield('title')</a></li>
                    @hasSection('action')
                        <li class="breadcrumb-item active" aria-current="page" style="color: #6c757d;">@yield('action')</li>
                    @endif
                </div>
                <div class="ml-2">
                    @hasSection('add_button')
                        <a href="@yield('add_button', '#')" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-plus"></i> Add
                        </a>
                    @endif

                    @hasSection('trash_button')
                        <a href="@yield('trash_button', '#')" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i> Trash
                        </a>
                    @endif
                </div>
            </ol>
        </div>
    </div>
</nav>
