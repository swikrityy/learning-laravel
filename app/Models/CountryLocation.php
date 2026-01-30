<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryLocation extends Model
{
    protected $fillable = [
        'slug',
        'status',
        'order',
        'name',
        'countryname',
        'location',
        'shortdescription',
        'description',
        'image1',
        'image2',
        'link',
        'seo_title',
        'seo_schema',
        'meta_keywords',
        'meta_description'
    ];
}
