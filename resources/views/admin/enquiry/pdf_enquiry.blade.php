@extends('layouts.print.enquiry')

@php
    $title = 'Enquiries';
    $name = 'enquiry';
@endphp

@section('content')
    <div class="p-8">
        <div class="mb-5">
            <h4 class="text-2xl font-bold text-center">{{ $settings['site_title_full'] }}</h4>
            <h6 class="text-lg font-semibold  underline text-center">Student Enquiry Details</h6>
        </div>

        <!-- General Information Section -->
        <div class="mb-8">
            <div class="space-y-2 border p-4 rounded-lg">
                <h5 class="text-lg font-semibold mb-4 underline">General Information</h5>
                <div><strong>Full Name: </strong>{{ $enquiry->full_name ?? '-' }}</div>
                <div><strong>Branch: </strong>{{ $enquiry->branch ?? '-' }}</div>
                <div><strong>Marital Status: </strong>{{ $enquiry->marital_status ?? '-' }}</div>
                <div><strong>Address: </strong>{{ $enquiry->address ?? '-' }}</div>
                <div><strong>Mobile: </strong>{{ $enquiry->mobile ?? '-' }}</div>
                <div><strong>Email: </strong>{{ $enquiry->email ?? '-' }}</div>
                @if ($enquiry->phone2)
                    <div><strong>Phone 2: </strong>{{ $enquiry->phone2 }}</div>
                @endif
                <div><strong>Qualification: </strong>{{ $enquiry->qualification ?? '-' }}</div>
                <div><strong>Preferred Country: </strong>{{ $enquiry->preferred_country ?? '-' }}</div>
                @if ($enquiry->language_test)
                    <div><strong>Language Test: </strong>{{ $enquiry->language_test }}</div>
                    <div><strong>Test Type: </strong>{{ $enquiry->test_type ?? '-' }}</div>
                    <div><strong>Test Score: </strong>{{ $enquiry->test_score ?? '-' }}</div>
                @endif
                <div><strong>Preferred Education: </strong>{{ $enquiry->preferred_education ?? '-' }}</div>
                <div><strong>Preferred Institution Name: </strong>{{ $enquiry->preferred_institution_name ?? '-' }}</div>
                <div class="flex"><strong class="mr-2">Source: </strong>
                    <ul class="list-disc pl-5">
                        @forelse ($enquiry->source as $src)
                            <li class="capitalize">{{ $src }}</li>
                        @empty
                            <li>-</li>
                        @endforelse
                    </ul>
                </div>
                <div><strong>Message: </strong>{{ $enquiry->message ?? '-' }}</div>
            </div>
        </div>

        <!-- Guardian Information Section -->
        <div class="mb-8">
            <div class="space-y-2 border p-4 rounded-lg">
                <h5 class="text-lg font-semibold mb-4 underline">Guardian Information</h5>
                <div><strong>Name: </strong>{{ $enquiry->parents_name ?? '-' }}</div>
                <div><strong>Address: </strong>{{ $enquiry->g_address ?? '-' }}</div>
                <div><strong>Mobile: </strong>{{ $enquiry->g_mobile ?? '-' }}</div>
                <div><strong>Email: </strong>{{ $enquiry->g_email ?? '-' }}</div>
            </div>
        </div>


        <!-- Academic Qualification Section (Table) -->
        <div class="mb-8">
            <div class="space-y-2 border p-4 rounded-lg">

                <div class="overflow-x-auto">
                    <h5 class="text-lg font-semibold mb-4 underline">Academic Qualification</h5>
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2" scope="col">Degree</th>
                                <th class="border px-4 py-2" scope="col">School / College Name</th>
                                <th class="border px-4 py-2" scope="col">GPA Obtained</th>
                                <th class="border px-4 py-2" scope="col">Passed Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">SEE</td>
                                <td class="border px-4 py-2">{{ $enquiry->see_school_name ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $enquiry->see_gpa ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $enquiry->see_passed_year ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">+2</td>
                                <td class="border px-4 py-2">{{ $enquiry->plus_two_college_name ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $enquiry->plus_two_gpa ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $enquiry->plus_two_passed_year ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">Bachelor's Degree</td>
                                <td class="border px-4 py-2">{{ $enquiry->bachelor_college_name ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $enquiry->bachelor_gpa ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $enquiry->bachelor_passed_year ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">Master's Degree</td>
                                <td class="border px-4 py-2">{{ $enquiry->master_college_name ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $enquiry->master_gpa ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $enquiry->master_passed_year ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Official Use Only Section -->
        <div class="mb-8">
            <div class="space-y-2 border p-4 rounded-lg">
                <h5 class="text-lg font-semibold mb-4 underline">Official Use Only</h5>
                <div><strong>Status: </strong> {{ ${$name}->status ? 'Checked' : 'Unchecked' }}</div>
                <div class="capitalize"><strong>Priority: </strong>{{ $enquiry->priority ?? '-' }}</div>
                <div><strong>Note: </strong>{{ $enquiry->note ?? '-' }}</div>
            </div>
        </div>

        <!--  Document Image -->
        <div class="mb-8">
            <div class="space-y-2 border p-4 rounded-lg">
                <h5 class="text-lg font-semibold mb-4 underline">Document Image</h5>
                @if ($enquiry->images)
                    @foreach ($enquiry->images as $image)
                        <img src="{{ public_path('storage/' . $image->image) }}" alt="Document Image"
                            class="w-full h-auto rounded-lg">
                    @endforeach
                @else
                    <p>No document image available.</p>
                @endif
            </div>
        </div>

    </div>
@endsection
