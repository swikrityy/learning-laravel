<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
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
        'image_1',

        'seo_title',
        'seo_schema',
        'meta_keywords',
        'meta_description',
    ];
    public function countryFaqs()
    {
        return $this->hasMany(CountryFaq::class);
    }
}
