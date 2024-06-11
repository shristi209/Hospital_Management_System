@extends('website.layouts.index')
@section('content')
    @inject('menus', 'App\Helpers\MenuHelper')
    @inject('pages', 'App\Helpers\PageHelper')
    @inject('doctors', 'App\Helpers\DoctorHelper')
    <main>
        <style>
            .h4 {
                color: var(--secondary-color);
            }
        </style>

        <section class="hero-section hero-section-full-height">
            <div class="container-fluid">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-lg-12 col-12 p-0">

                        <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <img src="frontend/images/slide/slider3.jpg" class="carousel-image img-fluid"
                                        alt="...">

                                    @foreach ($menus->fetchMenus() as $menu)
                                        @if (optional($menu->page)->content && isset($menu->page->content[$locale]))
                                            @if ($menu->page->slug == 'home')
                                                <div class="carousel-caption d-flex flex-column justify-content-start">
                                                    <h2>{{ trans('messages.welcome') }}</h2>
                                                    <p>{{trans('messages.services')}}</p>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>

                                {{-- <div class="carousel-item">
                                    <img src="frontend/images/slide/slider.jpg" class="carousel-image img-fluid"
                                        alt="...">
                                </div>

                                <div class="carousel-item">
                                    <img src="frontend/images/slide/slider.jpg" class="carousel-image img-fluid"
                                        alt="...">
                                </div> --}}
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#hero-slide"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>



        <section class="section-padding section-bg" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 text-center mx-auto">

                        <h4 clas="mb-2">{{ trans('messages.second') }}
                        </h4>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="#section_3" class="d-block">
                                <img src="{{ asset('frontend/images/facility-icon1.png') }}"
                                    class="featured-block-image img-fluid w-25" alt="">
                                <p class="featured-block-text">{{ trans('messages.doctor') }}</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="/appointment" class="d-block">
                                <img src="{{ asset('frontend/images/facility-icon2.png') }}"
                                    class="featured-block-image img-fluid w-25" alt="">

                                <p class="featured-block-text">{{ trans('messages.appointment') }}</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="donate.html" class="d-block">
                                <img src="{{ asset('frontend/images/facility-icon3.png') }}"
                                    class="featured-block-image img-fluid w-25" alt="">

                                <p class="featured-block-text">{{ trans('messages.department') }}</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="#section_6" class="d-block">
                                <img src="{{ asset('frontend/images/facility-icon4.png') }}"
                                    class="featured-block-image img-fluid w-25" alt="">

                                <p class="featured-block-text">{{ trans('messages.inquiry') }}</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        {{-- department --}}
        {{-- our story --}}


        {{-- single person description --}}

        {{-- <section class="about-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-5 col-12">
                        <img src="frontend/images/portrait-volunteer-who-organized-donations-charity.jpg"
                            class="about-image ms-lg-auto bg-light shadow-lg img-fluid" alt="">
                    </div>

                    <div class="col-lg-5 col-md-7 col-12">
                        <div class="custom-text-block">
                            <h4 class="mb-0">Sandy Chan</h4>

                            <p class="text-muted mb-lg-4 mb-md-4">Co-Founding Partner</p>

                            <p>Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito Professional
                                charity theme based</p>

                            <p>You are not allowed to redistribute this template ZIP file on any other template collection
                                website. Please contact TemplateMo for more information.</p>

                            <ul class="social-icon mt-4">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-instagram"></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section> --}}

        {{-- <section class="cta-section section-padding section-bg">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <div class="col-lg-5 col-12 ms-auto">
                        <h4 class="mb-0">Make an impact. <br> Save lives.</h4>
                    </div>

                    <div class="col-lg-5 col-12">
                        <a href="#" class="me-4">Make a donation</a>

                        <a href="#section_4" class="custom-btn btn smoothscroll">Become a volunteer</a>
                    </div>

                </div>
            </div>
        </section> --}}

        {{-- doctors --}}
        <section class="section-padding" id="section_3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center mb-4">
                        <h4>{{ trans('messages.specialist') }}</h4>
                        <p>{{ trans('messages.doc-content') }}</p>
                    </div>

                    @foreach ($doctors->fetchDoctors() as $doctor)
                        @if ($doctor->photo != null)
                            <div class="col-lg-3">
                                <div class="custom-block-wrap mb-3">
                                    <img src="{{ asset($doctor->photo) }}" class="custom-block-image img-fluid"
                                        alt="">
                                    <div class="custom-block">
                                        <div class="custom-block-body">
                                            <h6 class="mb-3">{{ $doctor->first_name }} {{ $doctor->middle_name }}
                                                {{ $doctor->last_name }}</h6>


                                            <p>{{ $doctor->phone_num }}</p>
                                            <p>{{ $doctor->education[0]->specialization }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{-- <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                            <div class="custom-block-wrap">
                                <img src="frontend/images/causes/poor-child-landfill-looks-forward-with-hope.jpg"
                                    class="custom-block-image img-fluid" alt="">

                                <div class="custom-block">
                                    <div class="custom-block-body">
                                        <h6 class="mb-3">Poverty Development</h6>

                                        <p>Sed leo nisl, posuere at molestie ac, suscipit auctor mauris. Etiam quis metus
                                            tempor
                                        </p>

                                        <div class="progress mt-4">
                                            <div class="progress-bar w-50" role="progressbar" aria-valuenow="50"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <div class="d-flex align-items-center my-2">
                                            <p class="mb-0">
                                                <strong>Raised:</strong>
                                                $27,600
                                            </p>

                                            <p class="ms-auto mb-0">
                                                <strong>Goal:</strong>
                                                $60,000
                                            </p>
                                        </div>
                                    </div>

                                    <a href="donate.html" class="custom-btn btn">Donate now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="custom-block-wrap">
                                <img src="frontend/images/causes/african-woman-pouring-water-recipient-outdoors.jpg"
                                    class="custom-block-image img-fluid" alt="">

                                <div class="custom-block">
                                    <div class="custom-block-body">
                                        <h6 class="mb-3">Supply drinking water</h6>

                                        <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                                        </p>

                                        <div class="progress mt-4">
                                            <div class="progress-bar w-100" role="progressbar" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <div class="d-flex align-items-center my-2">
                                            <p class="mb-0">
                                                <strong>Raised:</strong>
                                                $84,600
                                            </p>

                                            <p class="ms-auto mb-0">
                                                <strong>Goal:</strong>
                                                $100,000
                                            </p>
                                        </div>
                                    </div>

                                    <a href="donate.html" class="custom-btn btn">Donate now</a>
                                </div>
                            </div>
                        </div> --}}

                </div>
            </div>
        </section>
        {{-- about us --}}
        {{-- @dd($locale,app()->getLocale()) --}}
        <section class="volunteer-section section-padding" id="section_4">
            <div class="container">
                <div class="row">
                    @foreach ($pages->fetchPages() as $page)
                        @if ($page->slug == 'about')
                            <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                                <img src="{{ $page->image }}" class="custom-text-box-image img-fluid" alt="">
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="custom-text-box">
                                    <h4 class="mb-2">{{ $page->title[$locale] }}</h4>

                                    <h6 class="mb-3">{{ $page->content[$locale] }}</h6>

                                    <p class="mb-0">{{ trans('messages.services') }}</p>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="custom-text-box mb-lg-0">
                                            <h6 class="mb-3">{{ trans('messages.mission') }}</h6>

                                            <p>{{ trans('messages.mission-content') }}</p>

                                            <ul class="custom-list mt-2">
                                                <li class="custom-list-item d-flex">
                                                    <i class="bi-check custom-text-box-icon me-2"></i>
                                                    {{ trans('messages.mission-1') }}
                                                </li>

                                                <li class="custom-list-item d-flex">
                                                    <i class="bi-check custom-text-box-icon me-2"></i>
                                                    {{ trans('messages.mission-2') }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0">
                                            <div class="counter-thumb">
                                                <div class="d-flex">
                                                    <span class="counter-number" data-from="1"
                                                        data-to="{{ $doctor->count() }}" data-speed="1000"></span>
                                                    <span class="counter-number-text"></span>
                                                </div>

                                                <span class="counter-text">{{ trans('messages.specialist') }}</span>
                                            </div>

                                            <div class="counter-thumb mt-4">
                                                <div class="d-flex">
                                                    <span class="counter-number" data-from="1" data-to="30"
                                                        data-speed="1000"></span>
                                                </div>

                                                <span class="counter-text">{{ trans('messages.patient') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </section>


        <section class="news-section section-padding" id="section_5">
            <div class="container">
                <div class="row">
                    @foreach ($pages->fetchPages() as $page)
                        @if ($page->slug == 'services')
                            <div class="col-lg-12 col-12 mb-5">
                                <h4>{{ $page->title[$locale] }}</h4>
                                <p>{{ trans('messages.services-name') }}</p>

                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="news-block">
                                    <div class="news-block-top">
                                        <a href="news-detail.html">
                                            <img src="frontend/images/gallery-4.jpg" class="news-image img-fluid"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12 mx-auto">
                                <form class="custom-form search-form" action="#" method="get" role="form">
                                    <input name="search" type="search" class="form-control" id="search"
                                        placeholder="Search" aria-label="Search">

                                    <button type="submit" class="form-control">
                                        <i class="bi-search"></i>
                                    </button>
                                </form>

                                <h6 class="mt-5 mb-3">{{ $page->content[$locale] }}</h6>

                                <div class="news-block news-block-two-col d-flex mt-4">
                                    <div class="news-block-two-col-image-wrap">
                                        <a href="news-detail.html">
                                            <img src="frontend/images/gallery-4.jpg" class="news-image img-fluid"
                                                alt="">
                                        </a>
                                    </div>

                                    <div class="news-block-two-col-info">
                                        <div class="news-block-title mb-2">
                                            <h6><a href="news-detail.html"
                                                    class="news-block-title-link">{{ trans('messages.services-1') }}</a>
                                            </h6>
                                        </div>

                                        <div class="news-block-date">
                                            <p>
                                                {{ trans('messages.services-1-a') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="news-block news-block-two-col d-flex mt-4">
                                    <div class="news-block-two-col-image-wrap">
                                        <a href="news-detail.html">
                                            <img src="frontend/images/news/close-up-happy-people-working-together.jpg"
                                                class="news-image img-fluid" alt="">
                                        </a>
                                    </div>

                                    <div class="news-block-two-col-info">
                                        <div class="news-block-title mb-2">
                                            <h6><a href="news-detail.html"
                                                    class="news-block-title-link">{{ trans('messages.services-2') }}</a>
                                            </h6>
                                        </div>

                                        <div class="news-block-date">
                                            <p>
                                                {{ trans('messages.services-2-a') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                {{--
                                <form class="custom-form subscribe-form" action="#" method="get" role="form">
                                    <h6 class="mb-4">Newsletter Form</h6>

                                    <input type="email" name="subscribe-email" id="subscribe-email"
                                        pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address"
                                        required>

                                    <div class="col-lg-12 col-12">
                                        <button type="submit" class="form-control">Subscribe</button>
                                    </div>
                                </form> --}}
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </section>


        <section class="testimonial-section section-padding section-bg">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h4 class="mb-lg-3">Happy Customers</h4>

                        <div id="testimonial-carousel" class="carousel carousel-fade slide" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="carousel-caption">
                                        <h4 class="carousel-title">Lorem Ipsum dolor sit amet, consectetur adipsicing
                                            kengan omeg kohm tokito charity theme</h4>

                                        <small class="carousel-name"><span class="carousel-name-title">Maria</span>,
                                            Boss</small>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="carousel-caption">
                                        <h4 class="carousel-title">Sed leo nisl, posuere at molestie ac, suscipit auctor
                                            mauris quis metus tempor orci</h4>

                                        <small class="carousel-name"><span class="carousel-name-title">Thomas</span>,
                                            Partner</small>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="carousel-caption">
                                        <h4 class="carousel-title">Lorem Ipsum dolor sit amet, consectetur adipsicing
                                            kengan omeg kohm tokito charity theme</h4>

                                        <small class="carousel-name"><span class="carousel-name-title">Jane</span>,
                                            Advisor</small>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="carousel-caption">
                                        <h4 class="carousel-title">Sed leo nisl, posuere at molestie ac, suscipit auctor
                                            mauris quis metus tempor orci</h4>

                                        <small class="carousel-name"><span class="carousel-name-title">Bob</span>,
                                            Entreprenuer</small>
                                    </div>
                                </div>

                                <ol class="carousel-indicators">
                                    <li data-bs-target="#testimonial-carousel" data-bs-slide-to="0" class="active">
                                        <img src="frontend/images/avatar/portrait-beautiful-young-woman-standing-grey-wall.jpg"
                                            class="img-fluid rounded-circle avatar-image" alt="avatar">
                                    </li>

                                    <li data-bs-target="#testimonial-carousel" data-bs-slide-to="1" class="">
                                        <img src="frontend/images/avatar/portrait-young-redhead-bearded-male.jpg"
                                            class="img-fluid rounded-circle avatar-image" alt="avatar">
                                    </li>

                                    <li data-bs-target="#testimonial-carousel" data-bs-slide-to="2" class="">
                                        <img src="frontend/images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg"
                                            class="img-fluid rounded-circle avatar-image" alt="avatar">
                                    </li>

                                    <li data-bs-target="#testimonial-carousel" data-bs-slide-to="3" class="">
                                        <img src="frontend/images/avatar/studio-portrait-emotional-happy-funny.jpg"
                                            class="img-fluid rounded-circle avatar-image" alt="avatar">
                                    </li>
                                </ol>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="contact-section section-padding" id="section_6">
            <div class="container">
                <div class="row">
                    @foreach ($pages->fetchPages() as $page)
                        @if ($page->slug == 'contact')
                            <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                                <div class="contact-info-wrap">


                                    <div class="contact-image-wrap d-flex flex-wrap">
                                        <img src="frontend/images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg"
                                            class="img-fluid avatar-image" alt="">

                                        <div class="d-flex flex-column justify-content-center ms-3">
                                            <p class="mb-0">Clara Barton</p>
                                            <p class="mb-0"><strong>HR & Office Manager</strong></p>
                                        </div>
                                    </div>

                                    <div class="contact-info">
                                        <h6 class="mb-3">Contact Infomation</h6>

                                        <p class="d-flex mb-2">
                                            <i class="bi-geo-alt me-2"></i>
                                            Akershusstranda 20, 0150 Oslo, Norway
                                        </p>

                                        <p class="d-flex mb-2">
                                            <i class="bi-telephone me-2"></i>

                                            <a href="tel: 120-240-9600">
                                                120-240-9600
                                            </a>
                                        </p>

                                        <p class="d-flex">
                                            <i class="bi-envelope me-2"></i>

                                            <a href="mailto:info@yourgmail.com">
                                                donate@charity.org
                                            </a>
                                        </p>

                                        <a href="#" class="custom-btn btn mt-3">Get Direction</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5 col-12 mx-auto">
                                <form class="custom-form contact-form" action="{{ url('/feedback') }}" method="post"
                                    role="form">
                                    @csrf
                                    <h4>{{ $page->title[$locale] }}</h4>
                                    <p class="mb-4">{{ $page->content[$locale] }}</p>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="text" name="first_name" id="first-name" class="form-control"
                                                placeholder="Enter first name" required>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="text" name="last__name" id="last-name" class="form-control"
                                                placeholder="Enter last name" required>
                                        </div>
                                    </div>

                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Enter email" required>

                                    <textarea name="message" rows="5" class="form-control" id="message" placeholder="What can we help you?"></textarea>

                                    <button type="submit" class="form-control">Send Message</button>
                                </form>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
