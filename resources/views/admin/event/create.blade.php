@extends('layouts.admin.master')
@php
    $title = 'Event';
    $name = 'event';
@endphp
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">Create {{ $name }}</h5>
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
        <form action="{{ route($name . '.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center g-4">
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-4 col-md-8">
                                    <label for="name" class="form-label">name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="name" value="{{ old('name') }}" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" name="date"
                                        value="{{ old('date') }}" />
                                    @error('date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="time" class="form-label">Time</label>
                                    <input type="time" class="form-control" id="time" name="time"
                                        value="{{ old('time') }}" />
                                    @error('time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="Event location" value="{{ old('location') }}" />
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label for="slug" class="form-label">slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Slug" value="{{ old('slug') }}" />
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="mb-4 text-2xl">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control dropify" type="file" id="image" name="image"
                                    value="{{ old('image') }}" data-default-file />
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
                                    <option value="1" @if (old('status') == 1) selected @endif>Published
                                    </option>
                                    <option value="0" @if (old('status') == 0) selected @endif>Draft
                                    </option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="order" class="form-label">Order</label>
                                <input type="number" class="form-control" id="order" name="order" placeholder="1"
                                    value="{{ old('order') }}" />
                                @error('order')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4 text-2xl">
                                <label for="banner_image" class="form-label">Featured Image 1</label>
                                <input class="form-control dropify" type="file" id="banner_image"
                                    name="banner_image" value="{{ old('banner_image') }}" data-default-file />
                                @error('banner_image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit text-center"
                                class="btn btn-sm btn-primary mt-4 d-flex align-items-center justify-content-between"><i
                                    class="bx bx-plus"></i>
                                Create
                            </button>
                        </div>
                    </div>
                    @include('admin.global.form.seo.create')
                </div>
            </div>

        </form>
    </div>
@endsection
