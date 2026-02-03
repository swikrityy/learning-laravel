@section('seo')
    @include('frontend.seo', [
        'name' => $eventsingle->seo_title ?? '',
        'title' => $eventsingle->seo_title ?? $eventsingle->title,
        'description' => $eventsingle->meta_description ?? '',
        'keyword' => $eventsingle->meta_keywords ?? '',
        'schema' => $eventsingle->seo_schema ?? '',
        'created_at' => $eventsingle->created_at,
        'updated_at' => $eventsingle->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($event_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $eventsingle->title ?? 'Event' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="{{ route('frontend.event') }}" class="text-white text-decoration-none">{{$event_page->title}}</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $eventsingle->title ?? 'Event' }}</a>
                        </p>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-container-banner">
                        <div class="img-wrapper-2">
                            <img src="{{ asset($event_page->banner_image) }}" alt="Creative Design" class="background-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container py-5">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8" data-aos="fade-right"  data-aos-duration="3000">
                <div class="post-detail-card bg-white rounded-4 shadow-sm p-4">
                    <div class="text-centre" style="text-align: center;">
                        <img class="img-fluid rounded-4 mb-4 rounded "
                            style="object-fit: cover; height: 350px; width: 100%;"
                            src="{{asset( $eventsingle->image) }}" alt="{{ $eventsingle->name }}">
                    </div>
                    @php
                        $eventsingleDate = \Carbon\Carbon::parse($eventsingle->date);
                        $today = now()->startOfDay();
                        $isExpired = $eventsingleDate->lt($today);
                        $formattedDate = $eventsingleDate->format('d M Y');
                        $formattedTime = \Carbon\Carbon::parse($eventsingle->time)->format('h:i A');
                    @endphp
                    <!-- Event Info Row -->
                    <div class="row text-center gy-3 border rounded-4 py-3 px-2  shadow-sm mb-4">
                        <div class="col-6 col-md-3 d-flex flex-column align-items-center">
                            <i class="fas fa-calendar-alt fa-lg  event-icon mb-1"></i>
                            <small class="fw-semibold ">{{ $formattedDate }}</small>
                        </div>
                        <div class="col-6 col-md-3 d-flex flex-column align-items-center">
                            <i class="fas fa-clock fa-lg event-icon  mb-1"></i>
                            <small class="fw-semibold ">{{ $formattedTime }}</small>
                        </div>
                        <div class="col-6 col-md-3 d-flex flex-column align-items-center">
                            <i class="fas fa-map-marker-alt fa-lg  event-icon mb-1"></i>
                            <small class="fw-semibold ">{{ $eventsingle->location ?? 'N/A' }}</small>
                        </div>
                        <div class="col-6 col-md-3 d-flex flex-column align-items-center">
                            <i class="fas fa-info-circle fa-lg event-icon mb-1"></i>
                            <span class="badge rounded-pill {{ $isExpired ? 'bg-danger' : 'bg-success' }}">
                                {{ $isExpired ? 'Expired' : 'Upcoming' }}
                            </span>
                        </div>
                    </div>

                    <!-- Post Description -->
                    <div class="post-description mt-4">
                        <p class="lead">{!! $eventsingle->description !!}</p>
                    </div>
                </div>
            </div>
            <!-- Sidebar Column -->
            <div class="col-lg-4" data-aos="fade-left"  data-aos-duration="3000">
                <div class="sidebar sticky-sidebar">
                    <div class="bg-white rounded shadow-sm p-4">
                        <h4 class="sidebar-title text-center text-primary mb-4">Recent Events</h4>
                        <ul class="list-unstyled">
                            @foreach ($popular_events as $popular_posts)
                                <li class="d-flex mb-3">
                                    <img class="img-fluid rounded me-3"
                                        src="{{ asset( $popular_posts->image) }}"
                                        alt="{{ $popular_posts->name }}"
                                        style="width: 60px; height: 60px; object-fit: cover;">
                                    <a class="text-dark" style="margin-top: 20px;"
                                        href="">{{ $popular_posts->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    