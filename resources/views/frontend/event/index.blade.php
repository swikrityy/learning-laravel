@section('seo')
    @include('frontend.seo', [
        'name' => $event_page->seo_title ?? '',
        'title' => $event_page->seo_title ?? $event_page->title,
        'description' => $event_page->meta_description ?? '',
        'keyword' => $event_page->meta_keywords ?? '',
        'schema' => $event_page->seo_schema ?? '',
        'created_at' => $event_page->created_at,
        'updated_at' => $event_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    @if ($event_page)
        <div class="hero-banner2 position-relative ">
            <div class="row g-0 text-bannner-section">
                <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                    <div class="text-center page-banner-lft px-4">
                        <h1 class="text-white font-weight-bold">{{ $event_page->title ?? 'About Us' }}</h1>
                        <p class="breadcrumb-text text-white">
                            <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                            <a href="#"
                                class="text-white text-decoration-none">{{ $event_page->title ?? 'About Us' }}</a>
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
        <!-- Events Grid -->
        <div class="row g-4">
            @foreach ($events as $event)
                @php
                    $eventDate = \Carbon\Carbon::parse($event->date);
                    $today = now()->startOfDay();
                    $isExpired = $eventDate->lt($today);

                    $formattedDate = $eventDate->format('d M Y');
                    $formattedTime = \Carbon\Carbon::parse($event->time)->format('h:i A');
                @endphp
                <div class="col-lg-12 col-md-6" data-aos="fade-up" data-aos-duration="3000">
                    <div class="row shadow">
                        <div class="col-lg-6">
                            <div class="card event-card h-100">
                                <!-- Status Badge -->
                                <span class="badge status-badge {{ $isExpired ? 'badge-expired' : 'badge-upcoming' }}">
                                    {{ $isExpired ? 'Expired' : 'Upcoming' }}
                                </span>
                                <!-- Event Image -->
                                <div class="event-image">
                                    <img class="img-fluidevent" style="height: 280px" src="{{ asset($event->image) }}"
                                        alt="{{ $event->name ?? '' }}">
                                </div>
                                <!-- Event Details -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="event-details">
                                <h3 class="event-title">{{ $event->name ?? '' }}</h3>
                                <p class="event-description">
                                    {!! Str::words(strip_tags($event->description ?? ''), 18, '...') !!}
                                </p>
                                <div class="event-info">
                                    <div class="info-item">
                                        <i class="fas fa-calendar info-icon"></i>
                                        <span><strong>{{ $formattedDate }}</strong></span>
                                    </div>
                                    <div class="info-item">
                                        <i class="fas fa-clock info-icon"></i>
                                        <span>{{ $formattedTime }} onwards</span>
                                    </div>
                                    <div class="info-item">
                                        <i class="fas fa-map-marker-alt info-icon"></i>
                                        <span>{{ $event->location ?? '' }}</span>
                                    </div>
                                </div>
                                <a class="btn btn-register btn-upcoming"
                                    href="{{ route('frontend.eventsingle', $event->slug) }}">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
