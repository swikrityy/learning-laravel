<?php

namespace App\Http\Controllers\admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $testimonials = Testimonial::paginate(10);

        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $input = $request->all();

        $rules = [
            'name' => 'required|min:3',
        ];

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('testimonial.create')->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'testimonial');
                $input[$image] = $imageName;
            }
        }

        $testimonial = Testimonial::create($input);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
        $input = $request->all();

        $rules = [
            'name' => 'required|min:3',
        ];

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('testimonial.edit', $testimonial)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {

                if ($testimonial->$image != '') {
                    $file = $testimonial->$image;
                    removeFile($file);
                }

                $imageName = fileUpload($request, $image, 'testimonial');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete'.$image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($testimonial->$image != '') {
                    $file = $testimonial->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }

        $testimonial->update($input);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //
        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($testimonial->$image != '') {
                $file = $testimonial->$image;
                removeFile($file);
            }
        }

        $testimonial->delete();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial Deleted successfully.');
    }
}
