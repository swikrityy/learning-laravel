@extends('layouts.admin.master')
@php
    $title = 'Results';
    $name = 'result';
@endphp
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">{{ $title }} ({{ ${$name}->count() }})</h5>
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
        <div class="card-body">
            <label for="name" class="form-label">Select Status</label>

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
                <div id="remarks-{{ ${$name}->id }}" style="{{ ${$name}->status == 'refused' ? '' : 'display:none;' }}">
                    <input type="text" name="remarks" class="form-control form-control-sm mt-2" placeholder="Enter remarks"
                        value="{{ ${$name}->remarks ?? '' }}">
                </div>
                <button type="submit" class="btn btn-sm btn-primary mt-2">Update</button>
            </form>

        </div>
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