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
                                        <h1>{{ $gallery_page->title }}</h1>
                                    </div>
                                </div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $gallery_page->title }}</li>
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


                        <div class="container py-4">
                        <!-- Tabs nav -->
                        {{-- <ul class="nav nav-tabs custom-tabs justify-content-center" id="albumTab" role="tablist">
                            @foreach ($albums as $key => $album)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link custom-tab-link {{ $key == 0 ? 'active' : '' }}" id="tab-{{ $album->id }}"
                                        data-bs-toggle="tab" data-bs-target="#content-{{ $album->id }}" type="button" role="tab"
                                        aria-controls="content-{{ $album->id }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                        {{ $album->name }}
                                    </button>
                                </li>
                            @endforeach
                        </ul> --}}

                         <div class="row justify-content-center">
            @foreach ($albums as $album)
                <div class="col-md-4 col-sm-6 mb-4">
                    <a href="{{ route('frontend.albums.show', $album) }}" class="text-decoration-none">
                        <div class="card shadow-lg border-0 h-100">
                            <img src="{{ asset($album->image) }}" 
                                 alt="{{ $album->name }}" 
                                 class="card-img-top img-fluid rounded" 
                                 style="object-fit: cover; height: 300px;">

                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $album->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>


                        <!-- Tabs content -->
                        {{-- <div class="tab-content mt-4" id="albumTabContent">
                            @foreach ($albums as $key => $album)
                                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="content-{{ $album->id }}"
                                    role="tabpanel" aria-labelledby="tab-{{ $album->id }}">
                                    <div class="row g-3">
                                        @foreach ($album->galleries as $gallery)
                                        <div class="col-md-4">
                                            <a class="album-card" data-fancybox="{{ $album->id }}"
                                                data-caption="{{ $gallery->name }}" href="{{ asset($gallery->image) }}">
                                                <img class="w-100 rounded gallery" src="{{ asset($gallery->image) }}"
                                                    alt="{{ $gallery->name }}" />
                                            </a>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>  --}}

                    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Fancybox.bind("[data-fancybox='gallery']", {
                // Customize your FancyBox options here
                infinite: true,
                buttons: ["zoom", "slideShow", "fullScreen", "download", "thumbs", "close"],
            });
        });
    </script>
@endpush