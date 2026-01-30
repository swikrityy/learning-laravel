<?php

namespace App\Http\Controllers\admin;

use App\Models\DailyVisit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DailyVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dailyvisits = DailyVisit::all();
        return view('admin.dailyvisit.index', compact('dailyvisits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dailyvisit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'heard_about_us' => 'nullable|array',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->route('dailyvisit.create')->withInput()->withErrors($validator);
        }
        if (isset($input['heard_about_us']) && is_array($input['heard_about_us'])) {
            $input['heard_about_us'] = implode(', ', $input['heard_about_us']);
        }

        $dailyvisit = DailyVisit::create($input);
        return redirect()->route('dailyvisit.index')->with('success', 'Daily Visit added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dailyvisit = DailyVisit::findOrFail($id);
        $dailyvisit->heard_about_us = explode(', ', $dailyvisit->heard_about_us);
        return view('admin.dailyvisit.show', compact('dailyvisit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $dailyvisit = DailyVisit::findOrFail($id);
        $dailyvisit->heard_about_us = explode(', ', $dailyvisit->heard_about_us);
        return view('admin.dailyvisit.edit', compact('dailyvisit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $input = $request->all();
        $rules = [];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->route('dailyvisit.edit', $id)->withInput()->withErrors($validator);
        }
        $dailyvisit = DailyVisit::findOrFail($id);
        if (isset($input['heard_about_us']) && is_array($input['heard_about_us'])) {
            $input['heard_about_us'] = implode(', ', $input['heard_about_us']);
        } else {
            $input['heard_about_us'] = '';  // Ensure it's a string if not an array
        }
        $dailyvisit->update($input);
        return redirect()->route('dailyvisit.index')->with('success', 'Daily Visit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyVisit $dailyvisit)
    {
        $dailyvisit->delete();
        return redirect()->route('dailyvisit.index')->with('success', 'Daily Visit deleted successfully.');
    }
    public function changeStatus(Request $request, $id)
    {
        $dailyvisit = DailyVisit::findOrFail($id);
        $dailyvisit->status = $request->input('status');
        $dailyvisit->save();

        return redirect()->route('dailyvisit.index')->with('success', 'Status updated successfully.');
    }
}
