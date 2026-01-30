<?php

namespace App\Http\Controllers\admin;

use App\Models\Album;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::paginate(10);
        return view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.albums.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'order' => 'required|integer',
            'status' => 'required|boolean',
            'description' => 'required|string|max:1000',
            'name' => 'required|string|max:255',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->route('album.create')->withInput()->withErrors($validator);
        }
        $input['image'] = fileUpload($request, 'image', 'album');
        $input['banner_image'] = fileUpload($request, 'banner_image', 'album/banner');
        // $input['slug'] = Str::slug($request->name);
        Album::create($input);
        return redirect()->route('album.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('admin.albums.edit', compact('album'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $input = $request->all();
        $old_image = $album->image;
        $image = fileUpload($request, 'image', 'Album');
        $banner_image = fileUpload($request, 'banner_image', 'Album/banner');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        if ($banner_image) {
            removeFile($old_image);
            $input['banner_image'] = $banner_image;
        } else {
            unset($input['banner_image']);
        }

        $input['slug'] = Str::slug($request->name);


        $album->update($input);


        return redirect()->route('album.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        foreach ($album->galleries as $gallery) {
            removeFile($gallery->image);
            $gallery->delete();
        }
        removeFile($album->image);
        removeFile($album->banner_image);


        $album->delete();


        return redirect()->route('album.index')->with('message', 'Deleted Successfully');
    }
}
