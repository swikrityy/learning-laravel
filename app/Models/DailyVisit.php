<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyVisit extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'qualification',
        'country',
        'course',
        'visit_date',
        'visit_time',
        'purpose',
        'purpose_other',
        'heard_about_us',
        'status',
    ];

    public function application()
    {
        return $this->hasOne(Application::class);
    }

}
