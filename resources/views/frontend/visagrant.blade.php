@section('seo')
    @include('frontend.seo', [
        'name' => $visagrantes_page->seo_title ?? '',
        'title' => $visagrantes_page->seo_title ?? $visagrantes_page->title,
        'description' => $visagrantes_page->meta_description ?? '',
        'keyword' => $visagrantes_page->meta_keywords ?? '',
        'schema' => $visagrantes_page->seo_schema ?? '',
        'created_at' => $visagrantes_page->created_at,
        'updated_at' => $visagrantes_page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    <!----page header----->
    @if ($visagrantes_page)
        <div class="breadcumb-area d-flex"
            style="
            background: url('{{ asset($visagrantes_page->banner_image ?? '') }}');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center">
                        <div class="breadcumb-content">
                            <div class="breadcumb-title">
                                <h4>{{ $visagrantes_page->title ?? 'About Us' }}</h4>
                            </div>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}"><i class="bi bi-house-door-fill"></i> Home </a>
                                </li>
                                <li class="rotates"><i
                                        class="bi bi-slash-lg"></i>{{ $visagrantes_page->title ?? 'About Us' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!----page header----->
    <section class="py-5">
        <div class="container">
            <div class="row">
                @foreach ($visagranted as $story)
                    <div class="col-lg-4 py-3" data-aos="fade-up" data-aos-duration="3000">
                        <div class="sucess-story-container">
                            <a class="fro-dropzone-image-a fancybox" data-fancybox="gallery"
                                href="{{ asset($story->image) }}" target="_blank">
                                <div class="fancy_image">
                                    <img class="fro-dropzone-image-img" src="{{ asset($story->image) }}"
                                        alt="{{ $story->title ?? 'Success Story' }}">
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Fancybox.bind("[data-fancybox='gallery']", {
                // Customize your FancyBox options here
                infinite: true,
                buttons: ["zoom", "slideShow", "fullScreen", "download", "thumbs", "close"],
            });
        });
    </script>
@endsection
