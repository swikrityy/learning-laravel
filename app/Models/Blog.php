<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'short_description',
        'description',
        'image',
        'featured_image_1',
        'featured_image_2',
        'views',

        'order',
        'status',

        'slug',
        'seo_title',
        'seo_schema',
        'meta_keywords',
        'meta_description',
    ];
}
