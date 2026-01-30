@extends('layouts.admin.master')

@php
    $title = 'Socials';
    $name = 'social';
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
                                <label for="title" class="form-label">Name</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                    value="{{ old('title', ${$name}->title) }}" />
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4 ">
                                <label for="icon" class="form-label">icon</label>
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="icon"
                                    value="{{ old('icon', ${$name}->icon) }}" />
                                @error('icon')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4 ">
                                <label for="link" class="form-label">link</label>
                                <input type="text" class="form-control" id="link" name="link" placeholder="Link"
                                    value="{{ old('link', ${$name}->link) }}" />
                                @error('link')
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

                </div>
            </div>

        </form>
    </div>
@endsection
