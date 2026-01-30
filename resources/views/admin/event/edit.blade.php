@extends('layouts.admin.master')
@php
    $title = 'Events';
    $name = 'event';
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
                            <div class="row">
                                <div class="mb-4 col-md-8">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="name" value="{{ old('name', ${$name}->name) }}" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" name="date"
                                        value="{{ old('date', ${$name}->date) }}" />
                                    @error('date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="time" class="form-label">Time</label>
                                    <input type="time" class="form-control" id="time" name="time"
                                        value="{{ old('time', ${$name}->time) }}" />
                                    @error('time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            
                                <div class="mb-4 col-md-4">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="Event location" value="{{ old('location', ${$name}->location) }}" />
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="slug" class="form-label">slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Slug" value="{{ old('slug', ${$name}->slug) }}" />
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control dropify" type="file" id="image" name="image"
                                    value="{{ old('image', ${$name}->image) }}"
                                    data-default-file="{{ asset(${$name}->image) }}" />
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-check form-switch form-switch-danger">
                                    <input class="form-check-input custom-switch-red" type="checkbox" id="delete-image"
                                        name="deleteimage" />
                                    <label class="form-check-label" for="delete-image">Delete</label>
                                </div>
                            </div>
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
                            {{-- <div class="mb-4">
                                <label for="featured_image_1" class="form-label">Featured Image 1</label>
                                <input class="form-control dropify" type="file" id="featured_image_1"
                                    name="featured_image_1" value="{{ old('image', ${$name}->featured_image_1) }}"
                                    data-default-file="{{ asset(${$name}->featured_image_1) }}" />
                                @error('featured_image_1')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-check form-switch form-switch-danger">
                                    <input class="form-check-input custom-switch-red" type="checkbox"
                                        id="delete-featured_image_1" name="deletefeatured_image_1" />
                                    <label class="form-check-label" for="delete-featured_image_1">Delete</label>
                                </div>
                            </div> --}}
                            <div class="mb-4">
                                <label for="banner_image" class="form-label">Featured Image 2</label>
                                <input class="form-control dropify" type="file" id="banner_image"
                                    name="banner_image"
                                    value="{{ old('banner_image', ${$name}->banner_image) }}"
                                    data-default-file="{{ asset(${$name}->banner_image) }}" />
                                @error('banner_image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-check form-switch form-switch-danger">
                                    <input class="form-check-input custom-switch-red" type="checkbox"
                                        id="delete-banner_image" name="deletebanner_image" />
                                    <label class="form-check-label" for="delete-banner_image">Delete</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mt-4">
                                <i class='bx bx-refresh'></i>
                                Update
                            </button>
                        </div>
                    </div>
                    @include('admin.global.form.seo.edit')
                </div>
            </div>
        </form>
    </div>
@endsection
