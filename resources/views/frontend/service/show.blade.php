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
                                    <h1>{{ $servicesingle->title }}</h1>
                                </div>
                            </div>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('frontend.service')}}">{{ $service_page->title }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $servicesingle->title }}</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="col-md-6">
                            <div class="page-banner__media mt-xs-30 mt-sm-40">
                                <img src="assets/img/page-banner/page-banner-start.svg" class="img-fluid start" alt="">
                                <img src="{{ asset($service_page->banner_image) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- team-area start -->
    <section class="services-details pb-xs-80 pt-xs-80 pt-sm-100 pb-sm-100 pt-md-100 pb-md-100 pt-120 pb-115 overflow-hidden">
        <div class="container">
            <div class="row" data-sticky_parent>
                <div class="col-xl-8" data-sticky_column>
                    <div class="media mb-40 mb-md-35 mb-sm-30 mb-xs-25">
                        <img src="{{ $servicesingle->image_1 }}" alt="">
                    </div>

                    <div class="services-details__content">
                        <h2 class="service-main-title">{{ $servicesingle->title}}</h2>

                        <p>{!! $servicesingle->description !!}</p>

                        {{-- <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis
                            aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae.</p>

                        <ul>
                            <li>Instant Business Growth</li>
                            <li>Easy Customer Service</li>
                            <li>24/7 Quality Service</li>
                            <li>Quality Cost Service</li>
                        </ul>

                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis
                            aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae.</p>

                        <hr>

                        <h4>Working Challenge</h4>

                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>

                        <figure>
                            <img src="assets/img/services-details/services-details-1.png" alt="">

                            <ul>
                                <li>Will give you a complete account</li>
                                <li>Easy Customer Service</li>
                                <li>Excepteur sint occaecat cupidatat non.</li>
                                <li>The master-builder of human happiness</li>
                                <li>Duis aute irure dolor in reprehenderit</li>
                                <li>complete account of the system</li>
                            </ul>
                        </figure>

                        <hr>

                        <h4>Frequently Asked Questions</h4>

                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p> --}}
                    </div>

                    {{-- <div class="faq mt-40 mt-md-35 mt-sm-25 mt-xs-20" id="faq">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="h-faq-1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-1" aria-expanded="true" aria-controls="faq-1">
                                    <i class="icon-question-4"></i> What should i included my personal details? 
                                </button>
                            </h2>

                            <div id="faq-1" class="accordion-collapse collapse show" aria-labelledby="h-faq-1" data-bs-parent="#faq">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. Excepteur sint occaecat cupidatat
                                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="h-faq-2">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-2" aria-expanded="false" aria-controls="faq-2">
                                    <i class="icon-question-4"></i> How do consultants solve problem?
                                </button>
                            </h2>

                            <div id="faq-2" class="accordion-collapse collapse" aria-labelledby="h-faq-2" data-bs-parent="#faq">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="h-faq-3">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-3" aria-expanded="false" aria-controls="faq-3">
                                    <i class="icon-question-4"></i> We can help your business to grow?
                                </button>
                            </h2>

                            <div id="faq-3" class="accordion-collapse collapse" aria-labelledby="h-faq-3" data-bs-parent="#faq">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="col-xl-4">
                    <div class="main-sidebar" data-sticky_column>
                        <div class="single-sidebar-widget mb-40 pt-30 pr-30 pb-40 pl-30 pl-xs-20 pr-xs-20">
                            <h4 class="wid-title mb-30 mb-xs-20 color-d_black text-capitalize">Our provide</h4>

                            <div class="widget_categories">
                                <ul>
                                    @foreach ($more_services as $service)
                                    <li><a href="{{ route('frontend.servicesingle',$service->slug) }}">{{ $service->title }} <i class="fas fa-long-arrow-alt-right"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team-area end -->

@endsection    