<?php

namespace App\Http\Controllers\admin;

use App\Models\ContactInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactInquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contactinquiries = ContactInquiry::paginate(10);

        return view('admin.inquiry.contact.index', compact('contactinquiries'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.inquiry.contact.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        $rules = [
            'name' => 'required|min:3',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Create a new Inquiry instance with the validated data
        ContactInquiry::create($input);

        return redirect()->back()->with('success', 'Your message has been submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactInquiry $contactinquiry)
    {
        //
        return view('admin.inquiry.contact.show', compact('contactinquiry'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactInquiry $contactinquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactInquiry $contactinquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactInquiry $contactinquiry)
    {
        //
        $contactinquiry->delete();

        return redirect()->route('contactinquiry.index')->with('success', 'Contact Inquiry Delete Successfully');
    }
}
