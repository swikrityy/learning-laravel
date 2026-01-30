@extends('layouts.admin.master')
@php
    $title = 'Applications';
    $name = 'application';
@endphp
@section('content')
    {{-- {{ dd($countrylocationes) }} --}}

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">Class Edit</h5>
            <small class="text-muted float-end">
                {{-- <a href="{{ route($name . '.create') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2"><i
                        class="ri-add-line ri-lg"></i>
                    Create</a> --}}
            </small>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('application.classupdate', ${$name}->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Required for PUT request --}}


                <div class="mb-3">
                    <label for="name" class="form-label">Class Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $enroll->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Class Date</label>
                    <input type="date" class="form-control" id="date" name="date"
                        value="{{ old('date', $enroll->date) }}">
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="ri-check-line"></i> Update Class
                </button>
            </form>
        </div>
    </div>
@endsection
