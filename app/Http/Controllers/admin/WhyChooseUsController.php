<?php

namespace App\Http\Controllers\admin;

use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $whychooseuss = WhyChooseUs::paginate(10);

        return view('admin.whychooseus.index', compact('whychooseuss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.whychooseus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        $rules = [
            'title' => 'required|min:3',
        ];

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('whychooseus.create')->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'whychooseus');
                $input[$image] = $imageName;
            }
        }

        $whychooseus = WhyChooseUs::create($input);

        return redirect()->route('whychooseus.index')->with('success', 'Event added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WhyChooseUs $whyChooseUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyChooseUs $whychooseu)
    {
        //
        $whychooseus = $whychooseu;

        return view('admin.whychooseus.edit', compact('whychooseus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhyChooseUs $whychooseu)
    {
        $whychooseus = $whychooseu;

        $input = $request->all();

        $rules = [
            'title' => 'required|min:3',
        ];

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('whychooseus.edit', $whychooseus)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {

                if ($whychooseus->$image != '') {
                    $file = $whychooseus->$image;
                    removeFile($file);
                }

                $imageName = fileUpload($request, $image, 'whychooseus');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete'.$image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($whychooseus->$image != '') {
                    $file = $whychooseus->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }

        $whychooseus->update($input);

        return redirect()->route('whychooseus.index')->with('success', 'Event Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyChooseUs $whychooseu)
    {
        $whychooseus = $whychooseu;

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($whychooseus->$image != '') {
                $file = $whychooseus->$image;
                removeFile($file);
            }
        }

        $whychooseus->delete();
        return redirect()->route('whychooseus.index')->with('success', 'Event  Deleted successfully.');
    }
}
