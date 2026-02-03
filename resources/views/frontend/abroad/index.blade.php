@section('seo')
    @include('frontend.seo', [
        'name' => $abroad_page->seo_title ?? '',
        'title' => $abroad_page->seo_title ?? $abroad_page->title,
        'description' => $abroad_page->meta_description ?? '',
        'keyword' => $abroad_page->meta_keywords ?? '',
        'schema' => $abroad_page->seo_schema ?? '',
        'created_at' => $abroad_page->created_at,
        'updated_at' => $abroad_page->updated_at,
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
                        <div class="transparent-text">{{ $abroad_page->title }}</div>
                        <div class="page-title">
                            <h1>{{ $abroad_page->title }}</h1>
                        </div>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $abroad_page->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="page-banner__media mt-xs-30 mt-sm-40">
                        <img class="img-fluid start" src="assets/img/page-banner/page-banner-start.svg" alt="">
                        <img class="img-fluid" src="{{ asset($abroad_page->banner_image) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section
        class="our-team our-team-home-1 bg-dark_red pb-xs-80 pt-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-120 pb-120 overflow-hidden">
        <div class="container">
            <section
                class="our-team our-team-home-1 bg-dark_red pb-xs-80 pt-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-120 pb-120 overflow-hidden">
                <div class="container">
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="our-team__content mb-60 mb-md-50 mb-sm-40 mb-xs-30 text-center wow fadeInUp"
                                data-wow-delay=".3s">
                                <span class="sub-title fw-500 color-red text-uppercase mb-sm-10 mb-xs-5 mb-15 d-block"><img
                                        src="assets/img/home/line.svg" class="img-fluid mr-10" alt="">
                                    {{ $settings['countries_title'] }}</span>
                                <h2 class="title color-d_black">{{ $settings['countries_subtitle'] }}</h2>
                            </div>
                        </div>
                    </div> --}}
                    <section class="courses-section">
                        <div class="container">
                            <div class="courses-block ">
                                <div class="row justify-content-center g-4">
                                    @foreach ($abroadstudies as $country)
                                        <div class="col-md-6">
                                            <div class="courses-card position-relative">
                                                <a href="{{ route('frontend.abroadsingle', $country->slug) }}">
                                                    <div class="row">
                                                        <div class="col-lg-7">
                                                            <div class="p-3">
                                                                <div class="author-name">{{ $country->name }}</div>
                                                                <div class="courses-text line-clamp-4">
                                                                    <a
                                                                        href="{{ route('frontend.abroadsingle', $country->slug) }}">
                                                                        {!! $country->shortdescription ?? 'No description available.' !!}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="courses-author py-3">
                                                                <img src="{{ asset($country->image1) }}"
                                                                    alt="{{ $country->name }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a class="stretched-link"
                                                        href="{{ route('frontend.abroadsingle', $country->slug) }}"></a>

                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>

        </div>
    </section>
@endsection
