@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.seo', [
        'name' => $settings['homepage_title'] ?? '',
        'title' => $settings['homepage_seo_title'] ?? '',
        'description' => $settings['home_seo_description'] ?? '',
        'keyword' => $settings['homepage_seo_keywords'] ?? '',
        'created_at' => '2024-04-26T08:09:15+00:00',
        'updated_at' => '2024-04-26T10:54:05+00:00',
    ])
@endsection

@section('content')
    <section class="page-banner pt-xs-60 pt-sm-80 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-banner__content mb-xs-10 mb-sm-15 mb-md-15 mb-20">
                        <div class="transparent-text">Gallery</div>
                        <div class="page-title">
                            <h1>{{ $album->name }}</h1>
                        </div>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('frontend.gallery') }}">Gallery</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $album->name }}</li>

                        </ol>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="page-banner__media mt-xs-30 mt-sm-40">
                        <img src="assets/img/page-banner/page-banner-start.svg" class="img-fluid start" alt="">
                        <img src="{{ $gallery_page->banner_image }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Gallery Images --}}
    <div class="container py-4">
        <div class="row g-3">
            @forelse ($album->galleries as $gallery)
                <div class="col-md-4 col-sm-6 mb-4">
                    <a data-fancybox="{{ $album->slug }}" data-caption="{{ $gallery->name }}"
                        href="{{ asset($gallery->image) }}">
                        <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->name }}"
                            class="img-fluid rounded shadow-sm" style="object-fit: cover; height: 250px; width: 100%;">
                    </a>
                </div>
            @empty
                <p class="text-center">No images available in this album.</p>
            @endforelse
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Fancybox.bind("[data-fancybox]", {
                infinite: true,
                buttons: ["zoom", "slideShow", "fullScreen", "thumbs", "close"],
            });
        });
    </script>
@endpush
