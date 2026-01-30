<?php

namespace App\Http\Controllers\admin;

use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $socials = Social::paginate(10);

        return view('admin.social.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.social.create');
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

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('social.create')->withInput()->withErrors($validator);
        }

        $social = Social::create($input);

        return redirect()->route('social.index')->with('success', 'Social added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Social $social)
    {
        //
        return view('admin.social.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Social $social)
    {
        //
        $input = $request->all();

        $rules = [

            'title' => 'required|min:3',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('social.edit', $social)->withInput()->withErrors($validator);
        }

        $social->update($input);

        return redirect()->route('social.index')->with('success', 'social added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Social $social)
    {
        //
        $social->delete();

        return redirect()->route('social.index')->with('success', 'Social Delete Successfully');
    }
}
