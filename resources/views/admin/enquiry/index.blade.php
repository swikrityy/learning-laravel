@extends('layouts.admin.master')
@php
    $title = 'Enquiries';
    $name = 'enquiry';
@endphp
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">{{ $name }} ({{ ${$name . 's'}->count() }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route($name . '.create') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2"><i
                        class="ri-add-line ri-lg"></i>
                    Create</a>
            </small>
        </div>
    </div>
    <div class="card">
        @if (!${$name . 's'}->isEmpty())
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Language Test</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach (${$name . 's'} as $key => ${$name})
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ ${$name}->full_name }}</td>
                                    <td>{{ ${$name}->mobile }}</td>

                                    <td>{{ ${$name}->email }}</td>


                                    <td class="text-capitalize">{{ ${$name}->preferred_country }}</td>

                                    <td class="text-capitalize">{{ ${$name}->language_test }}</td>

                                    <td class="text-capitalize">{{ ${$name}->priority }}</td>
                                    <td>
                                        @if (${$name}->status)
                                            <span class="badge bg-label-success me-1">Checked</span>
                                        @else
                                            <span class="badge bg-label-danger me-1">Unchecked</span>
                                        @endif
                                    </td>
                                    <td class="">
                                        {{-- <a href="{{ route($name . '.edit', ${$name}->id) }}" type="button"
                                            class="btn btn-sm btn-icon btn-primary">
                                            <i class="tf-icons bx bx-edit text-white"></i>
                                        </a> --}}
                                        <a href="{{ route($name . '.show', ${$name}->id) }}" type="button"
                                            class="btn btn-sm btn-icon btn-info">
                                            <i class="tf-icons bx bx-show-alt text-white"></i>
                                        </a>

                                        <form action="{{ route('application.store') }}" method="post" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="student_id" value="{{ ${$name}->id }}">
                                            <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Forward to Application"
                                                class="btn btn-sm btn-icon btn-danger applicant_{{ $name }}">
                                                <i class="tf-icons bx bx-file text-white"></i>
                                            </button>
                                        </form>

                                        <form action="{{ route($name . '.destroy', ${$name}->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-icon btn-danger delete_{{ $name }}">
                                                <i class="tf-icons bx bx-trash text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ ${$name . 's'}->links() }}
                </div>
            </div>
        @else
            <div class="card-body">
                <h6>No Data Found!</h6>
            </div>
        @endif
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Fancybox.bind("[data-fancybox='images']", {
                // Customize your FancyBox options here
                infinite: true,
                buttons: ["zoom", "slideShow", "fullScreen", "download", "thumbs", "close"],
            });
        });
    </script>
    <script>
        $('.delete_enquiry').click(function(e) {
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
@endpush
