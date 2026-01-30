@extends('layouts.admin.master')
@php
    $title = 'Gallery';
    $name = 'gallery';
@endphp
@section('content')
    <style>
        .fro-dropzone-image {
            box-shadow: 10px 10px 5px grey;
            margin-right: 20px;
            margin-bottom: 20px;
            width: 140px;
            height: 140px;
            position: relative;
        }

        .fro-dropzone-image-a {
            position: relative;
            width: 100%;
        }

        .fro-dropzone-image-img {
            height: 100%;
            width: 111%;
        }

        .fro-dropzone-image-btn {
            position: absolute;
            right: 1px;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('admin/inner/dropzone.min.css') }}">
    <script src="{{ asset('admin/inner/dropzone.js') }}"></script>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Galleries ({{ $galleries->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-secondary me-2" href="{{ route('album.index') }}">
                    <i class="fa-solid fa-arrow-left"></i> Back
                </a>
                <a class="btn btn-primary" href="{{ route('album.gallery.create', $album->id) }}">
                    <i class="fa-solid fa-upload"></i> Upload
                </a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            <div class="row">
                <div class="col-md-12">
                    <div class="row m-2">
                        @if ($galleries->isNotEmpty())

                            @foreach ($galleries as $gallery)
                                <div class="fro-dropzone-image">
                                    <a class="fro-dropzone-image-a fancybox" data-fancybox="demo"
                                        href="{{ asset($gallery->image) }}" target="_blank">
                                        <img class="fro-dropzone-image-img" src="{{ asset($gallery->image) }}"
                                            style="object-fit: contain;" alt="">
                                    </a>
                                    <button class="btn btn-danger btn-sm fro-dropzone-image-btn delete-single-document"
                                        imageid="{{ $gallery->id }}">X</button>
                                </div>
                            @endforeach
                            {{ $galleries->links() }}
                        @else
                            <div class="card-body">
                                <h6>No Data Found!</h6>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

    <script>
        $('.delete-single-document').click(function (e) {
            e.preventDefault();
            var id = $(this).attr('imageid');
            console.log('clicked: img id :', id); // debug
            var url = "{{ url('/admin/album/' . $album->id . '/gallery') }}/" + id + "/delete-file";

            swal.fire({
                title: `Are you sure?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}' // important!
                            },
                            success: function (data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Image deleted successfully.',
                                    timer: 1500,
                                    showConfirmButton: false
                                }); setTimeout(function () {
                                    location.reload();
                                }, 1000);
                            },
                            error: function () {
                                alert("An error occurred!");
                            },
                        });
                    }
                });
        });
    </script>
@endpush