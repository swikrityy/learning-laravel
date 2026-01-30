<?php

namespace App\Http\Controllers\admin;

use App\Models\Country;
use App\Models\CountryLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CountryLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countrylocationes = CountryLocation::all();
        return view('admin.countrylocation.index', compact('countrylocationes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.countrylocation.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->title;
        $input['slug'] = $input['slug'] ? make_slug($input['slug']) : make_slug($input['name']);

        $rules = [
            'name' => 'required|min:3',
            'countryname' => 'required|min:3',
            'location' => 'required|min:3',
        ];

        $imagelist = ['image1', 'image2'];
        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->route('countrylocation.create')->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'countrylocation');
                $input[$image] = $imageName;
            }
        }

        $countrylocation = CountryLocation::create($input);
        return redirect()->route('countrylocation.index')->with('success', 'Country Location created successfully.');

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
    public function edit(string $id)
    {
        $countrylocation = CountryLocation::findOrFail($id);
        return view('admin.countrylocation.edit', compact('countrylocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $countrylocation = CountryLocation::findOrFail($id);
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->title;
        $input['slug'] = $input['slug'] ? make_slug($input['slug']) : make_slug($input['name']);

        $rules = [];

        $imagelist = ['image1', 'image2'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('countrylocation.edit', $countrylocation)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {

                if ($countrylocation->$image != '') {
                    $file = $countrylocation->$image;
                    removeFile($file);
                }

                $imageName = fileUpload($request, $image, 'countrylocation');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete' . $image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($countrylocation->$image != '') {
                    $file = $countrylocation->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }

        $countrylocation->update($input);
        return redirect()->route('countrylocation.index')->with('success', 'Country Location Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CountryLocation $countrylocation)
    {
        $imagelist = ['image', 'image_1', 'career_image', 'university_image', 'visa_image', 'documentation_image', 'financial_image', 'departure_image'];
        foreach ($imagelist as $image) {
            if ($countrylocation->$image != '') {
                $file = $countrylocation->$image;
                removeFile($file);
            }
        }
        $countrylocation->delete();
        return redirect()->route('countrylocation.index')->with('success', 'Country Location Deleted successfully.');


    }
}
