@extends('layouts.admin.master')
@php
    $title = 'Applications';
    $name = 'application';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize font-weight-bold "> Albums</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('album.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap text-capitalize">
            @if (!$albums->isEmpty())
                <table class="table">
                    <thead>
                        <tr class="text-lg">
                            <th>SN</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($albums as $key => $alb)
                            <tr>
                                <td><strong>{{ $key + $albums->firstItem() }}</strong></td>
                                <td>
                                    <a class="fancybox" data-fancybox="demo" href="{{ asset($alb->image) }}">
                                        <img src="{{ asset($alb->image) }}" alt="{{ $alb->name }}" width="120px" height="60px">
                                    </a>
                                </td>
                                <td><strong>{{ $alb->name ?? '' }}</strong></td>
                                <td><strong>{{ $alb->order ?? '' }}</strong></td>
                                <td><span
                                        class="badge rounded-pill bg-label-{{ $alb->status == 1 ? 'success' : 'danger' }}">{{ $alb->status == 1 ? 'Publish' : 'Draft' }}</span>
                                </td>
                                <td>
                                    <!-- Link to show related gallery (with nested route) -->
                                    <a class="btn btn-sm btn-dark" href="{{ route('album.gallery.index', $alb->id) }}"
                                        style="float: left; margin-right: 5px; font-size:15px">
                                        <i class="fa fa-align-justify"></i> Photo
                                    </a>

                                    <!-- Edit Album -->
                                    <a class="btn btn-sm btn-primary" href="{{ route('album.edit', $alb->id) }}"
                                        style="float: left; margin-right: 5px; font-size:15px" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit Album">
                                        <i class="tf-icons bx bx-edit text-white"></i>
                                    </a>

                                    <!-- Delete Album -->
                                    <form class="delete-form" action="{{ route('album.destroy', $alb->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_albums mr-2 text-lg" data-type="confirm"
                                            type="submit" style="font-size:15px" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Delete Album">
                                            <i class="tf-icons bx bx-trash text-white"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $albums->links() }}
            @else
                <div class="card-body">
                    <h6>No Data Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.delete_albums').click(function (e) {
            e.preventDefault();
            swal({
                title: `Are you sure?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });
        });
    </script>
@endsection