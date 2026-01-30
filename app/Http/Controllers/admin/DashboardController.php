<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use App\Models\ContactInquiry;
use App\Models\Country;
use App\Models\Course;
use App\Models\Enquiries;
use App\Models\Page;
use App\Models\Popup;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $countries = Country::count();
        $courses = Course::count();
        $enquirys = Enquiries::count();
        $blogs = Blog::count();

        $inquiries = ContactInquiry::count();
        $teams = Team::count();
        $services = Service::count();
        $popups = Popup::count();
        $testimonials = Testimonial::count();
        $sliders = Slider::count();
        // $advertisements = Advertisement::count();
        $pages = Page::count();

        $vars = [
            'countries' => ['bx-globe-alt', 'country.index', $countries],
            'courses' => ['bx-book', 'course.index', $courses],
            'Student Enquiries' => ['bx-question-mark', 'enquiry.index', $enquirys],
            'blogs' => ['bx-news', 'blog.index', $blogs],
            'pages' => ['bx-copy-alt', 'page.index', $pages],
            'inquiries' => ['bx-support', 'contactinquiry.index', $inquiries],
            'services' => ['bx-server', 'service.index', $services],
            'popups' => ['bx-copy', 'popup.index', $popups],
            'teams' => ['bx-group', 'team.index', $teams],
            'testimonials' => ['bx-message-dots', 'testimonial.index', $testimonials],
            'sliders' => ['bx-slider', 'slider.index', $sliders],
            // "Advertisement" => ["ri-advertisement-line", "advertisement.index", $advertisements],
            'Settings' => ['bx-cog', 'admin.setting.index', 'N/A'],
        ];

        return view('admin.dashboard.index', compact(['vars']));
    }
}
