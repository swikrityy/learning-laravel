@extends('layouts.admin.master')
@php
    $title = 'Applications';
    $name = 'application';
@endphp
@section('content')
    {{-- {{ dd($countrylocationes) }} --}}

    <div class="card mb-4">
        <div class="card-header d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">{{ $name }}</h5>
            <div class="d-flex flex-wrap gap-2 align-items-center ms-auto">
                {{-- Application Status Filter --}}
                <form method="POST" action="{{ route('application.filterByApplication') }}"
                    class="d-flex align-items-center">
                    @csrf
                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">Application Status</option>
                        <option value="application" {{ request('status') == 'application' ? 'selected' : '' }}>All Application
                        </option>
                        <option value="forward" {{ request('status') == 'forward' ? 'selected' : '' }}>Forward
                        </option>
                        <option value="wait" {{ request('status') == 'wait' ? 'selected' : '' }}>Wait</option>
                        <option value="cancel" {{ request('status') == 'cancel' ? 'selected' : '' }}>Cancel</option>

                    </select>
                </form>
                {{-- Visa Status Filter --}}
                <form method="POST" action="{{ route('application.filterByResult') }}" class="d-flex align-items-center">
                    @csrf
                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">Visa Status</option>
                        <option value="grant" {{ request('status') == 'grant' ? 'selected' : '' }}>Granted</option>
                        <option value="refused" {{ request('status') == 'refused' ? 'selected' : '' }}>Refused</option>
                        <option value="withdraw" {{ request('status') == 'withdraw' ? 'selected' : '' }}>Withdraw</option>
                    </select>
                </form>
                {{-- Search --}}
                <form method="POST" action="{{ route('application.search') }}" class="d-flex align-items-center">
                    @csrf
                    <input type="text" name="search" class="form-control form-control-sm"
                        placeholder="Search by name, contact, email..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-sm btn-primary ms-2">Search</button>
                </form>
            </div>
        </div>




    </div>

    <div class="card">
        {{-- {{ dd($applications) }} --}}

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
                                <th>Status</th>
                                <th>Visa Status</th>
                                <th>Action</th>
                                {{-- <th>Select Status</th> --}}
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @foreach (${$name . 's'} as $key => ${$name})
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ ${$name}->student->full_name }}</td>

                                    <td>{{ ${$name}->student->phone2 }}</td>

                                    <td>{{ ${$name}->student->email }}</td>

                                    <td>
                                        @if (${$name}->status == 'forward')
                                            <span class="badge bg-label-success me-1">Forward</span>
                                        @elseif (${$name}->status == 'wait')
                                            <span class="badge bg-label-warning me-1">Wait</span>
                                        @elseif (${$name}->status == 'cancel')
                                            <span class="badge bg-label-danger me-1">Cancel</span>
                                            {{-- <a href="{{ route('application.classedit', ${$name}->id) }}" class="d-inline">
                                                <button type="submit" class="btn btn-sm btn-icon btn-success delete_{{ $name }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Class Details">
                                                    <i class="tf-icons bx bx-edit text-white"></i>
                                                </button>
                                            </a> --}}
                                        @endif
                                    </td>
                                    <td>
                                        @if (optional(optional(${$name})->result)->status == 'grant')
                                            <span class="badge bg-label-success me-1">Granted</span>
                                        @elseif (optional(optional(${$name})->result)->status == 'refused')
                                            <span class="badge bg-label-warning me-1">Refused</span>
                                        @elseif (optional(optional(${$name})->result)->status == 'withdraw')
                                            <span class="badge bg-label-danger me-1">Withdraw</span>
                                        @else
                                            <span class="badge bg-label-secondary me-1">N/A</span>
                                        @endif
                                    </td>
                                    <td class="">
                                        <a href="{{ route('enquiry.show', ${$name}->id) }}" type="button"
                                            class="btn btn-sm btn-icon btn-primary">
                                            <i class="tf-icons bx bx-show text-white"></i>
                                        </a>


                                        <a href="{{ route($name . '.edit', ${$name}->id) }}" class="d-inline">
                                            <button type="button" class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit Application Details">
                                                <i class="tf-icons bx bx-edit text-white"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route($name . '.destroy', ${$name}->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-icon btn-danger delete_{{ $name }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete application">
                                                <i class="tf-icons bx bx-trash text-white"></i>
                                            </button>
                                        </form>
                                        {{-- <a href="{{ route($name . '.visadetail', ${$name}->id) }}" class="d-inline">
                                            <button type="button" class="btn btn-sm btn-icon btn-warning delete_{{ $name }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Visa Details">
                                                <i class="tf-icons bx bx-edit text-white"></i>
                                            </button>
                                        </a> --}}


                                    </td>
                                    {{-- <td>
                                        <form action="{{ route('application.update', ${$name}->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                <option value="" disabled>
                                                    Choose Status
                                                </option>
                                                <option value="processing" {{ ${$name}->status == 'processing' ? 'selected' : '' }}>
                                                    Processing
                                                </option>
                                                <option value="withdraw" {{ ${$name}->status == 'withdraw' ? 'selected' : '' }}>
                                                    Withdraw
                                                </option>
                                                <option value="classenroll" {{ ${$name}->status == 'classenroll' ? 'selected' : ''
                                                    }}>
                                                    Class Enrollment
                                                </option>
                                                <option value="preparation" {{ ${$name}->status == 'preparation' ? 'selected' : ''
                                                    }}>Preparation
                                                </option>
                                                <option value="documentation" {{ ${$name}->status == 'documentation' ? 'selected' :
                                                    '' }}>
                                                    Documentation
                                                </option>
                                                <option value="apply" {{ ${$name}->status == 'apply' ? 'selected' : '' }}>
                                                    Apply
                                                </option>
                                            </select>
                                        </form>


                                    </td> --}}
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
        $('.delete_application').click(function (e) {
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