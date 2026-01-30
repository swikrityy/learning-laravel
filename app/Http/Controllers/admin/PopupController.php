<?php

namespace App\Http\Controllers\admin;

use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $popups = Popup::paginate(10);

        return view('admin.popup.index', compact('popups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.popup.create');
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
            return redirect()->route('popup.create')->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'popup');
                $input[$image] = $imageName;
            }
        }

        $popup = Popup::create($input);

        return redirect()->route('popup.index')->with('success', 'Popup added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Popup $popup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Popup $popup)
    {
        //
        return view('admin.popup.edit', compact('popup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Popup $popup)
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
            return redirect()->route('popup.edit', $popup)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {

                if ($popup->$image != '') {
                    $file = $popup->$image;
                    removeFile($file);
                }

                $imageName = fileUpload($request, $image, 'popup');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete'.$image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($popup->$image != '') {
                    $file = $popup->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }

        $popup->update($input);

        return redirect()->route('popup.index')->with('success', 'Popup Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Popup $popup)
    {
        //
        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($popup->$image != '') {
                $file = $popup->$image;
                removeFile($file);
            }
        }

        $popup->delete();

        return redirect()->route('popup.index')->with('success', 'Popup Deleted successfully.');
    }
}
