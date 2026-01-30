@extends('layouts.admin.master')
@section('title', 'Advertisement')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Advertisements ({{ $count }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route('advertisement.create') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2"><i
                        class="ri-add-line ri-lg"></i>
                    Create</a>
            </small>
        </div>
    </div>

    <div class="card mt-4">
        @if (!$advertisements->isEmpty())
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table" id="dtable">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @foreach ($advertisements as $key => $advertisement)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset($advertisement->image) }}" width="80px"
                                            alt="{{ $advertisement->name }}">
                                    </td>
                                    <td>{{ $advertisement->title }}</td>
                                    <td>{{ $advertisement->order }}</td>
                                    <td>
                                        @if ($advertisement->status)
                                            <span class="badge bg-label-success me-1">Published</span>
                                        @else
                                            <span class="badge bg-label-danger me-1">Draft</span>
                                        @endif
                                    </td>
                                    <td class="gap-2">
                                        <a href="{{ route('advertisement.edit', $advertisement->id) }}" type="button"
                                            class="btn btn-sm btn-icon btn-primary">
                                            <i class="tf-icons bx bx-edit text-white"></i>
                                        </a>
                                        <form action="{{ route('advertisement.destroy', $advertisement->id) }}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-icon btn-danger delete_advertisement">
                                                <i class="tf-icons bx bx-trash text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="card-body">
                <h6>No Data Found!</h6>
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script>
        $('.delete_advertisement').click(function(e) {
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
@endsection
