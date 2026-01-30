<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'order',
        'date',
        'time',
        'location',
        'image',
        'banner_image',
        'description',
        'seo_schema',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'status'
    ];
}
