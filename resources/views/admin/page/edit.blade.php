@extends('layouts.admin.master')

@php
    $title = 'Pages';
    $name = 'page';
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
                                    <label for="title" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="title" value="{{ old('title', ${$name}->title) }}" />
                                    @error('title')
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

                            <div class="mb-4">
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
                            </div>
                        </div>

                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="banner_image" class="form-label">Banner Image</label>
                                <input class="form-control dropify" type="file" id="banner_image" name="banner_image"
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

                            <div class="mb-4">
                                <label for="image_1" class="form-label">Image 1</label>
                                <input class="form-control dropify" type="file" id="image_1" name="image_1"
                                    value="{{ old('image', ${$name}->image_1) }}"
                                    data-default-file="{{ asset(${$name}->image_1) }}" />
                                @error('image_1')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-check form-switch form-switch-danger">
                                    <input class="form-check-input custom-switch-red" type="checkbox" id="delete-image_1"
                                        name="deleteimage_1" />
                                    <label class="form-check-label" for="delete-image_1">Delete</label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="image_2" class="form-label">Image 2</label>
                                <input class="form-control dropify" type="file" id="image_2" name="image_2"
                                    value="{{ old('image_2', ${$name}->image_2) }}"
                                    data-default-file="{{ asset(${$name}->image_2) }}" />
                                @error('image_2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-check form-switch form-switch-danger">
                                    <input class="form-check-input custom-switch-red" type="checkbox" id="delete-image_2"
                                        name="deleteimage_2" />
                                    <label class="form-check-label" for="delete-image_2">Delete</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary mt-4">
                                <i class='bx bx-refresh'></i>
                                Update
                            </button>
                        </div>
                    </div>

                    @include('admin.global.form.seo.edit')

                    {{-- <div class="card mt-4">
                        <div class="card-body">

                            <div class="mb-4">
                                <label for="seo_title" class="form-label">SEO Title</label>
                                <input type="text" class="form-control" id="seo_title" name="seo_title"
                                    placeholder="SEO Title" value="{{ old('seo_title', ${$name}->seo_title) }}" />
                                @error('seo_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                    placeholder="Meta Keywords"
                                    value="{{ old('meta_keywords', ${$name}->meta_keywords) }}" />
                                @error('meta_keywords')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description"
                                    rows="4">{{ old('meta_description', ${$name}->meta_description) }}</textarea>
                                @error('meta_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="seo_schema" class="form-label">SEO Schema</label>
                                <textarea class="form-control" id="seo_schema" name="seo_schema" placeholder="SEO Schema" rows="4">{{ old('seo_schema', ${$name}->seo_schema) }}</textarea>
                                @error('seo_schema')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div> --}}

                </div>
            </div>

        </form>
    </div>
@endsection

@section('js')
    <script></script>
@endsection
