<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentImage extends Model
{
    protected $fillable = [
        'enquiry_id',
        'image',
    ];

    public function enquiry()
    {
        return $this->belongsTo(Enquiries::class, 'enquiry_id');
    }
}
