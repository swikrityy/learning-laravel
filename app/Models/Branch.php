<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'order',
        'status',
        'title',
        'short_description',
        'description',

        'email',
        'phone',
        'location',
        'map',

        'seo_title',
        'seo_schema',
        'meta_keywords',
        'meta_description',
    ];
}
