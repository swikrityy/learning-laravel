<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'status',
        'name',
        'position',
        'description',
        'image',
        'facebook',
        'twitter',
        'instagram',
        'whatsapp',
        'email'
    ];
}
