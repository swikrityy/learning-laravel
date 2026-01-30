<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'status',
        'title',
        'slug',
        'short_description',
        'description',
        'image',

        'seo_title',
        'seo_schema',
        'meta_keywords',
        'meta_description',
    ];
}
