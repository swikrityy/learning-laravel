<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
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
        'country_id',

        'seo_title',
        'seo_schema',
        'meta_keywords',
        'meta_description',
    ];
}
