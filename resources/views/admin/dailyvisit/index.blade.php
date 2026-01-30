@extends('layouts.admin.master')
@php
    $title = 'Daily Visits';
    $name = 'dailyvisit';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">{{ $title }} ({{ ${$name . 's'}->count() }})</h5>
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
                                <th>Visit Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @foreach (${$name . 's'} as $key => ${$name})
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ ${$name}->name }}</td>
                                    <td>{{ ${$name}->phone }}</td>
                                    <td>{{ ${$name}->email }}</td>
                                    <td>{{ ${$name}->visit_date }}</td>
                                    {{-- <td> --}}
                                    {{-- <form action="{{ route('dailyvisit.changeStatus', ${$name}->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select form-select-sm"
                                                onchange="this.form.submit()">
                                                <option value="preparation"
                                                    {{ ${$name}->status == 'preparation' ? 'selected' : '' }}>Preparation
                                                </option>
                                                <option value="documentation"
                                                    {{ ${$name}->status == 'documentation' ? 'selected' : '' }}>
                                                    Documentation
                                                </option>
                                                <option value="apply" {{ ${$name}->status == 'apply' ? 'selected' : '' }}>
                                                    Apply
                                                </option>
                                            </select>
                                        </form> --}}
                                    {{-- </td> --}}
                                    <td>
                                        @if (${$name}->status == 'hold')
                                            <span class="badge bg-label-warning me-1">Hold</span>
                                        @endif
                                    </td>
                                    {{-- <td>
                                        @if (${$name}->status)
                                            <span class="badge bg-label-success me-1">Published</span>
                                        @else
                                            <span class="badge bg-label-danger me-1">Draft</span>
                                        @endif
                                    </td> --}}
                                    <td class="">
                                        <a href="{{ route($name . '.show', ${$name}->id) }}" type="button"
                                            class="btn btn-sm btn-icon btn-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="View Daily Visit">
                                            <i class="tf-icons bx bx-show text-white"></i>
                                        </a>

                                        <form action="{{ route('application.store') }}" method="post" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="daily_visit_id" value="{{ ${$name}->id }}">
                                            <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Forward to Application"
                                                class="btn btn-sm btn-icon btn-danger applicant_{{ $name }}">
                                                <i class="tf-icons bx bx-file text-white"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route($name . '.edit', ${$name}->id) }}" type="button"
                                            class="btn btn-sm btn-icon btn-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Daily Visit">
                                            <i class="tf-icons bx bx-edit text-white"></i>
                                        </a>

                                        <form action="{{ route($name . '.destroy', ${$name}->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-icon btn-danger delete_{{ $name }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Daily Visit">
                                                <i class="tf-icons bx bx-trash text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
        $('.delete_dailyvisit').click(function(e) {
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

        $('.applicant_dailyvisit').click(function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, forward it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest("form").submit();
                }
            });

        });

        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
@endpush
