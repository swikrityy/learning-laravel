@extends('layouts.admin.master')
@php
    $title = 'Contact Inquiry';
    $name = 'contactinquries';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create Contact Inquiry</h5>
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
            <form action="{{ route('contactinquiry.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                        value="{{ old('name') }}" />
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                        value="{{ old('email') }}" />
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="form-label">phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"
                        value="{{ old('phone') }}" />
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="city" class="form-label">city</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City"
                        value="{{ old('city') }}" />
                    @error('city')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="message" class="form-label">message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Message">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary">
                    Create
                </button>
            </form>
        </div>
    </div>
@endsection
