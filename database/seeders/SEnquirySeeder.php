<?php

namespace Database\Seeders;

use App\Models\Enquiries;
use App\Models\Social;
use Illuminate\Database\Seeder;

class SEnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $enquiries = [
            [
                // Basic Info
                'full_name' => 'John Doe',
                'branch' => 'Science',
                'note' => 'High priority student',
                'consultant' => 'Jane Smith',
                'priority' => 'High',

                // Academic Qualification
                'qualification' => 'Bachelor’s Degree',
                'see_school_name' => 'High School ABC',
                'see_gpa' => '3.5',
                'see_passed_year' => '2015',
                'plus_two_college_name' => 'College XYZ',
                'plus_two_gpa' => '3.8',
                'plus_two_passed_year' => '2017',
                'bachelor_college_name' => 'University DEF',
                'bachelor_gpa' => '3.9',
                'bachelor_passed_year' => '2021',
                'master_college_name' => 'University GHI',
                'master_gpa' => '4.0',
                'master_passed_year' => '2023',

                // Additional Info
                'marital_status' => 'Single',
                'address' => '123 Main St, Cityville',
                'mobile' => '9876543210',
                'email' => 'johndoe@example.com',
                'phone2' => '0123456789',

                // Guardian Info
                'parents_name' => 'Mr. and Mrs. Doe',
                'g_address' => '456 Another St, Townsville',
                'g_mobile' => '9871234567',
                'g_email' => 'parent@example.com',

                // Other Details
                'preferred_country' => 'Canada',
                'language_test' => 'IELTS',
                'test_type' => 'Academic',
                'test_score' => '7.5',
                'preferred_education' => 'Bachelor’s Degree',
                'preferred_institution_name' => 'University DEF',
                'source' => json_encode(['online', 'referral']), // Example JSON data
                'message' => 'Looking for postgraduate courses in Canada',

                'status' => 'Pending',

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        if (count($enquiries)) {

            foreach ($enquiries as $item) {

                Enquiries::create($item);
            }
        }

        $socials = [
            [
                'order' => '1',
                'status' => '1',
                'title' => 'Facebook',
                'icon' => 'ri-facebook-fill',
                'link' => 'https://www.facebook.com/',
            ],
            ['order' => '1', 'status' => '1', 'title' => 'Instagram', 'icon' => 'ri-instagram-fill', 'link' => 'https://www.instagram.com/'],
            ['order' => '1', 'status' => '1', 'title' => 'Twitter', 'icon' => 'ri-twitter-fill', 'link' => 'https://www.twitter.com/'],
        ];

        if (count($socials)) {
            foreach ($socials as $social) {
                Social::create($social);
            }
        }

    }
}
