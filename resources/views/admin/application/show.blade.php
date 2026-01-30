@extends('layouts.admin.master')
@php
    $title = 'Applications';
    $name = 'application';
@endphp
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Application</h5>
            <small class="text-muted float-end">
                <a href="{{ route('application.index') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2">
                    <i class='ri-arrow-left-line ri-lg'></i>
                    Back
                </a>
            </small>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Field</th>
                            <th>Answer</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        <tr>
                            <td>Name</td>
                            <td>{{ $application->student->full_name }}</td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><a href="mailto:{{ $application->student->email }}">{{ $application->student->email }}</a>
                            </td>
                        </tr>

                        <tr>
                            <td>Phone</td>
                            <td><a href="tel:{{ $application->student->mobile }}">{{ $application->student->mobile }}</a>
                            </td>
                        </tr>

                        <tr>
                            <td>Qualification</td>
                            <td>{{ $application->student->qualification }}</td>
                        </tr>

                        <tr>
                            <td>Course</td>
                            <td>{{ $application->student->course }}</td>
                        </tr>
                        <tr>
                            <td>Branch</td>
                            <td>{{ $application->student->branch }}</td>
                        </tr>
                        <tr>
                            <td>SEE GPA</td>
                            <td>{{ $application->student->see_gpa }}</td>
                        </tr>
                        <tr>
                            <td>Preferred Country</td>
                            <td>{{ $application->student->preferred_country }}</td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td>{{ $application->student->message }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
