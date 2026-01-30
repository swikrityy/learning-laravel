<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preparation extends Model
{
    protected $fillable = [
        'topic',
        'date',
        'application_id'
    ];
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
