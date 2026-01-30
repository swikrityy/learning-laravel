<?php

namespace App\Http\Controllers\admin;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = Service::paginate(10);

        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.service.create');
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
            return redirect()->route('service.create')->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'service');
                $input[$image] = $imageName;
            }
        }

        $service = Service::create($input);

        return redirect()->route('service.index')->with('success', 'Service added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
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
            return redirect()->route('service.edit', $service)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {

                if ($service->$image != '') {
                    $file = $service->$image;
                    removeFile($file);
                }

                $imageName = fileUpload($request, $image, 'service');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete'.$image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($service->$image != '') {
                    $file = $service->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }

        $service->update($input);

        return redirect()->route('service.index')->with('success', 'Service Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
        $imagelist = ['image', 'image_1'];

        foreach ($imagelist as $image) {
            if ($service->$image != '') {
                $file = $service->$image;
                removeFile($file);
            }
        }

        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service Deleted successfully.');
    }
}
