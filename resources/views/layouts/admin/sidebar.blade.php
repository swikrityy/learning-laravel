<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo my-4">
        <span class="app-brand-logo demo" style="display: tableblock; width: 100%; margin: auto 2rem;">
            <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
                <img src="{{ $settings['site_main_logo'] ? asset($settings['site_main_logo']) : asset('frontend/assets/image/logo.png') }}"
                    width="120px" alt="Umi Advisor">
            </a>
        </span>
        {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Paradise</span> --}}
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow my-4"></div>
    <ul class="menu-inner py-4">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::segment(2) == '' || Request::segment(2) == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li
            class="menu-item {{ Request::segment(2) == 'inquiry' || Request::segment(2) == 'contactinquiry' ? 'active' : '' }} ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Layouts">Inquries</div>
            </a>
            <ul class="menu-sub ">
                <li class="menu-item {{ Request::segment(2) == 'contactinquiry' ? 'active' : '' }}">
                    <a href="{{ route('contactinquiry.index') }}" class="menu-link">
                        <div>Contact Inquiries</div>
                    </a>
                </li>
                {{-- <li class="menu-item {{ Request::segment(2) == 'enquiry' ? 'active' : '' }}">
                    <a href="{{ route('enquiry.index') }}" class="menu-link">
                        <div>Students Enquiry</div>
                    </a>
                </li> --}}
            </ul>

        </li>
        <!-- CMS -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text"> <i class="ri-admin-line"></i> Cms</span>
        </li>
        {{-- <li class="menu-item {{ Request::segment(2) == 'enquiry' ? 'active' : '' }}">
            <a href="{{ route('enquiry.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-question-mark'></i>
                Students Enquiry
            </a>
        </li> --}}
        {{-- <li class="menu-item {{ Request::segment(2) == 'application' ? 'active' : '' }}">
            <a href="{{ route('application.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div>Application</div>
            </a>
        </li> --}}
        {{-- <li
            class="menu-item {{ Request::segment(2) == 'application' || Request::segment(2) == 'visa-grant' || Request::segment(2) == 'visa-refused' || Request::segment(2) == 'visa-withdraw' ? 'active open' : '' }} ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Layouts">Application</div>
            </a>
            <ul class="menu-sub ">
                <li class="menu-item {{ Request::segment(2) == 'application' ? 'active' : '' }}">
                    <a href="{{ route('application.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-trophy"></i>
                        <div>All Applications</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(2) == 'visa-grant' ? 'active' : '' }}">
                    <a href="{{ route('result.visaGrant') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-check-circle"></i>
                        <div>Visa Grant</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(2) == 'visa-refused' ? 'active' : '' }}">
                    <a href="{{ route('result.visaRefused') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-block"></i>
                        <div>Visa Refused</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(2) == 'visa-withdraw' ? 'active' : '' }}">
                    <a href="{{ route('result.visaWithdraw') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-undo"></i>
                        <div>Visa Withdraw</div>
                    </a>
                </li>
            </ul>

        </li> --}}
        {{-- <li class="menu-item {{ Request::segment(2) == 'result' ? 'active' : '' }}">
            <a href="{{ route('result.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-trophy"></i>
                <div>Result</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(2) == 'visa-grant' ? 'active' : '' }}">
            <a href="{{ route('result.visaGrant') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-check-circle"></i>
                <div>Visa Grant</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(2) == 'visa-refused' ? 'active' : '' }}">
            <a href="{{ route('result.visaRefused') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-block"></i>
                <div>Visa Refused</div>
            </a>
        </li> --}}
        {{-- <li class="menu-item {{ Request::segment(2) == 'visa-withdraw' ? 'active' : '' }}">
            <a href="{{ route('result.visaWithdraw') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-undo"></i>
                <div>Visa Withdraw</div>
            </a>
        </li> --}}
        <li class="menu-item {{ Request::segment(2) == 'country' ? 'active' : '' }}">
            <a href="{{ route('country.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-globe-alt"></i>
                <div>Countries</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(2) == 'countrylocation' ? 'active' : '' }}">
            <a href="{{ route('countrylocation.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map"></i>
                <div>Student Essentials</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(2) == 'course' ? 'active' : '' }}">
            <a href="{{ route('course.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div>Courses</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(2) == 'branch' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('branch.index') }}">
                <i class="menu-icon tf-icons bx bx-buildings"></i>
                <div>Branches </div>
            </a>
        </li>
        {{-- <li class="menu-item {{ Request::segment(2) == 'university' ? 'active' : '' }}">
            <a href="{{ route('university.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div>Universities</div>
            </a>
        </li> --}}
        <li class="menu-item {{ Request::segment(2) == 'blog' ? 'active' : '' }}">
            <a href="{{ route('blog.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div>Blogs</div>
            </a>
        </li>
        {{-- <li class="menu-item {{ Request::segment(2) == 'gallery' ? 'active' : '' }}">
            <a href="{{ route('gallery.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div>Gallery</div>
            </a>
        </li> --}}
        <li class="menu-item {{ Request::segment(2) == 'album' ? 'active' : '' }}">
            <a href="{{ route('album.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div>Album</div>
            </a>
        </li>
        {{-- <li class="menu-item {{ Request::segment(2) == 'success' ? 'active' : '' }}">
            <a href="{{ route('success.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-star"></i>
                <div>Visa Granted</div>
            </a>
        </li> --}}
        <li class="menu-item {{ Request::segment(2) == 'page' ? 'active' : '' }}">
            <a href="{{ route('page.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-copy-alt"></i>
                <div>Pages</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(2) == 'team' ? 'active' : '' }}">
            <a href="{{ route('team.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div>Teams</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(2) == 'service' ? 'active' : '' }}">
            <a href="{{ route('service.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <div>Services</div>
            </a>
        </li>
        {{-- <li class="menu-item {{ Request::segment(2) == 'contact' ? 'active' : '' }}">
            <a href="{{ route('contact.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-phone"></i>
                <div>Contact </div>
            </a>
        </li> --}}
        <li class="menu-item {{ Request::segment(2) == 'slider' ? 'active' : '' }}">
            <a href="{{ route('slider.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-slider"></i>
                <div>Sliders</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(2) == 'event' ? 'active' : '' }}">
            <a href="{{ route('event.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-slider"></i>
                <div>Event</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(2) == 'faq' ? 'active' : '' }}">
            <a href="{{ route('faq.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-help-circle"></i>
                <div>Faqs</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(2) == 'testimonial' ? 'active' : '' }}">
            <a href="{{ route('testimonial.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message-dots"></i>
                <div>Testimonials</div>
            </a>
        </li>
        <li class="menu-item {{ Request::segment(2) == 'whychooseus' ? 'active' : '' }}">
            <a href="{{ route('whychooseus.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-question-mark'></i>
                Student Review
            </a>
        </li>
        {{-- <li class="menu-item {{ Request::segment(2) == 'advertisement' ? 'active' : '' }}">
            <a href="{{ route('advertisement.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ri-advertisement-line"></i>
                <div>Advertisements</div>
            </a>
        </li> --}}
        <!-- Settings -->
        <li
            class="menu-item {{ Request::segment(2) == 'payment' || Request::segment(2) == 'social' || Request::segment(2) == 'popup' || Request::segment(2) == 'setting' ? 'active' : '' }} ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Layouts">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::segment(2) == 'setting' ? 'active' : '' }}">
                    <a href="{{ route('admin.setting.index') }}" class="menu-link">
                        <div>Global Settings</div>
                    </a>
                </li>
                {{-- <li class="menu-item {{ Request::segment(2) == 'popup' ? 'payment' : '' }}">
                    <a href="{{ route('payment.index') }}" class="menu-link">
                        <div>Payment Methods</div>
                    </a>
                </li> --}}
                <li class="menu-item {{ Request::segment(2) == 'popup' ? 'active' : '' }}">
                    <a href="{{ route('popup.index') }}" class="menu-link">
                        <div>PopUps</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::segment(2) == 'social' ? 'active' : '' }}">
                    <a href="{{ route('social.index') }}" class="menu-link">
                        <div>Social Medias</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>