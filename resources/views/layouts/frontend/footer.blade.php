<!-- footer start -->
<footer class="footer-1 footer-3 overflow-hidden" style="background-image: url(assets/img/footer/footer-bg-3.png);">
    <div class="overly">
        <div class="container"></div>
    </div>
    {{-- <div class="footer-top__box pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInUp" data-wow-delay=".5s">
                    <div class="footer-top__box-wrapper d-flex flex-column flex-sm-row text-center text-sm-start justify-content-sm-between align-items-center"
                        style="background-image: url(assets/img/footer/footer-box-bg.png);">
                        <div class="text">
                            <h3 class="title color-white">Get updated Informed to Subscribe our Newsletter</h3>
                        </div>

                      
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6 col-xl-3">
                <div class="single-footer-wid widget-description">
                    <a href="index.html" class="d-block mb-30 mb-xs-20">
                        <img src="{{ $settings['site_footer_logo'] }}" alt="footer logo">
                    </a>

                    <div class="description font-la color-white mb-40 mb-sm-30 mb-xs-25">
                        <p>{{ $settings['site_information'] }}</p>
                    </div>

                    {{-- <a href="#" class="theme-btn btn-red btn-md fw-600">Purchase Now <i
                            class="far fa-chevron-double-right"></i></a> --}}
                </div>
            </div>
            <!-- /.col-lg-3 - single-footer-wid -->

            <div class="col-md-6 col-xl-2">
                <div class="single-footer-wid pl-xl-10 pl-50">
                    <h4 class="wid-title mb-30 color-white">Quick Link</h4>

                    <ul>
                        <li><a href="{{ route('frontend.about') }}">Our Company</a></li>
                        <li><a href="{{ route('frontend.service') }}">Service</a></li>
                        {{-- <li><a href="{{ route('frontend.event') }}">Events</a></li> --}}
                        <li><a href="{{ route('frontend.team') }}">Team</a></li>
                        <li><a href="{{ route('frontend.testimonial') }}">Testimonial</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.col-lg-2 - single-footer-wid -->

            <div class="col-md-6 col-xl-4">
                <div class="single-footer-wid recent_post_widget pl-xl-10 pl-65 pr-50 pr-xl-30">
                    <h4 class="wid-title mb-30 color-white">Recent Blogs</h4>

                    <div class="recent-post-list">
                        @foreach ($recent_post as $post)


                            <a href="blog.html" class="single-recent-post mb-20 pb-20 d-flex align-items-center">
                                <div class="thumb">
                                    <img src="{{ $post->image }}" alt="blog image">
                                </div>

                                <div class="post-data">
                                    <h5 class="color-white mb-10 fw-600">{{ $post->title }}</h5>
                                    {{-- <span class="color-white d-flex ailign-items-center"><i
                                            class="far fa-clock"></i>January
                                        11, 2018</span> --}}
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.col-lg-4 - single-footer-wid -->

            <div class="col-md-6 col-xl-3">
                <div class="single-footer-wid">
                    <h4 class="wid-title mb-30 color-white">Office Location</h4>
                    <iframe src="{{ $settings['site_location_url'] }}" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <!-- /.col-lg-3 - single-footer-wid -->
        </div>
    </div>

    <div class="footer-bottom overflow-hidden mt-20 mt-sm-15 mt-xs-10">
        <div class="container">
            <div
                class="footer-bottom-content d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="coppyright text-center text-md-start">
                    © 2025 <a href="/">{{ $settings['site_copyright'] }}</a> | All Rights Reserved by <a
                        href="/">{{ $settings['site_copyright'] }}</a>
                </div>

                <div class="footer-bottom-list last_no_bullet">
                    <ul>
                        {{-- <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->