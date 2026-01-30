<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassEnroll extends Model
{
    protected $fillable = [
        'name',
        'date',
        'shift',
        'application_id'
    ];
    public function application()
    {
        return $this->belongsTo(Application::class);
    }

}
