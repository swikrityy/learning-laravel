<?php

namespace App\Http\Controllers\admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sliders = Slider::paginate(10);

        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->title;
        $input['slug'] = $input['slug'] ? make_slug($input['slug']) : make_slug($input['title']);

        $rules = [
            'title' => 'required|min:3',
        ];

        $imagelist = ['image', 'image_1'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('slider.create')->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'slider');
                $input[$image] = $imageName;
            }
        }

        $slider = Slider::create($input);

        return redirect()->route('slider.index')->with('success', 'Slider added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        //
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->title;
        $input['slug'] = $input['slug'] ? make_slug($input['slug']) : make_slug($input['title']);

        $rules = [

            'title' => 'required|min:3',

        ];

        $imagelist = ['image', 'image_1'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('slider.edit', $slider)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {

                if ($slider->$image != '') {
                    $file = $slider->$image;
                    removeFile($file);
                }

                $imageName = fileUpload($request, $image, 'slider');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete'.$image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($slider->$image != '') {
                    $file = $slider->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }

        $slider->update($input);

        return redirect()->route('slider.index')->with('success', 'Slider Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
        $imagelist = ['image', 'image_1'];

        foreach ($imagelist as $image) {
            if ($slider->$image != '') {
                $file = $slider->$image;
                removeFile($file);
            }
        }

        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'Slider Deleted successfully.');
    }
}
