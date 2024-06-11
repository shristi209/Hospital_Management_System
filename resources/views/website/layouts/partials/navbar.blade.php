@inject('menus','App\Helpers\MenuHelper' )

<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="frontend/images/logo.png" class="logo img-fluid" alt="">
            <span>
                CareSync
                <small>Non-profit Organization</small>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link click-scroll" href="#top">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Causes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_4">Volunteer</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link click-scroll dropdown-toggle" href="#section_5" id="navbarLightDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">News</a>

                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="news.html">News Listing</a></li>

                        <li><a class="dropdown-item" href="news-detail.html">News Detail</a></li>
                    </ul>
                </li> --}}

                @foreach ($menus->fetchMenus() as $menu)

                <li class="nav-item">
                    <a class="nav-link" href="{{ $menu->modal ? url($menu->modal->link) : ($menu->page ? url($menu->page->slug) : '') }}">{{$menu->menu[$locale]}}</a>
                    </li>
                @endforeach
                <li class="nav-item ms-3">
                    <a class="nav-link custom-btn custom-border-btn btn" href="/appointment">Book an Appointment</a>
                </li>
            </ul>
        </div>
    </div>
</nav>




{{--
<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="frontend/images/logo.png" class="logo img-fluid" alt="">
            <span>
                CareSync
                <small>Non-profit Organization</small>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @foreach ($menus as $menu)
                    <li class="nav-item {{ $menu->children->isEmpty() ? '' : 'dropdown' }}">
                        <a class="nav-link click-scroll {{ $menu->children->isEmpty() ? '' : 'dropdown-toggle' }}"
                            href="{{ $menu->link ?? ($menu->page ? url($menu->page->slug) : '#') }}"
                            id="navbarLightDropdownMenuLink"
                            role="button"
                            data-bs-toggle="{{ $menu->children->isEmpty() ? '' : 'dropdown' }}"
                            aria-expanded="false">
                            {{ $menu->menu['en'] }}
                        </a>
                        @if (!$menu->children->isEmpty())
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                @foreach ($menu->children as $child)
                                    <li><a class="dropdown-item" href="{{ $child->link ?? ($child->page ? url($child->page->slug) : '#') }}">{{ $child->menu['en'] }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach

                <li class="nav-item ms-3">
                    <a class="nav-link custom-btn custom-border-btn btn" href="/appointment">Book an Appointment</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}
