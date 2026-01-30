@extends('layouts.admin.master')
@php
    $title = 'Applications';
    $name = 'application';
@endphp
@section('content')

    {{-- <div class="card"> --}}
        {{-- <div class="card container-fluid mb-4"> --}}
            <div class="card mb-4">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Albums</h5>
                    <small class="text-muted float-end">
                        <a class="btn btn-primary" href="{{ route('album.index') }}"><i class="fa-solid fa-arrow-left"></i>
                            Back</a>
                    </small>
                </div>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('album.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8">
                        <div class="card card-body main-description shadow br-8 p-4 mb-3">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input id="nameInput" class="form-control br-8 @error('name') is-invalid @enderror"
                                    type="text" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                                {{-- <div class="d-flex flex-wrap gap-2 col">
                                    <label style="background-color: #e8fadf;" class="badge text-success rounded-pill"
                                        for="name">Suggested
                                        Names:</label>
                                    @foreach ($albums as $album)
                                    <label
                                        style="background-color: rgba(50, 50, 50, 0.4); margin-left: 5px; color: rgba(255, 255, 255, 0.9);"
                                        class="badge suggested-name" for="" data-name="{{ $album->name }}"
                                        id="name_{{ $album->id }}">{{ $album->name }}</label>
                                    @endforeach
                                </div> --}}
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor1 br-8 @error('description') is-invalid @enderror"
                                    id="description" name="description" rows="10"
                                    placeholder="Enter description">{{ old('description') }}</textarea>
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
                                    <option class="p-3" value="1">Publish</option>
                                    <option class="p-3" value="0">Draft</option>
                                </select>
                            </div>

                            {{--
                            <hr class="shadow-sm"> --}}

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order') }}" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{--
                            <hr class="shadow-sm"> --}}
                            <div class="form-group mb-3">
                                <label for="image">Featured Image</label>
                                <div class="custom-file">
                                    <input class="dropify @error('image') is-invalid @enderror" id="image"
                                        data-show-remove="false"
                                        data-default-file="{{ isset($album) ? asset('storage/' . $album->image) : '' }}"
                                        type="file" name="image">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{--
                            <hr class="shadow-sm"> --}}

                            <div class="card-footers">
                                <button class="btn btn-lg btn-primary" type="submit"><i class="fa-solid fa-plus"></i>
                                    Publish</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('nameInput');
        const nameLabels = document.querySelectorAll('.suggested-name');

        nameLabels.forEach(label => {
            label.addEventListener('click', () => {
                const name = label.getAttribute('data-name');
                nameInput.value = name;
            });
        });
    });
</script>