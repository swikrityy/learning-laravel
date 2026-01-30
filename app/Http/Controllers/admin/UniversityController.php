<?php

namespace App\Http\Controllers\admin;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($country_id)
    {
        //
        $universitys = University::where('country_id', $country_id)->paginate(10);

        return view('admin.university.index', compact('universitys', 'country_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($country_id)
    {
        //
        return view('admin.university.create', compact('country_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $country_id)
    {
        //
        $input = $request->all();
        $input['country_id'] = $country_id;
        $input['seo_title'] = $request->seo_title ?? $request->title;
        $input['slug'] = $input['slug'] ? make_slug($input['slug']) : make_slug($input['title']);

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
            return redirect()->route('university.create', $country_id)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'university');
                $input[$image] = $imageName;
            }
        }

        $university = University::create($input);

        return redirect()->route('university.index', $country_id)->with('success', 'University added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(University $university, $country_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($country_id, University $university)
    {
        //
        return view('admin.university.edit', compact('university', 'country_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($country_id, Request $request, University $university)
    {
        //
        $input = $request->all();
        $input['country_id'] = $country_id;
        $input['seo_title'] = $request->seo_title ?? $request->title;
        $input['slug'] = $input['slug'] ? make_slug($input['slug']) : make_slug($input['title']);

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
            return redirect()->route('university.edit', [$country_id, $university])->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {

                if ($university->$image != '') {
                    $file = $university->$image;
                    removeFile($file);
                }

                $imageName = fileUpload($request, $image, 'university');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete'.$image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($university->$image != '') {
                    $file = $university->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }

        $university->update($input);

        return redirect()->route('university.index', $country_id)->with('success', 'University Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($country_id, University $university)
    {
        //
        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($university->$image != '') {
                $file = $university->$image;
                removeFile($file);
            }
        }

        $university->delete();

        return redirect()->route('university.index', $country_id)->with('success', 'University Deleted successfully.');
    }
}
