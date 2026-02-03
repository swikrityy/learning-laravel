@section('seo')
    @include('frontend.seo', [
        'name' => $blog_page->seo_title ?? '',
        'title' => $blog_page->seo_title ?? $blog_page->title,
        'description' => $blog_page->meta_description ?? '',
        'keyword' => $blog_page->meta_keywords ?? '',
        'schema' => $blog_page->seo_schema ?? '',
        'created_at' => $blog_page->created_at,
        'updated_at' => $blog_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    {{-- @if ($blog_page)
    <div class="hero-banner2 position-relative ">
        <div class="row g-0 text-bannner-section">
            <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                <div class="text-center page-banner-lft px-4">
                    <h1 class="text-white font-weight-bold">{{ $blog_page->title ?? 'About Us' }}</h1>
                    <p class="breadcrumb-text text-white">
                        <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                        <a href="#"
                            class="text-white text-decoration-none">{{ $blog_page->title ?? 'About Us' }}</a>
                    </p>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img-container-banner">
                    <div class="img-wrapper-2">
                        <img src="{{ asset($blog_page->banner_image) }}" alt="Creative Design"
                            class="background-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
        <section class="blog-section py-5 page-bg-color">
            <div class="container">
                <div class="row">
                    @foreach ($blog as $blog)
                        <div class="col-lg-4 col-md-6 position-relative" data-aos="fade-up" data-aos-duration="3000">
                            <div class="shadow blog-card bg-white">
                                <div class="my-3">
                                    <div class="blog-media-wrapper">
                                        <img class="study-card-img" src="{{ asset($blog->image) }}"
                                            alt="{{ $blog->title }}">
                                        <div class="blog-icon">
                                            <span class="icons"><i class="ri-heart-line"></i></span>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between mt-2">
                                            <p class="bodypart-css">
                                                <span><i class="ri-calendar-line offer-icon"></i></span>
                                                {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                                            </p>
                                            <p class="book-text"><span><i
                                                class="ri-eye-line offer-icon"></i></span>{{ $blog->views }}</p>
                                        </div>

                                        <div class="subheadings my-1">
                                            <h3 class="line-clamp-2">{{ $blog->title }}</h3>
                                        </div>

                                        <div class="bodypart-css line-clamp-3 mb-2">
                                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 150) }}</p>
                                        </div>

                                        <div class="reviw-part d-flex justify-content-start">
                                            <div class="bodypart-css">
                                                <span><i
                                                        class="ri-star-fill rating-blog"></i></span>{{ $blog->rating ?? '5' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="stretched-link" href="{{route('frontend.blogsingle',$blog->slug)}}"></a>
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
                        <div class="transparent-text">{{ $blog_page->title }}</div>
                        <div class="page-title">
                            <h1>{{ $blog_page->title }}</h1>
                        </div>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $blog_page->title }}</li>
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
    <!-- blog-news start -->
    <section class="blog-news pb-xs-80 pb-sm-100 pb-md-100 pb-120 overflow-hidden blog-margin">
        <div class="container">
            <div class="row align-items-center">
                {{-- <div class="col-12">
                                <div class="blog-news__content text-center wow fadeInUp" data-wow-delay=".3s">
                                    <span class="sub-title fw-500  text-uppercase mb-sm-10 mb-xs-5 mb-15 d-block color-red"><img src="assets/img/home/line.svg" class="img-fluid mr-10" alt=""> {{ $settings['blogs_title'] }}</span>
                                    <h2 class="title color-d_black">{{ $settings['blogs_subtitle'] }}</h2>
                                </div>
                            </div> --}}
            </div>

            <div class="blog-news__bottom mt-60 mt-sm-50 mt-xs-40">
                <div class="row mb-minus-30">
                    @foreach ($blogs as $blog)
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="blog-item blog-item-three mb-30 wow fadeInUp" data-wow-delay=".3s">
                                <div class="blog-featured-thumb mb-xs-30 mb-sm-30 mb-md-35 mb-lg-40 mb-50">
                                    <div class="media overflow-hidden">
                                        <img class="img-fluid" src="{{ $blog->image }}" alt="">
                                    </div>
                                    {{-- <div class="date">
                                                    <span>27</span>
                                                    <span>April</span>
                                                    <span>2020</span>
                                                </div> --}}
                                </div>

                                <div class="content pr-sm-25 pr-xs-15 pl-xs-15 pl-sm-25 pr-xs-15 pr-30 pb-30 pl-30">
                                    <div class="post-author mb-5">
                                        {{-- <a href="blog.html">{{ $blog->short_description }}</a> --}}
                                    </div>
                                    <h4><a href="{{ route('frontend.blogsingle', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h4>
                                    <div class="btn-link-share mt-xs-10 mt-sm-10 mt-15">
                                        <a class="theme-btn btn-border"
                                            href="{{ route('frontend.blogsingle', $blog->slug) }}">Read More <i
                                                class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- blog-news end -->
@endsection
