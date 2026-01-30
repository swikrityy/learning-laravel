@extends('layouts.admin.master')
@php
    $title = 'Contact Inquiry';
    $name = 'contactinquries';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show Contact Inquiry</h5>
            <small class="text-muted float-end">
                <a href="{{ route('contactinquiry.index') }}"
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
                            <td>{{ $contactinquiry->name }}</td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><a href="mailto:{{ $contactinquiry->email }}">{{ $contactinquiry->email }}</a></td>
                        </tr>

                        <tr>
                            <td>Phone</td>
                            <td><a href="tel:{{ $contactinquiry->phone }}">{{ $contactinquiry->phone }}</a></td>
                        </tr>


                        <tr>
                            <td>Current City</td>
                            <td>{{ $contactinquiry->city }}</td>
                        </tr>

                        @if ($contactinquiry->course)
                            <tr>
                                <td>Course</td>
                                <td>{{ $contactinquiry->course }}</td>
                            </tr>
                        @endif

                        @if ($contactinquiry->message)
                            <tr>
                                <td>Message</td>
                                <td>{{ $contactinquiry->message }}</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.delete_contactinquiry').click(function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest("form").submit();
                }
            });

        });
    </script>
@endsection
