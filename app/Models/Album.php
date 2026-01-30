<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'image',
        'order',
        'slug'
    ];
    public function galleries()
    {
        return $this->hasMany(AlbumGallery::class, 'album_id');
    }
    protected static function booted()
    {
        static::creating(function ($album) {
            $album->slug = Str::slug($album->name);
        });

        static::updating(function ($album) {
            $album->slug = Str::slug($album->name);
        });
    }
}
