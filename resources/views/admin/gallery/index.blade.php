@extends('layouts.admin.master')
@php
    $title = 'Galleries';
    $name = 'gallery';
@endphp

@section('content')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Gallery ({{ $galleries->count() }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route('gallery.create') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2"><i
                        class="ri-add-line ri-lg"></i>
                    Create</a>
            </small>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                @if (!$galleries->isEmpty())
                    @foreach ($galleries as $photo)
                        <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-4">
                            <div class="card position-relative">

                                <a href="{{ asset($photo->image) }}" class="fro-dropzone-image-a fancybox"
                                    data-fancybox="gallery" target="_blank">
                                    <div class="ratio ratio-1x1">
                                        <img src="{{ asset($photo->image) }}" alt=""
                                            class="fro-dropzone-image-img rounded">
                                    </div>
                                </a>
                                <form action="{{ route('gallery.destroy', $photo->id) }}" method="post"
                                    class="d-inline position-absolute top-0 end-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-icon btn-danger delete_photo">
                                        <i class="tf-icons bx bx-trash text-white"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card-body">
                        <h6>No Images Found!</h6>
                    </div>
                @endif



            </div>
        </div>

    @endsection

    @push('css')
    @endpush

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Fancybox.bind("[data-fancybox='gallery']", {
                    // Customize your FancyBox options here
                    infinite: true,
                    buttons: ["zoom", "slideShow", "fullScreen", "download", "thumbs", "close"],
                });
            });
        </script>

        <script>
            $('.delete_photo').click(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest("form").submit();
                    }
                });

            });
        </script>
    @endpush
