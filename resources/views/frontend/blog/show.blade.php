@section('seo')
    @include('frontend.seo', [
        'name' => $blogsingle->seo_title ?? '',
        'title' => $blogsingle->seo_title ?? $blogsingle->title,
        'description' => $blogsingle->meta_description ?? '',
        'keyword' => $blogsingle->meta_keywords ?? '',
        'schema' => $blogsingle->seo_schema ?? '',
        'created_at' => $blogsingle->created_at,
        'updated_at' => $blogsingle->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    {{-- @if ($blog_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $blogsingle->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="{{ route('frontend.abroad') }}"
                                class="text-white text-decoration-none">{{ $blog_page->title }}</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $blogsingle->title ?? 'About Us' }}</a>
                        </p>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-container-banner">
                        <div class="img-wrapper-2">
                            <img src="{{ asset($blog_page->banner_image) }}" alt="Creative Design" class="background-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8" data-aos="fade-right"  data-aos-duration="3000">
                    <div class="blog-image-wrapper">
                        <img src="{{asset($blogsingle->image)}}" alt="" class="img-fluid">
                    </div>
                    <h2 class="py-3"> {{$blogsingle->title}}</h2>
                    <div class="text-css text-justify">
                       {!!$blogsingle->description!!}
                    </div>
                </div>
                <div class="col-md-4 position-relative" data-aos="fade-left"  data-aos-duration="3000">
                    <div class="blog-sidebar p-4 position-sticky">
                        <p class="blog-heading-text py-3">
                            Recent Posts
                        </p>
                        <div class="d-flex align-items-center mb-3">
                            <!-- Dot -->
                            <div class="dot-blog"></div>
                            <!-- Line -->
                            <div class="line-blog ms-2"></div>
                        </div>
                        @foreach ($blogs as $blog)
                            <div class="blog-sidebar-section d-flex gap-3 mb-4 position-relative">
                                <div class="main-img-blog-container">
                                    <img src="{{ asset($blog->image ?? 'frontend/assets/images/default.jpg') }}" alt="{{ $blog->title }}" class="main-img-blog">
                                </div>
                                <div class="blog-sidebar-text">
                                    <div class="date-blog-sidebar mb-2">
                                        {{ $blog->created_at->format('d/m/Y') }}
                                    </div>
                                    <a href="{{ route('frontend.blogsingle', $blog->slug) }}" class="text-decoration-none text-css blog-link-text">
                                        {{ $blog->title }}
                                    </a>
                                </div>
                                <a class="stretched-link" href="{{route('frontend.blogsingle', $blog->slug) }}"></a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
    <!-- page-banner start -->
    <section class="page-banner pt-xs-60 pt-sm-80 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-banner__content mb-xs-10 mb-sm-15 mb-md-15 mb-20">
                        <div class="transparent-text">{{ $blogsingle->title }}</div>
                        <div class="page-title">
                            <h1>{{ $blogsingle->title }}</h1>
                        </div>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('frontend.blog') }}">Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $blogsingle->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="page-banner__media mt-xs-30 mt-sm-40">
                        <img class="img-fluid start" src="assets/img/page-banner/page-banner-start.svg" alt="">
                        <img class="img-fluid" src="{{ asset($blog_page->banner_image) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- team-area start -->
    <section class="blog pb-xs-80 pt-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-120 pb-120 overflow-hidden">
        <div class="container">
            <div class="row" data-sticky_parent>
                <div class="col-xl-8" data-sticky_column>
                    <div class="blog-item blog-standard blog-post-details">
                        <div class="blog-featured-thumb mb-xs-30 mb-sm-30 mb-md-35 mb-lg-40 mb-40">
                            <div class="media overflow-hidden">
                                <img class="img-fluid" src="{{ $blogsingle->image }}" alt="">
                            </div>
                        </div>

                        <div
                            class="content pr-sm-25 pr-xs-15 pl-xs-15 pl-sm-25 pr-xs-15 pr-30 pl-30 pb-xs-25 pb-sm-30 pb-40 content-blog">
                            {{-- <div class="post-meta mb-10">
                                <a href="blog-details.html"><i class="icon-user"></i>By Admin</a>
                                <a href="blog-details.html"><i class="icon-category"></i>Business, Consulting</a>
                                <a href="blog-details.html"><i class="fal fa-clock"></i>27 jun, 2023</a>
                                <a href="blog-details.html"><img src="assets/img/icon/messages-1.svg" alt="">02 Comments</a>
                            </div> --}}

                            <h3>{{ $blogsingle->short_description }}</h3>

                            <p>{!! $blogsingle->description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="main-sidebar" data-sticky_column>
                        <div class="single-sidebar-widget mb-40 pt-30 pr-30 pb-40 pl-30 pl-xs-20 pr-xs-20">
                            <h4 class="wid-title mb-30 mb-xs-20 color-d_black text-capitalize">More Blogs</h4>

                            <div class="resent-posts">
                                @foreach ($blogs as $blog)
                                    <div class="single-post-item mb-20">
                                        <div class="thumb overflow-hidden">
                                            <img class="img-fluid" src="{{ $blog->image }}" alt="">
                                        </div>

                                        <div class="post-content">
                                            {{-- <a href="blog-details.html" class="post-date d-block mb-10 text-uppercase">
                                            <i class="far fa-clock"></i>12 jun, 2022
                                        </a> --}}
                                            <h6><a
                                                    href="{{ route('frontend.blogsingle', $blog->slug) }}">{{ $blog->title }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach

                                <a class="theme-btn d-block" href="{{ route('frontend.blog') }}"><i
                                        class="far fa-sync-alt"></i>More Post</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team-area end -->
@endsection
