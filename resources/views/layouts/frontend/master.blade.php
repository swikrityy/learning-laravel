<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="paradise">

    <!-- ======== Page SEO ======== -->
    @yield('seo')

    <!-- ========== Favicon Icon ========== -->
    <link rel="icon" type="image/x-icon"
          href="{{ $settings['site_fav_icon'] ? asset($settings['site_fav_icon']) : 'Umi Advisor' }}" />

    <!-- ========== Stylesheets ========== -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" media="print"
          onload="this.media='all'">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- SweetAlert JS in head (optional, can be moved to bottom if preferred) -->
    <script src="{{ asset('admin/assets/js/sweetalert-new.js') }}"></script>
</head>

<body class="body-wrapper">

    <!-- Header -->
    @include('layouts.frontend.header')

    <!-- Page Content -->
    @yield('content')

    <!-- Footer -->
    @include('layouts.frontend.footer')

    <!-- GTranslate -->
    <div class="gtranslate_wrapper"></div>
    <script>
        window.gtranslateSettings = {
            "default_language": "en",
            "languages": ["en", "ne", "ja"],
            "wrapper_selector": ".gtranslate_wrapper",
            "switcher_horizontal_position": "right",
            "flag_style": "3d"
        };
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

    <!-- Floating WhatsApp -->
    <a href="https://api.whatsapp.com/send?phone={{ preg_replace('/\D+/', '', $setting['whatsapp_number'] ?? '817092770229') }}"
       class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <!-- ========== JS Plugins ========== -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky-kit.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/active.js') }}"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- FancyBox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <!-- Toastify -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- SweetAlert -->
    <script src="{{ asset('admin/assets/js/sweetalert-new.js') }}"></script>

    <!-- Initialize FancyBox & Swiper or page-specific JS -->
    @stack('js')

</body>
</html>
