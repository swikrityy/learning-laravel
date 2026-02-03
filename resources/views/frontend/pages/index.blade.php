@section('seo')
    @include('frontend.seo', [
        'name' => $page->seo_title ?? '',
        'title' => $page->seo_title ?? $page->title,
        'description' => $page->meta_description ?? '',
        'keyword' => $page->meta_keywords ?? '',
        'schema' => $page->seo_schema ?? '',
        'created_at' => $page->created_at,
        'updated_at' => $page->updated_at,
    ])
@endsection
@extends('layouts.frontend.master')
@section('content')
    <!----page header----->
    @if ($page)
        <div class="breadcumb-area d-flex" style="
           background: url('{{ asset($page->banner_image ?? '') }}');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center">
                        <div class="breadcumb-content">
                            <div class="breadcumb-title">
                                <h4>{{ $page->title ?? 'About Us' }}</h4>
                            </div>
                            <ul>
                                <li><a href="{{ route('frontend.home') }}"><i class="bi bi-house-door-fill"></i> Home </a>
                                </li>
                                <li class="rotates"><i class="bi bi-slash-lg"></i>{{ $page->title ?? 'About Us' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!----page header----->
    <!---blog--->
    <section class="blog-section py-5">
        <!--===============spacing==============-->
        <div class="pd_top_75"></div>s
        <!--===============spacing==============-->
        <div class="container">
            <div class="row gutter_30px">
                <div class="col-lg-12">
                    <h3>{{ $page->title }}</h3>
                    <div class="blog_post_section three_column style_seven">
                        <p> {!! $page->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_65"></div>
        <!--===============spacing==============-->
    </section>
@endsection
