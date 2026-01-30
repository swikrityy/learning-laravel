<?php

namespace App\Http\Controllers\admin;

use App;
use App\Models\Result;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Result::with('application.student')->get();
        return view('admin.result.index', compact('results'));
    }

    public function visaGrant()
    {
        $results = Result::where('status', 'grant')
            ->with('application.student')
            ->get();

        return view('admin.result.index', compact('results'));
    }

    public function visaRefused()
    {
        $results = Result::where('status', 'refused')
            ->with('application.student')
            ->get();

        return view('admin.result.index', compact('results'));
    }

    public function visaWithdraw()
    {
        $results = Result::where('status', 'withdraw')
            ->with('application.student')
            ->get();

        return view('admin.result.index', compact('results'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $results = Result::whereHas('application.student', function ($query) use ($search) {
            $query->where('full_name', 'like', "%{$search}%")
                ->orWhere('phone2', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
            ->orWhere('status', 'like', "%{$search}%")
            ->with('application.student')
            ->latest()
            ->paginate(10);

        return view('admin.result.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $application = Application::findOrFail($id);
        $result = Result::findOrFail($application->id);
        return view('admin.result.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = Result::findOrFail($id);
        $app = $result->application;
        $result->status = $request->input('status');
        $result->remarks = $request->input('remarks');
        $result->update();

        // Redirect to the application index with a success message
        return redirect()->route('enquiry.show', $app->id)->with('success', 'Result updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
