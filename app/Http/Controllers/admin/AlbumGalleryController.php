<?php

namespace App\Http\Controllers\admin;

use App\Models\Album;
use App\Models\AlbumGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumGalleryController extends Controller
{
    public function index($album_id)
    {
        $album = Album::findOrFail($album_id);
        $galleries = AlbumGallery::where('album_id', $album_id)->latest()->paginate(24);
        return view('admin.albums.gallery.index', compact('album', 'galleries'));
    }

    // Show form to upload images for a specific album
    public function create($album_id)
    {
        $album = Album::findOrFail($album_id);
        return view('admin.albums.gallery.create', compact('album'));
    }

    // Store images for a specific album
    public function store(Request $request, $album_id)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $album = Album::findOrFail($album_id);
        $imagePath = fileUpload($request, 'file', 'gallery');

        AlbumGallery::create([
            'album_id' => $album->id,
            'image' => $imagePath,
        ]);

        return response()->json(['success' => true, 'path' => $imagePath]);
    }

    // Delete gallery image
    public function documentDelete($album_id, $id)
    {
        $gallery = AlbumGallery::where('album_id', $album_id)->findOrFail($id);
        removeFile($gallery->image);
        $gallery->delete();

        return response()->json(['success' => true]);
    }
}
