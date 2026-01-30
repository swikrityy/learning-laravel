@extends('layouts.admin.master')
@php
    $title = 'Faqs';
    $name = 'faq';

@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">{{ $name }} </h5>
            <small class="text-muted float-end d-flex gap-1">
                <a href="{{ route('country.index') }}"
                    class="btn btn-sm btn-secondary d-flex justify-content-between align-items-center gap-2"><i
                        class="ri-arrow-left-line ri-lg"></i>
                    Back</a>
                <a href="{{ route('countryfaq.create', $country->id) }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2"><i
                        class="ri-add-line ri-lg"></i>
                    Create</a>
            </small>
        </div>
    </div>

    <div class="card">
        @if (!${$name . 's'}->isEmpty())
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                {{-- <th>Image</th> --}}
                                <th>Question</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @foreach (${$name . 's'} as $key => ${$name})
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    {{-- <td>
                                        <a href="{{ asset(${$name}->image) }}" class="fro-dropzone-image-a fancybox"
                                            data-fancybox="images" target="_blank">
                                            <img src="{{ asset(${$name}->image) }}" class="table_image" alt="{{ ${$name}->title }}">
                                        </a>
                                    </td> --}}
                                    <td>{{ ${$name}->question }}</td>

                                    <td>{{ ${$name}->order }}</td>
                                    <td>
                                        @if (${$name}->status)
                                            <span class="badge bg-label-success me-1">Published</span>
                                        @else
                                            <span class="badge bg-label-danger me-1">Draft</span>
                                        @endif
                                    </td>
                                    <td class="">
                                        <a href="{{ route('countryfaq.edit', ${$name}->id) }}" type="button"
                                            class="btn btn-sm btn-icon btn-primary">
                                            <i class="tf-icons bx bx-edit text-white"></i>
                                        </a>
                                        <form action="{{ route('countryfaq.destroy', ${$name}->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-icon btn-danger delete_{{$name}}">
                                                <i class="tf-icons bx bx-trash text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                    {{ ${$name . 's'}->links() }}
                </div>
            </div>
        @else
            <div class="card-body">
                <h6>No Data Found!</h6>
            </div>
        @endif
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Fancybox.bind("[data-fancybox='images']", {
                // Customize your FancyBox options here
                infinite: true,
                buttons: ["zoom", "slideShow", "fullScreen", "download", "thumbs", "close"],
            });
        });
    </script>

    <script>
        $('.delete_faq').click(function (e) {
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