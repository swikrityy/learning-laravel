@section('seo')
    @include('frontend.seo', [
        'name' => $testimonial_page->seo_title ?? '',
        'title' => $testimonial_page->seo_title ?? $testimonial_page->title,
        'description' => $testimonial_page->meta_description ?? '',
        'keyword' => $testimonial_page->meta_keywords ?? '',
        'schema' => $testimonial_page->seo_schema ?? '',
        'created_at' => $testimonial_page->created_at,
        'updated_at' => $testimonial_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    {{-- @if ($testimonial_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $testimonial_page->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $testimonial_page->title ?? 'About Us' }}</a>
                        </p>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-container-banner">
                        <div class="img-wrapper-2">
                            <img src="{{ asset($testimonial_page->banner_image) }}" alt="Creative Design"
                                class="background-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row">
            @foreach ($testimonial as $testimonial)
                <div class="col-lg-4" data-aos="fade-up" data-aos-duration="3000">
                    <div class="scholar-main-card bg-white">
                        <div class="p-3 my-4">
                            <div class="swiper-icon center"><i class="ri-double-quotes-l"></i></div>

                            <div class="text-css text-center line-clamp my-2">
                                {!! $testimonial->description !!}
                            </div>

                            <div class="scholar-img-container center mb-2">
                                <img class="scholarship-img" src="{{ asset($testimonial->image) }}"
                                    alt="{{ $testimonial->name }}">
                            </div>

                            <div class="name center">
                                <p>{{ $testimonial->name }}</p>
                            </div>

                            <div class="center">
                                @for ($i = 0; $i < $testimonial->rating; $i++)
                                    <svg class="rating w-5 h-5 text-warning" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 2l2.72 5.792H18l-4.271 4.324 1.013 7.057L10 15.16l-5.742 3.013 1.013-7.057L2 7.792h4.28L10 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
    <!-- page-banner start -->
    <section class="page-banner pt-xs-60 pt-sm-80 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-banner__content mb-xs-10 mb-sm-15 mb-md-15 mb-20">
                        <div class="transparent-text">Testimonial</div>
                        <div class="page-title">
                            <h1>{{ $testimonial_page->title }}</h1>
                        </div>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $testimonial_page->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="page-banner__media mt-xs-30 mt-sm-40">
                        <img class="img-fluid start" src="assets/img/page-banner/page-banner-start.svg" alt="">
                        <img class="img-fluid" src="{{ asset($testimonial_page->banner_image) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-banner end -->
    <!-- testimonial start -->
    <section
        class="testimonial test pb-xs-80 pt-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-120 pb-120 overflow-hidden">
        <div class="container">
            {{-- <div class="row align-items-center">
                    <div class="col-sm-9">
                        <div class="employee-friendly__content wow fadeInUp" data-wow-delay=".3s">
                            <span class="sub-title fw-500 color-red text-uppercase mb-sm-10 mb-xs-5 mb-15 d-block"><img src="assets/img/home/line.svg" class="img-fluid mr-10" alt="">{{ $settings['testioninal_title'] }}</span>
                            <h2 class="title color-pd_black">{{ $settings['testioninal_subtitle'] }}</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="slider-controls slider-controls-two mt-xs-15 wow fadeInUp" data-wow-delay=".3s">
                            <div class="testimonial-slider-arrows d-flex align-content-center justify-content-sm-end"></div>
                        </div>
                    </div>
                </div> --}}

            <div class="row">
                <div class="col-12">
                    <div class="testimonial-slider-home-1 mt-65 mt-md-50 mt-sm-40 mt-xs-30 wow fadeInUp"
                        data-wow-delay=".5s">
                        @foreach ($testimonials as $testimonial)
                            <div class="slider-item active">
                                <div class="testimonial__item testimonial-item-three">
                                    <div
                                        class="testimonial__item-header d-flex justify-content-between align-items-center mb-30 mb-sm-25 mb-xs-20">
                                        <div class="left d-flex align-items-center">
                                            <div class="media overflow-hidden">
                                                <img class="img-fluid" src="{{ $testimonial->image }}" alt="">
                                            </div>

                                            <div class="meta">
                                                <div class="starts">
                                                    <ul>
                                                        <li><span></span></li>
                                                        <li><span></span></li>
                                                        <li><span></span></li>
                                                        <li><span></span></li>
                                                        <li><span></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="right">
                                            <i class="fal fa-quote-right"></i>
                                        </div>
                                    </div>

                                    <div class="description font-la mb-25">
                                        <p>{!! $testimonial->description !!}</p>
                                    </div>

                                    <div class="testimonial__item-footer d-flex justify-content-between">
                                        <div class="socail-link">
                                            {{-- <span class="name"><span>- </span></span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial end -->
@endsection
