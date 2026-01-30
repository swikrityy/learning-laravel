@extends('layouts.admin.master')
@php
    $title = 'Gallery';
    $name = 'gallery';
@endphp
@section('content')
    <link rel="stylesheet" href="{{ asset('admin/inner/dropzone.min.css') }}">
    <script src="{{ asset('admin/inner/dropzone.js') }}"></script>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Upload Images</h5>

            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('album.gallery.index', $album->id) }}">
                    <i class="fa-solid fa-arrow-left"></i> Back
                </a>
            </small>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <form class="dropzone" id="dropzone" action="{{ route('album.gallery.store', $album->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="dz-message">
                            Drag and Drop Your Images Here<br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('form#dropzone', {
            url: "{{ route('album.gallery.store', $album->id) }}",
            maxFiles: 50,
            acceptedFiles: 'image/*',
            dictInvalidFileType: 'This form only accepts images.',
            dictDefaultMessage: 'Drag or click here to upload',
            maxFilesize: 100,
            timeout: 180000000,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        });

        myDropzone.on("complete", function (file) {
            setTimeout(function () {
                window.location.href = "{{ route('album.gallery.index', $album->id) }}";
            }, 1500);

            toastr.success("Images Upload Successfully!", {
                fadeAway: 1500
            });
        });
    </script>
@endsection