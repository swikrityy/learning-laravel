<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'application_id',
        'status',
        'remarks',
    ];
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
