@extends('layouts.admin.master')

@php
    $title = 'Teams';
    $name = 'team';
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
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                        value="{{ old('name', ${$name}->name) }}" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4 col-md-4">
                                    <label for="position" class="form-label">position</label>
                                    <input type="text" class="form-control" id="position" name="position"
                                        placeholder="Position" value="{{ old('position', ${$name}->position) }}" />
                                    @error('position')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description"
                                    rows="4">{{ old('description', ${$name}->description) }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook"
                                    value="{{ old('facebook', ${$name}->facebook) }}" />
                                @error('facebook')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="whatsapp" class="form-label">Whatsapp</label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                    placeholder="Eg- 980000000" value="{{ old('whatsapp', ${$name}->whatsapp) }}" />
                                @error('whatsapp')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                    value="{{ old('email', ${$name}->email) }}" />
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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

                            <button type="submit" class="btn btn-sm btn-primary mt-4">
                                <i class='bx bx-refresh'></i>
                                Update
                            </button>
                        </div>
                    </div>

                    {{-- <div class="card mt-4">
                        <div class="card-header">Social Medias</div>
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="facebook" class="form-label">facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="facebook"
                                    value="{{ old('facebook', $team->facebook) }}" />
                                @error('facebook')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    placeholder="instagram" value="{{ old('instagram', $team->instagram) }}" />
                                @error('instagram')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="twitter"
                                    value="{{ old('twitter', $team->twitter) }}" />
                                @error('twitter')
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