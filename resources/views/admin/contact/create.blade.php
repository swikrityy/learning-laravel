@extends('layouts.admin.master')
@section('title', 'Contact')

@section('content')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create Contact</h5>
            <small class="text-muted float-end">
                <a href="{{ route('contact.index') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2">
                    <i class='ri-arrow-left-line ri-lg'></i>
                    Back
                </a>
            </small>
        </div>
    </div>


    <div>
        <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row justify-content-center g-4">

                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-body">


                            <div class="mb-4">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                    value="{{ old('title') }}" />
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                    value="{{ old('email') }}" />
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact"
                                    placeholder="Contact" value="{{ old('contact') }}" />
                                @error('contact')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    placeholder="Location" value="{{ old('location') }}" />
                                @error('location')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="map" class="form-label">Map</label>
                                <textarea class="form-control" id="map" name="map" placeholder="Map" rows="2">{{ old('map') }}</textarea>
                                @error('map')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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

                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">

                            <div class="mb-4">
                                <label for="seo_title" class="form-label">SEO Title</label>
                                <input type="text" class="form-control" id="seo_title" name="seo_title"
                                    placeholder="SEO Title" value="{{ old('seo_title') }}" />
                                @error('seo_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                    placeholder="Meta Keywords" value="{{ old('seo_title') }}" />
                                @error('meta_keywords')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description"
                                    rows="4">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="seo_schema" class="form-label">SEO Schema</label>
                                <textarea class="form-control" id="seo_schema" name="seo_schema" placeholder="SEO Schema" rows="4">{{ old('seo_schema') }}</textarea>
                                @error('seo_schema')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                </div>
            </div>


            <button type="submit"
                class="btn btn-sm btn-primary mt-4 d-flex align-items-center justify-content-between"><i
                    class="bx bx-plus"></i>
                Create
            </button>
        </form>
    </div>


@endsection

@section('js')
    <script></script>
@endsection
