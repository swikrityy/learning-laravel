<?php

namespace App\Http\Controllers\admin;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $branches = Branch::paginate(10);

        return view('admin.branch.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->title;
        // $input['slug'] = $input['slug'] ? make_slug($input['slug']) : make_slug($input['title']);

        $rules = [
            'title' => 'required|min:3',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $branch = Branch::create($input);

        return redirect()->route('branch.index')->with('success', 'Branch added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {

        return view('admin.branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        //
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->title;
        // $input['slug'] = $input['slug'] ? make_slug($input['slug']) : make_slug($input['title']);

        $rules = [
            'title' => 'required|min:3',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->route('branch.edit', $branch)->withInput()->withErrors($validator);
        }

        $branch->update($input);

        return redirect()->route('branch.index')->with('success', 'Branch Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        //
        $branch->delete();

        return redirect()->route('branch.index')->with('success', 'Branch Deleted successfully.');
    }
}
