@section('seo')
    @include('frontend.seo', [
        'name' => $abroadstudiesingle->seo_title ?? '',
        'title' => $abroadstudiesingle->seo_title ?? $abroadstudiesingle->title,
        'description' => $abroadstudiesingle->meta_description ?? '',
        'keyword' => $abroadstudiesingle->meta_keywords ?? '',
        'schema' => $abroadstudiesingle->seo_schema ?? '',
        'created_at' => $abroadstudiesingle->created_at,
        'updated_at' => $abroadstudiesingle->updated_at,
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
                        <div class="transparent-text">{{ $abroadstudiesingle->title }}</div>
                        <div class="page-title">
                            <h1>{{ $abroadstudiesingle->title }}</h1>
                        </div>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('frontend.abroad') }}">Countries</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $abroadstudiesingle->name }}
                            </li>
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
    <!-- page-banner end -->

    <!-- details section -->
    <section
        class="services-details pb-xs-80 pt-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-120 pb-115 overflow-hidden">
        <div class="container">

            <div class="row" data-sticky_parent>

                <!-- LEFT CONTENT -->
                <div class="col-xl-8" data-sticky_column>

                    <div class="media mb-40 mb-md-35 mb-sm-30 mb-xs-25">
                        <img src="{{ $abroadstudiesingle->image1 }}" alt="">
                    </div>

                    <div class="services-details__content">
                        <h2>{{ $abroadstudiesingle->title }}</h2>
                        <p>{!! $abroadstudiesingle->description !!}</p>
                    </div> <!-- FIXED missing closing div -->

                </div>

                <!-- RIGHT SIDEBAR -->
                <div class="col-xl-4">
                    <div class="main-sidebar" data-sticky_column>
                        <div class="single-sidebar-widget mb-40 pt-30 pr-30 pb-40 pl-30 pl-xs-20 pr-xs-20">
                            <h4 class="wid-title mb-30 mb-xs-20 color-d_black text-capitalize">More Country</h4>

                            <div class="resent-posts">
                                @foreach ($abroads as $blog)
                                    <div class="single-post-item mb-20">
                                        <div class="thumb overflow-hidden">
                                            <img class="img-fluid" src="{{ $blog->image1 }}" alt="">
                                        </div>

                                        <div class="post-content">
                                            {{-- <a href="blog-details.html" class="post-date d-block mb-10 text-uppercase">
                                            <i class="far fa-clock"></i>12 jun, 2022
                                        </a> --}}
                                            <h6><a
                                                    href="{{ route('frontend.abroadsingle', $blog->slug) }}">{{ $blog->name }}</a>
                                            </h6>
                                            <p class="line-clamp-2" style="color: white">{{ $blog->short_description }}</p>
                                        </div>
                                    </div>
                                @endforeach

                                <a class="theme-btn d-block" href="{{ route('frontend.abroad') }}"><i
                                        class="far fa-sync-alt"></i>More Post</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- details section end -->
@endsection
