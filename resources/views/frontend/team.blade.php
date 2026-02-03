@section('seo')
    @include('frontend.seo', [
        'name' => $team_page->seo_title ?? '',
        'title' => $team_page->seo_title ?? $team_page->title,
        'description' => $team_page->meta_description ?? '',
        'keyword' => $team_page->meta_keywords ?? '',
        'schema' => $team_page->seo_schema ?? '',
        'created_at' => $team_page->created_at,
        'updated_at' => $team_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    {{-- @if ($team_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $team_page->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $team_page->title ?? 'About Us' }}</a>
                        </p>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-container-banner">
                        <div class="img-wrapper-2">
                            <img src="{{ asset($team_page->banner_image) }}" alt="Creative Design" class="background-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <section class="team-section py-5">
        <div class="container py-3">
            <div class="row">
                @foreach ($teams as $team)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="3000">
                        <div class="team-card" style="position: relative;">
                            <div class="team-img-container shadow rounded" >
                                <img src="{{ asset($team->image) }}" alt="{{ $team->name }}">
                            </div>
                            <div class="social-icons d-flex gap-4" style="">
                                    @if ($team->facebook)
                                            <a href="{{ $team->facebook }}" target="_blank" class="text-decoration-none">
                                            <i class="fab fa-facebook fa-lg media-icon" style=""></i>
                                        </a>
                                      @endif
                                     @if ($team->whatsapp)
                                        <a href="https://wa.me/{{ $team->whatsapp }}" target="_blank" class="text-decoration-none">
                                            <i class="fab fa-whatsapp fa-lg media-icon" style=""></i>
                                            </a>
                                    @endif
                                            @if ($team->email)
                                                    <a href="mailto:{{ $team->email }}" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-envelope fa-lg media-icon" style=""></i>
                                                    </a>
                                              @endif
                                        </div>
                            <div class="team-content-container">

                                <h4>{{ $team->name }}</h4>
                                <p>{{ $team->position }}</p>
                                <div class="social-icons d-flex gap-4">
                                    @if ($team->facebook)
                                        <a href="{{ $team->facebook }}" target="_blank" class="text-decoration-none">
                                        <i class="fab fa-facebook fa-lg"></i>
                                        </a>
                                    @endif
                                     @if ($team->whatsapp)
                                        <a href="https://wa.me/{{ $team->whatsapp }}" target="_blank" class="text-decoration-none">
                                        <i class="fab fa-whatsapp fa-lg"></i>
                                        </a>
                                    @endif
                                    @if ($team->email)
                                        <a href="mailto:{{ $team->email }}" target="_blank" class="text-decoration-none">
                                        <i class="fas fa-envelope fa-lg"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <!-- page-banner start -->
    <section class="page-banner pt-xs-60 pt-sm-80 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-banner__content mb-xs-10 mb-sm-15 mb-md-15 mb-20">
                        <div class="transparent-text">{{ $team_page->title }}</div>
                        <div class="page-title">
                            <h1>{{ $team_page->title }}</h1>
                        </div>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $team_page->title }}</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6">
                    <div class="page-banner__media mt-xs-30 mt-sm-40">
                        <img class="img-fluid start" src="assets/img/page-banner/page-banner-start.svg" alt="">
                        <img class="img-fluid" src="{{ asset($team_page->banner_image) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our-team-home-1 start -->
    <section
        class="our-team our-team-home-1 bg-dark_red pb-xs-80 pt-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-120 pb-120 overflow-hidden">
        <div class="container">
            {{-- <div class="row">
                    <div class="col-12">
                        <div class="our-team__content mb-60 mb-md-50 mb-sm-40 mb-xs-30 text-center wow fadeInUp" data-wow-delay=".3s">
                            <span class="sub-title fw-500 color-red text-uppercase mb-sm-10 mb-xs-5 mb-15 d-block"><img src="assets/img/home/line.svg" class="img-fluid mr-10" alt=""> {{ $settings['teams_title'] }}</span>
                            <h2 class="title color-d_black">{{ $settings['teams_subtitle'] }}</h2>
                        </div>
                    </div>
                </div> --}}

            <div class="row mb-minus-30">
                @foreach ($teams as $team)
                    <div class="col-xxl-3 col-lg-4 col-md-6">
                        <div class="team-item team-item-three text-center mb-30 d-block overflow-hidden wow fadeInUp"
                            data-wow-delay=".3s">
                            <div class="media">
                                <img class="img-fluid" src="{{ $team->image }}" alt="">

                                <div class="social-profile">
                                    <ul>
                                        <li><a href="{{ $team->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ $team->whatsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                                        <li><a href="{{ $team->email }}"><i class="fab fa-google"></i></a></li>
                                        {{-- <li><a href="#"><i class="fab fa-twitter"></i></a></li> --}}
                                        {{-- <li><a href="#"><i class="fab fa-instagram"></i></a></li> --}}
                                        {{-- <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li> --}}
                                    </ul>
                                </div>
                            </div>

                            <div class="text d-flex align-items-center justify-content-center">
                                <div class="left">
                                    <h5 class="title color-white">{{ $team->name }}</h5>
                                    <span class="position color-white font-la fw-500">{{ $team->position }}</span>
                                </div>
                            </div>

                            {{-- <a href="team-details.html" class="theme-btn text-uppercase">View Details <i class="far fa-chevron-double-right"></i></a> --}}
                        </div>
                    </div>
                @endforeach
                <!-- team-item -->

                <!-- team-item -->
            </div>
        </div>
    </section>
    <!-- our-team-home-1 end -->
@endsection
