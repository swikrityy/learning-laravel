<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'status',
        'title',
        'short_description',
        'description',
        'image_1',
        'image_2',
        'banner_image',

        'slug',
        'seo_title',
        'seo_schema',
        'meta_keywords',
        'meta_description',
    ];
}
