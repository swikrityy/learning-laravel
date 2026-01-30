@extends('layouts.admin.master')
@php
    $title = 'Applications';
    $name = 'application';
@endphp

@section('content')

    {{-- <div class="content"> --}}
        {{-- <div class="card container-fluid mb-4"> --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit albums - {{ $album->name }}</h5>
                    <small class="text-muted float-end">
                        <a class="btn btn-sm btn-primary" href="{{ route('album.index') }}"><i
                                class="fa-solid fa-arrow-left"></i>
                            Back</a>
                    </small>
                </div>
            </div>

            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('album.update', $album->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <!-- Main Content -->
                    <div class="col-md-8">
                        <div class="card card-body main-description shadow br-8 p-4">

                            <!-- Name Field -->
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text" name="name"
                                    value="{{ old('name', $album->name) }}" placeholder="Enter title">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Description Field -->
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror"
                                    id="description" name="description" rows="10"
                                    placeholder="Enter Description">{{ old('description', $album->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="1" {{ old('status', $album->status) == 1 ? 'selected' : '' }}>
                                        Publish</option>
                                    <option class="p-3" value="0" {{ old('status', $album->status) == 0 ? 'selected' : '' }}>
                                        Draft</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $album->order) }}" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">
                            <div class="form-group mb-3">
                                <label for="image">Featured Image</label>
                                <div class="custom-file">
                                    <input class="dropify @error('image') is-invalid @enderror" id="image"
                                        data-show-remove="false"
                                        data-default-file="{{ isset($album) ? asset($album->image) : '' }}" type="file"
                                        name="image">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="shadow-sm">

                            <div class="card-footers d-flex justify-content-center">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                    Update</button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
            {{--
        </div> --}}
        {{--
    </div> --}}
@endsection

<!-- Custom Styles -->
<style>
    label {
        font-weight: 500 !important;
        text-transform: uppercase;
        margin-bottom: 5px;
        line-height: 200%;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .btn-primary {
        font-size: 16px;
        padding: 10px 20px;
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #ddd;
    }

    .main-description {
        border-radius: 10px;
    }
</style>