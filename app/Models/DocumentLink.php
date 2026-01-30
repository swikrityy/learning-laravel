<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentLink extends Model
{
    protected $fillable = [
        'application_id',
        'link'
    ];
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
