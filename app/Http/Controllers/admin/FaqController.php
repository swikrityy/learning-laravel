<?php

namespace App\Http\Controllers\admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $faqs = Faq::paginate(10);

        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        $rules = [
            'question' => 'required|min:3',
        ];

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('faq.create')->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $imageName = fileUpload($request, $image, 'faq');
                $input[$image] = $imageName;
            }
        }

        $faq = Faq::create($input);

        return redirect()->route('faq.index')->with('success', 'Faq added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        //
        $input = $request->all();

        $rules = [
            'question' => 'required|min:3',
        ];

        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($request->$image != '') {
                $rules[$image] = 'image';
            }
        }

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('faq.edit', $faq)->withInput()->withErrors($validator);
        }

        foreach ($imagelist as $image) {
            if ($request->$image != '') {

                if ($faq->$image != '') {
                    $file = $faq->$image;
                    removeFile($file);
                }

                $imageName = fileUpload($request, $image, 'faq');
                $input[$image] = $imageName;
            }

            $deleteimage = 'delete'.$image;
            if (isset($input[$deleteimage]) && $input[$deleteimage] == 'on') {

                if ($faq->$image != '') {
                    $file = $faq->$image;
                    removeFile($file);
                }
                $input[$image] = null;
            }
        }

        $faq->update($input);

        return redirect()->route('faq.index')->with('success', 'Faq Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        //
        $imagelist = ['image'];

        foreach ($imagelist as $image) {
            if ($faq->$image != '') {
                $file = $faq->$image;
                removeFile($file);
            }
        }

        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'Faq Deleted successfully.');
    }
}
