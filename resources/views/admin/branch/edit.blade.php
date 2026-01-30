@extends('layouts.admin.master')

@php
    $title = 'Branches';
    $name = 'branch';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">Edit {{ $name }}</h5>
            <small class="text-muted float-end">
                <a href="{{ route($name . '.index') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2">
                    <i class='ri-arrow-left-line ri-lg'></i>
                    Back
                </a>
            </small>
        </div>
    </div>

    <div>
        <form action="{{ route($name . '.update', ${$name}->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row justify-content-center g-4">

                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-body">

                            <div class="mb-4">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                    value="{{ old('title', ${$name}->title) }}" />
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Email" value="{{ old('email', ${$name}->email) }}" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Phone" value="{{ old('phone', ${$name}->phone) }}" />
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="Location" value="{{ old('location', ${$name}->location) }}" />
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="mb-4">
                                <label for="map" class="form-label">Map</label>
                                <textarea class="form-control" id="map" name="map" placeholder="Map" rows="4">{{ old('map', ${$name}->map) }}</textarea>
                                @error('map')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- <div class="mb-4">
                                <label for="short_description" class="form-label">Short Description</label>
                                <textarea class="form-control" id="short_description" name="short_description" placeholder="Short Description"
                                    rows="4">{{ old('short_description', ${$name}->short_description) }}</textarea>
                                @error('short_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control ckeditor" id="description" name="description" placeholder="Description" rows="4">{{ old('description', ${$name}->description) }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}

                        </div>
                    </div>


                </div>

                <div class="col-md-4">

                    <div class="card">
                        <div class="card-body">

                            <div class="mb-4">
                                <label for="status" class="form-label">status</label>
                                <select id="status" name="status" class="form-select">
                                    <option value="1" @if (old('status', ${$name}->status) == 1) selected @endif>Published
                                    </option>
                                    <option value="0" @if (old('status', ${$name}->status) == 0) selected @endif>Draft
                                    </option>
                                </select>

                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4 ">
                                <label for="order" class="form-label">Order</label>
                                <input type="number" class="form-control" id="order" name="order" placeholder="1"
                                    value="{{ old('order', ${$name}->order) }}" />
                                @error('order')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary mt-4">
                                <i class='bx bx-refresh'></i>
                                Update
                            </button>
                        </div>
                    </div>

                    {{-- @include('admin.global.form.seo.edit') --}}

                </div>
            </div>

        </form>
    </div>
@endsection
