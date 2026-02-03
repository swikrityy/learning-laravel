@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.seo', [
        'name' => $contact_page->seo_title ?? '',
        'title' => $contact_page->seo_title ?? $contact_page->title,
        'description' => $contact_page->meta_description ?? '',
        'keyword' => $contact_page->meta_keywords ?? '',
        'schema' => $contact_page->seo_schema ?? '',
        'created_at' => $contact_page->created_at,
        'updated_at' => $contact_page->updated_at,
    ])
@endsection
@section('content')
    <!-- page-banner start -->
    <section class="page-banner pt-xs-60 pt-sm-80 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-banner__content mb-xs-10 mb-sm-15 mb-md-15 mb-20">
                        <div class="transparent-text">{{ $contact_page->title }}</div>
                        <div class="page-title">
                            <h1>{{ $contact_page->title }}</h1>
                        </div>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $contact_page->title }}</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-6">
                    <div class="page-banner__media mt-xs-30 mt-sm-40">
                        <img class="img-fluid start" src="assets/img/page-banner/page-banner-start.svg" alt="">
                        <img class="img-fluid" src="{{ asset($contact_page->banner_image) }}" alt="">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modern Contact Section -->
    <section class="contact-modern py-5" style="background:#f7f7f7;">
        <div class="container">

            <div class="row align-items-center mb-5">
                <div class="col-lg-4 mb-4">

                    <span class="badge px-3 py-2" style="background:#00b3ea; color:#fff;">
                        {{ $settings['contact_section_title'] }}
                    </span>

                    <h2 class="mt-3 fw-bold" style="color:#001f3f;">
                        {{ $settings['contact_title'] }}
                    </h2>

                    <p class="mt-3 text-muted">
                        {{ $settings['contact_description'] }}
                    </p>
                </div>

                <div class="col-lg-8">
                    <div class="row g-3">

                        <!-- Phone -->
                        <div class="col-sm-4">
                            <div class="contact-box p-4 shadow-sm rounded"
                                style="background:#fff; border-top:4px solid #00b3ea;">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-phone-alt me-2" style="color:#00b3ea; font-size:20px;"></i>
                                    <h6 class="m-0 fw-bold">Phone</h6>
                                </div>
                                <p class="mb-0">
                                    <a class="text-dark" href="tel:{{ $settings['contact_phone'] }}">
                                        {{ $settings['contact_phone'] }}
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-sm-4">
                            <div class="contact-box p-4 shadow-sm rounded"
                                style="background:#fff; border-top:4px solid #00b3ea;">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-envelope me-2" style="color:#00b3ea; font-size:20px;"></i>
                                    <h6 class="m-0 fw-bold">Email</h6>
                                </div>
                                <p class="mb-0">
                                    <a class="text-dark" href="mailto:{{ $settings['contact_email'] }}">
                                        {{ $settings['contact_email'] }}
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-sm-4">
                            <div class="contact-box p-4 shadow-sm rounded"
                                style="background:#fff; border-top:4px solid #00b3ea;">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-envelope me-2" style="color:#00b3ea; font-size:20px;"></i>
                                    <h6 class="m-0 fw-bold">Location</h6>
                                </div>
                                <p class="mb-0">
                                    <a class="text-dark" href="mailto:{{ $settings['site_location'] }}">
                                        {{ $settings['site_location'] }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Modern Contact Form Section -->
    <section class="py-5 position-relative">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="contact-card p-5 rounded shadow-sm" style="background:#fff; border: 1px solid #eee;">

                        <span class="badge px-3 py-2 mb-3" style="background:#00b3ea; color:#fff;">
                            {{ $settings['contact_form_title'] }}
                        </span>

                        <h3 class="fw-bold mb-4">{{ $settings['contact_form_subtitle'] }}</h3>

                        <form action="{{ route('frontend.contact.submit.home') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <input class="form-control py-3" type="text" name="name" placeholder="Your Name"
                                    required>
                            </div>
                            <div class="mb-3">
                                <input class="form-control py-3" type="email" name="email" placeholder="Your Email"
                                    required>
                            </div>
                            <div class="mb-3">
                                <input class="form-control py-3" type="text" name="course" placeholder="Subject">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control py-3" name="message" rows="5" placeholder="Your Message" required></textarea>
                            </div>
                            <button class="btn w-10 py-3 text-white" type="submit"
                                style="background:#00b3ea; border:none;">
                                Submit Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map -->
    <div class=" mt-4">
        <div class="rounded overflow-hidden shadow-sm" style="height:350px;">
            <iframe src="{{ $settings['site_location_url'] }}" style="border:0; width:100%; height:100%;" allowfullscreen
                loading="lazy"></iframe>
        </div>
    </div>
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    gravity: "top", // top or bottom
                    position: "right", // left, center or right
                    backgroundColor: "#4BB543", // green success color
                    stopOnFocus: true,
                }).showToast();
            });
        </script>
    @endif
@endsection
