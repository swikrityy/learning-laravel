@extends('layouts.admin.master')
@php
    $title = 'Applications';
    $name = 'application';
    $enquire = 'enquiry';
@endphp
@section('content')
    {{-- {{ dd($countrylocationes) }} --}}

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">Application Edit</h5>
            <small class="text-muted float-end">
                {{-- <a href="{{ route($name . '.create') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2"><i
                        class="ri-add-line ri-lg"></i>
                    Create</a> --}}
                <a href="{{ route($name . '.index') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2">
                    <i class='ri-arrow-left-line ri-lg'></i>
                    Back
                </a>
            </small>
        </div>
    </div>
    <form action="{{ route('application.enquiryupdate', ${$enquire}->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="">
                <div class="card">
                    <h5 class="card-header">General Information</h5>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Information</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">

                                    <!-- Basic Info -->
                                    <tr>
                                        <td>Full Name</td>
                                        <td><input name="full_name" type="text" class="form-control"
                                                value="{{ ${$enquire}->full_name ?? '-' }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Branch</td>
                                        <td><input name="branch" type="text" class="form-control"
                                                value="{{ ${$enquire}->branch ?? '-' }}">
                                        </td>
                                    </tr>

                                    <!-- Additional Info -->
                                    <tr>
                                        <td>Marital Status</td>
                                        <td><input name="marital_status" type="text" class="form-control"
                                                value="{{ ${$enquire}->marital_status ?? '-' }}"></td>
                                    </tr>

                                    <tr>
                                        <td>Address</td>
                                        <td><input name="address" type="text" class="form-control"
                                                value="{{ ${$enquire}->address ?? '-' }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Mobile</td>
                                        <td>
                                            @if (${$enquire}->mobile)
                                                <input name="mobile" type="text" class="form-control"
                                                    value="{{ ${$enquire}->mobile }}">
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            @if (${$enquire}->email)
                                                <input name="email" type="text" class="form-control"
                                                    value="{{ ${$enquire}->email }}">
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Phone 2</td>
                                        <td>
                                            @if (${$enquire}->phone2)
                                                <input name="phone2" type="text" class="form-control"
                                                    value="{{ ${$enquire}->phone2 }}">
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>


                                    {{--
                                    <tr>
                                        <td>Note</td>
                                        <td>{{ ${$enquire}->note ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <td>Consultant</td>
                                        <td>{{ ${$enquire}->consultant ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <td>Priority</td>
                                        <td>{{ ${$enquire}->priority ?? '-' }}</td>
                                    </tr> --}}


                                    <!-- Academic Qualification -->
                                    <tr>
                                        <td>Qualification</td>
                                        <td><input name="qualification" type="text" class="form-control"
                                                value="{{ ${$enquire}->qualification ?? '-' }}"></td>
                                    </tr>



                                    <!-- Other Details -->
                                    <tr>
                                        <td>Preferred Country</td>
                                        <td><input name="preferred_country" type="text" class="form-control"
                                                value="{{ ${$enquire}->preferred_country ?? '-' }}"></td>
                                    </tr>

                                    <tr>
                                        <td>Language Test</td>
                                        <td><input name="language_test" type="text" class="form-control"
                                                value="{{ ${$enquire}->language_test ?? '-' }}"></td>
                                    </tr>

                                    <tr>
                                        <td>Test Type</td>
                                        <td><input name="test_type" type="text" class="form-control"
                                                value="{{ ${$enquire}->test_type ?? '-' }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Test Score</td>
                                        <td><input name="test_score" type="text" class="form-control"
                                                value="{{ ${$enquire}->test_score ?? '-' }}"></td>
                                    </tr>

                                    <tr>
                                        <td>Preferred Education</td>
                                        <td><input name="preferred_education" type="text" class="form-control"
                                                value="{{ ${$enquire}->preferred_education ?? '-' }}"></td>
                                    </tr>

                                    <tr>
                                        <td>Preferred Institution Name</td>
                                        <td><input name="preferred_institution_name" type="text" class="form-control"
                                                value="{{ ${$enquire}->preferred_institution_name ?? '-' }}"></td>
                                    </tr>

                                    {{-- <tr>
                                        <td>Source</td>
                                        <td>
                                            @if (!empty(${$enquire}->source) || ${$enquire}->source == '{}' ||
                                            ${$enquire}->source == '')
                                            <ul>
                                                @foreach (${$enquire}->source as $src)
                                                <li class="text-capitalize">{{ $src }}</li>
                                                @endforeach
                                            </ul>
                                            @else
                                            -
                                            @endif
                                        </td>
                                    </tr> --}}

                                    <tr>
                                        <td>Message</td>
                                        <td><input name="message" type="text" class="form-control"
                                                value="{{ ${$enquire}->message ?? '-' }}">
                                        </td>
                                    </tr>


                                    <!-- Status -->
                                    {{-- <tr>
                                        <td>Status</td>
                                        <td>{{ ${$enquire}->status ?? '-' }}</td>
                                    </tr> --}}


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-4">
                <div class="card">
                    <h5 class="card-header">Guardian Information</h5>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Information</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <!-- Guardian Info -->
                                    <tr>
                                        <td>Name</td>
                                        <td><input name="parents_name" type="text" class="form-control"
                                                value="{{ ${$enquire}->parents_name ?? '-' }}"></td>
                                    </tr>

                                    <tr>
                                        <td>Address</td>
                                        <td><input name="g_address" type="text" class="form-control"
                                                value="{{ ${$enquire}->g_address ?? '-' }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Mobile</td>
                                        <td>
                                            @if (${$enquire}->g_mobile)
                                                <input name="g_mobile" type="text" class="form-control"
                                                    value="{{ ${$enquire}->g_mobile }}">
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            @if (${$enquire}->g_email)
                                                <input name="g_email" type="text" class="form-control"
                                                    value="{{ ${$enquire}->g_email }}">
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-primary mt-2 ml-2 w-50" type="submit">Update</button>
                    </div>
                </div>

            </div>

            <div class="col-md-8 card mt-4">
                <h5 class="card-header">Academic Qualification</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Degree</th>
                                    <th>School / Collage Name</th>
                                    <th>GPA Obtained</th>
                                    <th>Passed Year</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <!-- Academic Qualification -->
                                {{-- <tr>
                                    <td>Qualification</td>
                                    <td>{{ ${$name}->qualification ?? '-' }}</td>
                                </tr> --}}

                                @if (!empty(${$enquire}->see_school_name) || !empty(${$enquire}->see_gpa) || !empty(${$enquire}->see_passed_year))
                                    <tr>
                                        <td>SEE</td>
                                        <td><input name="see_school_name" type="text" class="form-control"
                                                value="{{ ${$enquire}->see_school_name ?? '-' }}"></td>
                                        <td><input name="see_gpa" type="text" class="form-control"
                                                value="{{ ${$enquire}->see_gpa ?? '-' }}">
                                        </td>
                                        <td><input name="see_passed_year" type="text" class="form-control"
                                                value="{{ ${$enquire}->see_passed_year ?? '-' }}"></td>
                                    </tr>
                                @endif

                                @if (!empty(${$enquire}->plus_two_college_name) || !empty(${$enquire}->plus_two_gpa) || !empty(${$enquire}->plus_two_passed_year))
                                    <tr>
                                        <td>+2</td>
                                        <td><input name="plus_two_college_name" type="text" class="form-control"
                                                value="{{ ${$enquire}->plus_two_college_name ?? '-' }}"></td>
                                        <td><input name="plus_two_gpa" type="text" class="form-control"
                                                value="{{ ${$enquire}->plus_two_gpa ?? '-' }}">
                                        </td>
                                        <td><input name="plus_two_passed_year" type="text" class="form-control"
                                                value="{{ ${$enquire}->plus_two_passed_year ?? '-' }}"></td>
                                    </tr>
                                @endif

                                @if (!empty(${$enquire}->bachelor_college_name) || !empty(${$enquire}->bachelor_gpa) || !empty(${$enquire}->bachelor_passed_year))
                                    <tr>
                                        <td>Bachelor's Degree</td>
                                        <td><input name="bachelor_college_name" type="text" class="form-control"
                                                value="{{ ${$enquire}->bachelor_college_name ?? '-' }}"></td>
                                        <td><input name="bachelor_gpa" type="text" class="form-control"
                                                value="{{ ${$enquire}->bachelor_gpa ?? '-' }}">
                                        </td>
                                        <td><input name="bachelor_passed_year" type="text" class="form-control"
                                                value="{{ ${$enquire}->bachelor_passed_year ?? '-' }}"></td>
                                    </tr>
                                @endif

                                @if (!empty(${$enquire}->master_college_name) || !empty(${$enquire}->master_gpa) || !empty(${$enquire}->master_passed_year))
                                    <tr>
                                        <td>Master's Degree</td>
                                        <td><input name="master_college_name" type="text" class="form-control"
                                                value="{{ ${$enquire}->master_college_name ?? '-' }}"></td>
                                        <td><input name="master_gpa" type="text" class="form-control"
                                                value="{{ ${$enquire}->master_gpa ?? '-' }}">
                                        </td>
                                        <td><input name="master_passed_year" type="text" class="form-control"
                                                value="{{ ${$enquire}->master_passed_year ?? '-' }}"></td>
                                    </tr>
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </form>


@endsection