<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiries extends Model
{
    use HasFactory;

    protected $fillable = [
        // Basic Info
        'full_name',
        'branch',
        'note',
        'consultant',
        'priority',

        // Academic Qualification
        'qualification',
        'see_school_name',
        'see_gpa',
        'see_passed_year',
        'plus_two_college_name',
        'plus_two_gpa',
        'plus_two_passed_year',
        'bachelor_college_name',
        'bachelor_gpa',
        'bachelor_passed_year',
        'master_college_name',
        'master_gpa',
        'master_passed_year',

        // Additional Info
        'marital_status',
        'address',
        'mobile',
        'email',
        'phone2',

        // Guardian Info
        'parents_name',
        'g_address',
        'g_mobile',
        'g_email',

        // Other Details
        'preferred_country',
        'language_test',
        'test_type',
        'test_score',
        'preferred_education',
        'preferred_institution_name',
        'source',
        'message',
        'purpose_of_visit',

        'status',
    ];
    public function images()
    {
        return $this->hasMany(DocumentImage::class, 'enquiry_id');
    }





}
