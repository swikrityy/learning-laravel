@extends('layouts.admin.master')
@php
    $title = 'Pages';
    $name = 'page';
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
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Title" value="{{ old('title') }}" />
                                    @error('title')
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

                            <div class="mb-4">
                                <label for="short_description" class="form-label">Short Description</label>
                                <textarea class="form-control" id="short_description" name="short_description" placeholder="Short Description"
                                    rows="4">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control ckeditor" id="description" name="description" placeholder="Description" rows="10">{{ old('description') }}</textarea>

                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>




                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="mb-4 text-2xl">
                                <label for="banner_image" class="form-label">Banner Image</label>
                                <input class="form-control dropify" type="file" id="banner_image" name="banner_image"
                                    value="{{ old('banner_image') }}" data-default-file />

                                @error('banner_image')
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
                                <label for="image_1" class="form-label">Image 1</label>
                                <input class="form-control dropify" type="file" id="image_1" name="image_1"
                                    value="{{ old('image_1') }}" data-default-file />

                                @error('image_1')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4 text-2xl">
                                <label for="image_2" class="form-label">Image 2</label>
                                <input class="form-control dropify" type="file" id="image_2" name="image_2"
                                    value="{{ old('image_2') }}" data-default-file />

                                @error('image_2')
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

@push('css')
@endpush

@section('js')
@endsection
