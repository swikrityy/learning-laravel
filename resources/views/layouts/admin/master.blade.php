<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $settings['site_title'] ?? config('app.name', 'Celta') }} - {{ $title }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="{{ $settings['site_fav_icon'] ? asset($settings['site_fav_icon']) : asset('admin/default/img/favicon.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />


    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    {{-- Remixicon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    {{-- Choicesjs --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/choices/styles/choices.min.css') }}">

    <!-- Page CSS -->
    @stack('css')

    <!-- Helpers -->
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>

    {{-- Sweetalert --}}
    <script src="{{ asset('admin/assets/js/sweetalert-new.js') }}"></script>

    {{-- Dropify --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/dropify/css/dropify.min.css') }}">

    {{-- Dropzone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">

    {{-- FancyBox --}}
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    {{-- Toaster--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        /* Target the Dropify container */
        .dropify-wrapper .dropify-message p {
            font-size: 16px;
            /* Adjust the size as needed */
        }

        .dropify-wrapper .dropify-message .file-icon p {
            font-size: 16px;
            /* Adjust the size as needed */
        }
    </style>

    {{-- CK-Editor --}}
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }

        .ck-editor__editable ul>li {
            list-style: disc;
        }

        .ck-editor__editable ol>li {
            list-style: decimal;
        }
    </style>

    <style>
        .table_image {
            width: 3rem;
            height: 3rem;
        }
    </style>


    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/datatable/datatables.css') }}">
    <script src="{{ asset('admin/assets/vendor/libs/datatable/datatables.js') }}"></script>

    {{--
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script> --}}
</head>

<body>


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('layouts.admin.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('layouts.admin.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- Notification alerts -->
                        @include('admin.includes.notification')

                        <!-- Layout Demo -->
                        @yield('content')
                        <!--/ Layout Demo -->
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->

                    @include('layouts.admin.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->
    <!-- Vendors JS -->
    <script src="{{ asset('admin/assets/js/sweetalert-new.js') }}"></script>
    {{-- Dropify's Js --}}
    <script src="{{ asset('admin/assets/vendor/libs/dropify/js/dropify.min.js') }}"></script>
    <script>
        $('#image').dropify();
        $('.dropify').dropify();
        $('#site_main_logo').dropify();
        $('#banner_image').dropify();


        /* const dropifyMessages = {
            'default': '',
            'replace': '',
            'remove': 'Remove',
            'error': 'Ooops, something wrong happened.'
        }; */
    </script>
    <!-- Main JS -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <!-- CkEditor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>
    <script>
        // let table = new DataTable('#myTable');
        ckeditor("ckeditor");
        ckeditor("ckeditor1");
        ckeditor("ckeditor2");
        ckeditor("ckeditor3");
        ckeditor("ckeditor4");
        ckeditor("video-desc");
        ckeditor("overviewckeditor");
        function ckeditor($className) {
            CKEDITOR.ClassicEditor.create(document.querySelector("." + $className), {
                toolbar: {
                    items: [
                        "heading",
                        "|",
                        "bold",
                        "italic",
                        "strikethrough",
                        "underline",
                        "code",
                        "subscript",
                        "superscript",
                        "removeFormat",
                        "|",
                        "bulletedList",
                        "numberedList",
                        "|",
                        "outdent",
                        "indent",
                        "|",
                        "undo",
                        "redo",
                        "|",
                        "fontSize",
                        "fontFamily",
                        "fontColor",
                        "|",
                        "alignment",
                        "|",
                        "link",
                        "insertImage",
                        "blockQuote",
                        "insertTable",
                        "mediaEmbed",
                        "|",
                        "specialCharacters",
                        "horizontalLine",
                        "pageBreak",
                        "|",
                        "sourceEditing",
                    ],
                    shouldNotGroupWhenFull: true,
                },
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true,
                    },
                },
                heading: {
                    options: [{
                        model: "paragraph",
                        title: "Paragraph",
                        class: "ck-heading_paragraph",
                    },
                    {
                        model: "heading1",
                        view: "h1",
                        title: "Heading 1",
                        class: "ck-heading_heading1",
                    },
                    {
                        model: "heading2",
                        view: "h2",
                        title: "Heading 2",
                        class: "ck-heading_heading2",
                    },
                    {
                        model: "heading3",
                        view: "h3",
                        title: "Heading 3",
                        class: "ck-heading_heading3",
                    },
                    {
                        model: "heading4",
                        view: "h4",
                        title: "Heading 4",
                        class: "ck-heading_heading4",
                    },
                    {
                        model: "heading5",
                        view: "h5",
                        title: "Heading 5",
                        class: "ck-heading_heading5",
                    },
                    {
                        model: "heading6",
                        view: "h6",
                        title: "Heading 6",
                        class: "ck-heading_heading6",
                    },
                    ],
                },
                placeholder: "",
                fontFamily: {
                    options: [
                        "default",
                        "Arial, Helvetica, sans-serif",
                        "Courier New, Courier, monospace",
                        "Georgia, serif",
                        "Lucida Sans Unicode, Lucida Grande, sans-serif",
                        "Tahoma, Geneva, sans-serif",
                        "Times New Roman, Times, serif",
                        "Trebuchet MS, Helvetica, sans-serif",
                        "Verdana, Geneva, sans-serif",
                    ],
                    supportAllValues: true,
                },
                fontSize: {
                    options: [
                        8,
                        10,
                        12,
                        14,
                        "default",
                        18,
                        20,
                        22,
                        24,
                        26,
                        28,
                        30,
                        32,
                        34,
                        36,
                    ],
                    supportAllValues: true,
                },
                htmlSupport: {
                    allow: [{
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true,
                    },],
                },
                htmlEmbed: {
                    showPreviews: true,
                },
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: "https://",
                        toggleDownloadable: {
                            mode: "manual",
                            label: "Downloadable",
                            attributes: {
                                download: "file",
                            },
                        },
                    },
                },
                mention: {
                    feeds: [{
                        marker: "@",
                        feed: [
                            "@apple",
                            "@bears",
                            "@brownie",
                            "@cake",
                            "@cake",
                            "@candy",
                            "@canes",
                            "@chocolate",
                            "@cookie",
                            "@cotton",
                            "@cream",
                            "@cupcake",
                            "@danish",
                            "@donut",
                            "@dragée",
                            "@fruitcake",
                            "@gingerbread",
                            "@gummi",
                            "@ice",
                            "@jelly-o",
                            "@liquorice",
                            "@macaroon",
                            "@marzipan",
                            "@oat",
                            "@pie",
                            "@plum",
                            "@pudding",
                            "@sesame",
                            "@snaps",
                            "@soufflé",
                            "@sugar",
                            "@sweet",
                            "@topping",
                            "@wafer",
                        ],
                        minimumCharacters: 1,
                    },],
                },
                removePlugins: [
                    "CKBox",
                    "CKFinder",
                    "EasyImage",
                    "RealTimeCollaborativeComments",
                    "RealTimeCollaborativeTrackChanges",
                    "RealTimeCollaborativeRevisionHistory",
                    "PresenceList",
                    "Comments",
                    "TrackChanges",
                    "TrackChangesData",
                    "RevisionHistory",
                    "Pagination",
                    "WProofreader",
                    "MathType",
                ],

            });
        }
    </script>
    {{-- Dropzone --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
    {{-- Choicesjs --}}
    <script type="text/javascript"
        src="{{ asset('admin/assets/vendor/libs/choices/scripts/choices.min.js') }}"></script>
    {{-- Databale --}}
    <script>
        new DataTable('#dtable');
    </script>
    <!-- Page JS -->
    @yield('js')
    @stack('js')
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script async defer src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
</body>

</html>