@extends('layouts.admin.master')
@php
    $title = 'Student Essentials';
    $name = 'countrylocation';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">Create {{ $title }}</h5>
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route($name . '.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row justify-content-center g-4">

                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-body">

                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                    value="{{ old('name') }}" />
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="name" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="name" name="slug" placeholder="name"
                                    value="{{ old('slug') }}" />
                                @error('slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="countryname" class="form-label">Country Name</label>
                                    <input type="text" class="form-control" id="countryname" name="countryname"
                                        placeholder="Country Name" value="{{ old('countryname') }}" />
                                    @error('countryname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="Location" value="{{ old('location') }}" />
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                            </div>

                            <div class="mb-4">
                                <label for="short_description" class="form-label">Short Description</label>
                                <textarea class="form-control" id="short_description" name="shortdescription"
                                    placeholder="Short Description" rows="4">{{ old('shortdescription') }}</textarea>
                                @error('shortdescription')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control ckeditor" id="description" name="description"
                                    placeholder="Description" rows="10">{{ old('description') }}</textarea>

                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" class="form-control" id="link" name="link" placeholder="link"
                                    value="{{ old('link') }}" />
                                @error('link')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="mb-4 text-2xl">
                                <label for="image1" class="form-label">Image1</label>
                                <input class="form-control dropify" type="file" id="image1" name="image1"
                                    value="{{ old('image1') }}" data-default-file />

                                @error('image1')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mb-4 text-2xl">
                                <label for="image2" class="form-label">Image2</label>
                                <input class="form-control dropify" type="file" id="image2" name="image2"
                                    value="{{ old('image2') }}" data-default-file />

                                @error('image2')
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