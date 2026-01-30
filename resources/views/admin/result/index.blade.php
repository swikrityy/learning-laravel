@extends('layouts.admin.master')
@php
    $title = 'Results';
    $name = 'result';
@endphp
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">{{ $title }} ({{ ${$name . 's'}->count() }})</h5>
            {{-- Search Form --}}
            <form method="POST" action="{{ route('result.search') }}" class="mb-3 d-flex gap-2">
                @csrf
                <input type="text" name="search" class="form-control" placeholder="Search student name, status...">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            {{-- <small class="text-muted float-end">
                <a href="{{ route($name . '.create') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2"><i
                        class="ri-add-line ri-lg"></i>
                    Create</a>
            </small> --}}
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
                                <th>Remark</th>
                                <th>Status</th>
                                @if (Request::segment(2) == 'result')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach (${$name . 's'} as $key => ${$name})
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ ${$name}->application->student->full_name }}</td>
                                    <td>{{ ${$name}->application->student->phone2 }}</td>
                                    <td>{{ ${$name}->application->student->email }}</td>
                                    <td>{{ ${$name}->remarks ? ${$name}->remarks : 'N/A' }}</td>
                                    {{-- <td> --}}
                                        {{-- <form action="{{ route('dailyvisit.changeStatus', ${$name}->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
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
                                        </form> --}}
                                        {{-- </td> --}}
                                    {{-- <td>
                                        @if (${$name}->status == 'hold')
                                        <span class="badge bg-label-warning me-1">Hold</span>
                                        @endif
                                    </td> --}}
                                    <td>
                                        @if (${$name}->status == 'refused')
                                            <span class="badge bg-label-danger me-1">Refused</span>
                                        @elseif (${$name}->status == 'withdraw')
                                            <span class="badge bg-label-warning me-1">Withdraw</span>
                                        @elseif (${$name}->status == 'grant')
                                            <span class="badge bg-label-success me-1">Visa Grant</span>
                                        @endif
                                    </td>
                                    @if (Request::segment(2) == 'result')
                                        <td>
                                            <a href="{{ route('enquiry.show', ${$name}->application->student->id) }}" type="button"
                                                class="btn btn-sm btn-icon btn-primary">
                                                <i class="tf-icons bx bx-show text-white"></i>
                                            </a>
                                            <a href="{{ route('result.edit', ${$name}->id) }}" class="btn btn-sm btn-icon btn-warning">
                                                <i class="tf-icons bx bx-edit text-white"></i>
                                            </a>
                                        </td>
                                    @endif

                                    {{-- <td class="">
                                        <form action="{{ route('result.update', ${$name}->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select form-select-sm"
                                                onchange="toggleRemarks(this, {{ ${$name}->id }});">
                                                <option value="refused" {{ ${$name}->status == 'refused' ? 'selected' : '' }}>
                                                    Refused
                                                </option>
                                                <option value="withdraw" {{ ${$name}->status == 'withdraw' ? 'selected' : '' }}>
                                                    Withdraw
                                                </option>
                                                <option value="grant" {{ ${$name}->status == 'grant' ? 'selected' : '' }}>
                                                    Visa Granted
                                                </option>
                                            </select>
                                            <div id="remarks-{{ ${$name}->id }}"
                                                style="{{ ${$name}->status == 'refused' ? '' : 'display:none;' }}">
                                                <input type="text" name="remarks" class="form-control form-control-sm mt-2"
                                                    placeholder="Enter remarks" value="{{ ${$name}->remarks ?? '' }}">
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-primary mt-2">Update</button>
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
        function toggleRemarks(select, id) {
            var remarksDiv = document.getElementById('remarks-' + id);
            if (select.value === 'refused') {
                remarksDiv.style.display = '';
            } else {
                remarksDiv.style.display = 'none';
            }
        }
    </script>
@endpush