@section('seo')
    @include('frontend.seo', [
        'name' => $service_page->seo_title ?? '',
        'title' => $service_page->seo_title ?? $service_page->title,
        'description' => $service_page->meta_description ?? '',
        'keyword' => $service_page->meta_keywords ?? '',
        'schema' => $service_page->seo_schema ?? '',
        'created_at' => $service_page->created_at,
        'updated_at' => $service_page->updated_at,
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
                        <div class="transparent-text">{{ $service_page->title }}</div>
                        <div class="page-title">
                            <h1>{{ $service_page->title }}</h1>
                        </div>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $service_page->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="page-banner__media mt-xs-30 mt-sm-40">
                        <img class="img-fluid start" src="assets/img/page-banner/page-banner-start.svg" alt="">
                        <img class="img-fluid" src="{{ asset($service_page->banner_image) }}" alt="">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- why-choose start -->
    <section
        class="why-choose why-choose__home pb-xs-80 pt-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-120 pb-120 overflow-hidden">
        <div class="container">
            {{-- <div class="row">
                    <div class="col-lg-6">
                        <div class="why-choose__content why-choose__content-home wow fadeInUp" data-wow-delay=".3s">
                            <div class="why-choose__text">
                                <span class="sub-title d-block fw-500 color-red text-uppercase mb-sm-10 mb-xs-5 mb-15"><img
                                        src="assets/img/home/line.svg" class="img-fluid mr-10" alt="">
                                    {{ $settings['services_title'] }}</span>
                                <h2 class="title color-pd_black">{{ $settings['services_subtitle'] }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="why-choose__content why-choose__content-home mt-md-25 mt-sm-20 mt-xs-20 wow fadeInUp"
                            data-wow-delay=".5s">
                            <div class="description font-la">
                                <p>{{ $settings['services_description'] }}</p>
                            </div>

                        </div>
                    </div>
                </div> --}}
            @php
                $icons = [
                    '<i class="icon-consultation"></i>',
                    '<i class="icon-lawyer"></i>',
                    '<i class="icon-financial"></i>',
                    '<i class="icon-management"></i>',
                ];
            @endphp
            <div class="row">
                <div class="col-12">
                    <div class="why-choose__item-wrapper why-choose__item-two-wrapper d-grid justify-content-between mt-60 mt-md-50 mt-sm-40 mt-xs-30 wow fadeInUp"
                        data-wow-delay=".7s">
                        @foreach ($services as $key => $service)
                            <div class="why-choose__item why-choose__item-two"
                                style="background-image: url(assets/img/home/why-choose__item-two-overly.png);">
                                <div class="icon mb-30 mb-lg-20 mb-md-10 mb-xs-5 color-red">

                                    {{-- {!! $icons[$key % count($icons)] !!} --}}
                                    <img height="50px" src="{{ $service->image }}">

                                </div>
                                <h6 class="title color-pd_black fw-600 mb-15 mb-xs-10">{{ $service->title }}</h6>
                                <div class="description font-la mb-20 mb-sm-15 mb-xs-10  line-clamp-4 service-des">
                                    <p>{!! $service->description !!}</p>
                                </div>
                                <a class="color-red d-block"
                                    href="{{ route('frontend.servicesingle', $service->slug) }}">Read More <i
                                        class="far fa-chevron-double-right"></i></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- why-choose end -->
@endsection
