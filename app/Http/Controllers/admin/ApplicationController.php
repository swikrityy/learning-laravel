<?php

namespace App\Http\Controllers\admin;

use App;
use App\Models\Result;
use App\Models\Enquiries;
use App\Models\DailyVisit;
use App\Models\Application;
use App\Models\ClassEnroll;
use App\Models\Preparation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::with('student', 'result')->get();
        return view('admin.application.index', compact('applications'));
    }

    public function applicationSearch(Request $request)
    {
        $search = $request->search;

        $applications = Application::whereHas('student', function ($query) use ($search) {
            $query->where('full_name', 'like', "%{$search}%")
                ->orWhere('phone2', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
            ->orWhere('status', 'like', "%{$search}%")
            ->with('student', 'result')
            ->latest()
            ->paginate(10);


        return view('admin.application.index', compact('applications'));
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
        $student = Enquiries::findOrFail($request->student_id);
        $application = Application::updateOrCreate([
            'student_id' => $request->student_id,
        ], [
            'status' => 'pending',
        ]);
        $result = Result::where('application_id', $application->id)->first();
        if (!$result) {
            Result::updateOrCreate([
                'application_id' => $application->id,
            ], [
                'status' => 'null',
            ]);
        }

        return redirect()->route('application.index')->with('success', 'Application status updated successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $application = Application::with('student')->findOrFail($id);
        return view('admin.application.show', compact('application'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $application = Application::with('classEnrolls', 'documentLink', 'result')->findOrFail($id);
        $student = $student = $application->student()->with('images')->first();
        $enquiry = Enquiries::with('images')->findOrFail($student->id);
        if ($enquiry['source'] != null || $enquiry['source'] != '{}' || $enquiry['source'] != '') {
            $enquiry['source'] = json_decode($enquiry['source']);
        } else {
            $enquiry['source'] = null;
        }
        // even simpler
        $enquiry['source'] = $enquiry['source'] ?? null;

        return view('admin.application.edit', compact('application', 'student', 'enquiry'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $application = Application::findOrFail($id);
        $enquiry = $application->student;

        // ✅ For other status changes
        if ($application->status !== $request->status) {
            $application->update(['status' => $request->status]);
        }

        return redirect()->route('enquiry.show', $application->id)->with('success', 'Application updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        // delete related records
        $application->result()->delete();
        $application->classEnrolls()->delete();
        $application->preparation()->delete();
        $application->documentLink()->delete();
        $application->student()->delete(); // delete the student as well

        return redirect()->route('application.index')->with('success', 'Application withdrawn successfully.');
    }

    public function classEdit(string $id)
    {
        $application = Application::with('classEnrolls')->findOrFail($id);
        $enroll = $application->classEnrolls->first();
        return view('admin.application.classedit', compact('application', 'enroll'));
    }
    public function classUpdate(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'shift' => 'required|string|max:255', // Ensure shift is required and a string
            'link' => 'nullable|url', // Validate link if provided
        ]);
        $application = Application::findOrFail($id);
        $enquiry = $application->student;

        ClassEnroll::updateOrCreate(
            ['application_id' => $application->id], // search condition
            [
                'name' => $request->name,
                'date' => $request->date,
                'shift' => $request->shift, // Use shift instead of type
                'application_id' => $application->id, // required when creating new
            ]
        );
        if ($request->has('link')) {
            $application->documentLink()->updateOrCreate(
                ['application_id' => $application->id],
                ['link' => $request->link]
            );
        }

        return redirect()->route('enquiry.show', $application->id)->with('success', 'The Application Detail Updated.');
    }
    public function preparationUpdate(Request $request, string $id)
    {
        $request->validate([
            'topic' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $application = Application::findOrFail($id);
        Preparation::updateOrCreate(
            ['application_id' => $application->id], // search condition
            [
                'topic' => $request->topic,
                'date' => $request->date,
                'application_id' => $application->id, // required when creating new
            ]
        );

        return redirect()->route('application.index')->with('success', 'The Preparation Detail Updated.');
    }

    public function filterByResult(Request $request)
    {
        $status = $request->status; // e.g., 'granted', 'withdraw', etc.

        $applications = Application::whereHas('result', function ($query) use ($status) {
            $query->where('status', $status);
        })->get();

        // Return to view or as JSON depending on your use case
        return view('admin.application.index', compact('applications'));
    }

    public function filterByApplication(Request $request)
    {
        $status = $request->status; // e.g., 'onprocessing', 'completed', etc.
        if ($status == 'application') {
            return redirect()->route('application.index');
        }

        $applications = Application::where('status', $status)->get();
        // Return to view or as JSON depending on your use case
        return view('admin.application.index', compact('applications'));
    }

    public function enquiryUpdate(Request $request, string $id)
    {

        $enquiry = Enquiries::findOrFail($id);
        $enquiry->fill($request->except(['source']));
        if ($enquiry->isDirty()) {
            $enquiry->save();
            return redirect()->route('application.index')->with('success', 'Application Details Updated.');
        } else {
            return redirect()->route('application.index')->with('success', 'No Change Detected.');

        }
    }

}
