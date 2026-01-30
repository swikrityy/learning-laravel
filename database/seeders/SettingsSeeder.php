<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            // Global
            ['site_title', 'Umi-Advisor'],
            ['site_title_full', 'Umi-Advisor Educare'],
            ['site_main_logo', 'admin/assets/img/logo.png'],
            ['site_fav_icon', 'admin/assets/img/favicon.png'],
            ['site_footer_logo', 'admin/assets/img/logo.png'],
            ['site_contact_image', 'admin/assets/img/logo.png'],
            ['site_information', 'Umi-Advisor Educare'],

            ['site_phone', '01-5907931'],
            ['site_email', 'Umi-Advisor@gmail.com'],
            ['site_location', 'Kathmandu, Nepal'],
            ['site_location_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d440.57915189381816!2d85.32309917747837!3d27.668628534399804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb193be21aea5b%3A0xaa83ef792abf1f63!2sUmi-Advisor%20Educare%20Consultancy!5e1!3m2!1sen!2snp!4v1744195769373!5m2!1sen!2snp'],
            ['site_mail', 'mail.Umi-Advisor.com.np'],
            ['site_url', '/'],

            ['site_copyright', 'Umi-Advisor'],

            // contact

            ['contact_title', 'Contact'],
            ['contact_image', null],

            ['contact_banner_image', null],
            ['contact_section_title', 'Get In Touch'],
            ['contact_description', 'Umi-Advisor'],

            ['contact_location', 'Chitwan, Kathmandu'],
            ['contact_email', 'info@Umi-Advisor.com'],
            ['contact_phone', '+977 9803997680'],
            ['contact_map', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.0484157527694!2d85.30792607532406!3d27.715791376177723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fcf0cf3907%3A0x6ef9b1f3832b778a!2sFlyeast%20Nepal!5e0!3m2!1sen!2snp!4v1716137632306!5m2!1sen!2snp'],

            ['contact_seo_title', 'Umi-Advisor'],
            ['contact_seo_description', 'Umi-Advisor'],
            ['contact_seo_keywords', 'Umi-Advisor'],
            ['contact_seo_schema', 'Umi-Advisor'],

            ['contactform_title', 'Leave us your info'],
            ['contactform_description', 'Provide your details, and well schedule a call at your convenience.'],

            // Homepage

            ['homepage_title', 'Under the Stars:An Educational Journey'],
            ['homepage_small_title', 'Serenade Under the Stars: An Educational Journey” invites you to immerse yourself in an enchanting evening under the open sky'],
            ['homepage_image', null],
            ['homepage_description', 'Serenade Under the Stars: An Educational Journey” invites you to immerse yourself in an enchanting evening under the open sky'],

            ['home_cta_1_text', 'Get in Touch'],
            ['home_cta_1_link', '/contact-us'],
            ['home_cta_2_text', 'View Courses'],
            ['home_cta_2_link', '/our-courses'],

            ['homepage_seo_title', 'Umi-Advisor'],
            ['homepage_seo_keywords', 'Umi-Advisor'],
            ['homepage_meta_description', 'Umi-Advisor'],
            ['homepage_seo_schema', 'Umi-Advisor'],

            ['homepage_slider_cta_button', 'Get in Touch'],
            ['homepage_slider_event_button', 'Event Calendar'],

            ['universities_title', 'Our Partner Universities'],
            ['universities_subtitle', 'Dive into Excitement with Our Latest universities!'],
            ['universities_description', ''],
            ['universities_link', '/about'],
            ['universities_button', 'See All'],
            ['home_universities', ''],

            ['countries_title', 'Countries We Deal With'],
            ['countries_subtitle', '"Study Abroad with Confidence'],
            ['countries_description', 'Dive into Excitement with Our Latest countries!'],
            ['countries_link', '/about'],
            ['countries_button', 'See All'],
            ['home_countries', ''],

            ['whyChooseUs_title', 'Why Choose Us?'],
            ['whyChooseUs_subtitle', 'Our education consultants can support with excellence in guidance with education and visa consultancy in this country. We’ve been growing since 2003 with over 50 branches across 15 countries. You can enjoy a wide range of services for fulfilling your dreams to study in Australia, the UK, Canada and the US.'],
            ['whyChooseUs_description', 'Our education consultants can support with excellence in guidance with education and visa consultancy in this country. We’ve been growing since 2003 with over 50 branches across 15 countries. You can enjoy a wide range of services for fulfilling your dreams to study in Australia, the UK, Canada and the US.'],
            ['whyChooseUs_link', '/about'],
            ['whyChooseUs_button', 'See All'],

            // Homecounter
            ['home_counter_students_title', 'International Students Assisted'],
            ['home_counter_students', '10000'],
            ['home_counter_scholarship_title', 'Scholarship Approved'],
            ['home_counter_scholarship', '1000'],
            ['home_counter_enrolled_title', 'Enrolled in IELTS/PTE classes'],
            ['home_counter_enrolled', '2500'],

            ['home_counter_students_img', 'admin/assets/img/hand.png'],
            ['home_counter_scholarship_img', 'admin/assets/img/faq.png'],
            ['home_counter_enrolled_img', 'admin/assets/img/flat.jpg'],

            ['teams_title', 'Our Teams'],
            ['teams_subtitle', '"Study Abroad with Confidence'],
            ['teams_description', '"Study Abroad with Confidence'],
            ['teams_link', '/teams'],
            ['teams_button', 'See All'],
            ['home_teams', ''],

            ['services_title', 'Our Services'],
            ['services_subtitle', '"Study Abroad with Confidence'],
            ['services_description', '"Study Abroad with Confidence'],
            ['services_link', '/services'],
            ['services_button', 'See All'],
            ['home_services', ''],

            ['aboutus_title', 'About Us'],
            ['aboutus_subtitle', 'Dive into Excitement with Our Latest aboutus!'],
            ['aboutus_description', 'Dive into Excitement with Our Latest aboutus!'],
            ['aboutus_link', '/about'],
            ['aboutus_button', 'See All'],

            ['contact_form_title', 'Interested To Join Our Classes?'],
            ['contact_form_subtitle', 'Fill the form given to book for our IELTS/PTE classes.'],
            ['contact_form_description', 'Fill the form given to book for our IELTS/PTE classes.'],

            ['courses_title', 'Our Courses'],
            ['courses_subtitle', '"Study Abroad with Confidence'],
            ['courses_description', '"Study Abroad with Confidence'],
            ['courses_link', '/courses'],
            ['courses_button', 'See All'],
            ['home_courses', ''],

            ['testioninal_title', 'Our Testimonials'],
            ['testioninal_subtitle', '"Study Abroad with Confidence'],
            ['testioninal_description', '"Study Abroad with Confidence'],
            ['testioninal_link', '/testimonals'],
            ['testioninal_button', 'See All'],
            ['home_testioninals', ''],

            ['blogs_title', 'Our Blogs'],
            ['blogs_subtitle', '"Study Abroad with Confidence'],
            ['blogs_description', '"Study Abroad with Confidence'],
            ['blogs_link', '/blogs'],
            ['blogs_button', 'See All'],
            ['home_blogs', ''],

        ];

        if (count($items)) {

            foreach ($items as $item) {

                Settings::create([
                    'key' => $item[0],
                    'value' => $item[1],
                ]);
            }
        }
    }
}
