<?php

namespace App\Http\Controllers\admin;

use App\Models\Success;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $successs = Success::all();

        return view('admin.success.index', compact('successs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.success.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->hasFile('file')) {

            $finalImageName = galleryfileUpload($request, 'file', 'success');

            Success::create([
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
    public function show(Success $success)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Success $success)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Success $success)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Success $success)
    {
        //
        if ($success->image != '') {
            $file = $success->image;
            removeFile($file);
        }

        $success->delete();

        return redirect()->route('success.index')->with('success', 'Image Deleted successfully.');
    }
}
