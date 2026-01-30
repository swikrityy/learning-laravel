<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumGallery extends Model
{
    protected $fillable = [
        'title',
        'image',
        'album_id',
    ];
    public function gallery()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
