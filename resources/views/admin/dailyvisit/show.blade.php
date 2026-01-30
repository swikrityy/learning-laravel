@extends('layouts.admin.master')
@php
    $title = 'Daily Visits';
    $name = 'dailyvisit';
@endphp
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daily Visit</h5>
            <small class="text-muted float-end">
                <a href="{{ route('dailyvisit.index') }}"
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
                            <td>{{ $dailyvisit->name }}</td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><a href="mailto:{{ $dailyvisit->email }}">{{ $dailyvisit->email }}</a>
                            </td>
                        </tr>

                        <tr>
                            <td>Phone</td>
                            <td><a href="tel:{{ $dailyvisit->phone }}">{{ $dailyvisit->phone }}</a>
                            </td>
                        </tr>

                        <tr>
                            <td>Qualification</td>
                            <td>{{ $dailyvisit->qualification }}</td>
                        </tr>

                        <tr>
                            <td>Country</td>
                            <td>{{ $dailyvisit->country }}</td>
                        </tr>

                        <tr>
                            <td>Course</td>
                            <td>{{ $dailyvisit->course }}</td>
                        </tr>

                        <tr>
                            <td>Visit Date</td>
                            <td>{{ $dailyvisit->visit_date }}</td>
                        </tr>

                        <tr>
                            <td>Visit Time</td>
                            <td>{{ $dailyvisit->visit_time }}</td>
                        </tr>

                        <tr>
                            <td>Purpose</td>
                            @if ($dailyvisit->purpose == 'Other')
                                <td>{{ $dailyvisit->other_purpose }}</td>
                            @else
                                <td>{{ $dailyvisit->purpose }}</td>
                            @endif
                        </tr>

                        <tr>
                            <td>Heard About Us</td>
                            <td>{{ is_array($dailyvisit->heard_about_us) ? implode(', ', $dailyvisit->heard_about_us) : $dailyvisit->heard_about_us }}
                            </td>


                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
