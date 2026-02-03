@section('seo')
    @include('frontend.seo', [
        'name' => $course_page->seo_title ?? '',
        'title' => $course_page->seo_title ?? $course_page->title,
        'description' => $course_page->meta_description ?? '',
        'keyword' => $course_page->meta_keywords ?? '',
        'schema' => $course_page->seo_schema ?? '',
        'created_at' => $course_page->created_at,
        'updated_at' => $course_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    <!-- page-banner start -->
    <section class="page-banner pt-xs-60 pt-sm-80 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-banner__content mb-xs-10 mb-sm-15 mb-md-15 mb-20">
                        <div class="transparent-text">{{ $course_page->title }}</div>
                        <div class="page-title">
                            <h1>{{ $course_page->title }}</h1>
                        </div>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $course_page->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="page-banner__media mt-xs-30 mt-sm-40">
                        <img src="assets/img/page-banner/page-banner-start.svg" class="img-fluid start" alt="">
                        <img src="{{ asset($course_page->banner_image) }}" class="img-fluid" alt="">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our-portfolio-home start -->
    <section
        class="our-portfolio-home pb-xs-80 pt-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-120 pb-120 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    {{-- <div class="our-portfolio-home__content text-center mb-60 mb-sm-50 mb-xs-40 wow fadeInUp" data-wow-delay=".3s">
                        <span class="sub-title fw-500  text-uppercase mb-sm-10 mb-xs-5 mb-15 d-block color-red"><img src="assets/img/home/line.svg" class="img-fluid mr-10" alt=""> {{ $settings['courses_title'] }}</span>
                        <h2 class="title color-pd_black">{{ $settings['courses_subtitle'] }}</h2>
                    </div> --}}
                </div>
            </div>
            <div class="row mb-minus-30">
                @foreach ($courses as $course)
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="our-portfolio-home__item mb-30 wow fadeInUp" data-wow-delay=".3s">
                            <div class="featured-thumb">
                                <div class="media overflow-hidden course-img">
                                    <img src="{{ $course->image }}" class="img-fluid" alt="">
                                </div>
                            </div>

                            <div class="content d-flex flex-row">
                                <div class="left">
                                    <h5 class="color-pd_black mb-15 mb-xs-10"><a
                                            href="blog-details.html">{{ $course->title }}</a></h5>
                                    <div class="description font-la">
                                        <p class="line-clamp-4">{{ $course->short_description }}</p>
                                    </div>
                                </div>

                                <div class="btn-link-share">
                                    <a href="{{ route('frontend.coursesingle', $course->slug) }}"
                                        class="theme-btn color-pd_black"
                                        style="background-image: url(assets/img/home/theme-btn-overly.png)">View Details <i
                                            class="icon-arrow-right-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            <div class="row">
                <div class="col-12">
                    <div class="our-portfolio-home__read-more text-center mt-50 mt-md-40 mt-sm-35 mt-xs-30 wow fadeInUp"
                        data-wow-delay=".3s">
                        {{-- <a href="{{ route('frontend.course') }}" class="theme-btn  btn-border">View All Courses <i class="far fa-chevron-double-right"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our-portfolio-home end -->
@endsection
