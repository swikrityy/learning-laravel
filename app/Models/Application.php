<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'student_id',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(Enquiries::class, 'student_id');
    }
    public function result()
    {
        return $this->hasOne(Result::class);
    }
    public function classEnrolls()
    {
        return $this->hasOne(ClassEnroll::class);
    }
    public function preparation()
    {
        return $this->hasOne(Preparation::class);
    }
    public function documentLink()
    {
        return $this->hasOne(DocumentLink::class);
    }

}
