<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryFaq extends Model
{
    protected $fillable = [
        'order',
        'status',
        'question',
        'answer',
        'image',
        'country_id'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}
