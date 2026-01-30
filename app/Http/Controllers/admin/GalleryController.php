<?php

namespace App\Http\Controllers\admin;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $galleries = Gallery::all();

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->hasFile('file')) {

            $finalImageName = galleryfileUpload($request, 'file', 'gallery');

            Gallery::create([
                'image' => $finalImageName,
            ]);

            return response()->json(['success' => 'Image Uploaded Successfully']);
        } else {
            return response()->json(['error' => 'File upload failed.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //

        if ($gallery->image != '') {
            $file = $gallery->image;
            removeFile($file);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Image Deleted successfully.');
    }
}
