@extends('layouts.admin.master')

@php
    $title = 'Contact Inquiry';
    $name = 'contactinquries';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Contact Inquiry ({{ $contactinquiries->count() }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route('contactinquiry.create') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2"><i
                        class="ri-add-line ri-lg"></i>
                    Create</a>
            </small>
        </div>
    </div>

    <div class="card">
        @if (!$contactinquiries->isEmpty())
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @foreach ($contactinquiries as $key => $contactinquiry)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $contactinquiry->name }}</td>
                                    <td>{{ $contactinquiry->email }}</td>
                                    <td>{{ $contactinquiry->phone }}</td>
                                    <td>{{ $contactinquiry->city }}</td>


                                    <td class="gap-2">
                                        {{-- <a href="{{ route('contactinquiry.edit', $contactinquiry->id) }}" type="button"
                                        class="btn btn-sm btn-icon btn-primary">
                                        <i class="tf-icons bx bx-edit text-white"></i>
                                    </a> --}}

                                        <a href="{{ route('contactinquiry.show', $contactinquiry->id) }}" type="button"
                                            class="btn btn-sm btn-icon btn-info">
                                            <i class="tf-icons bx bx-show-alt text-white"></i>
                                        </a>
                                        <form action="{{ route('contactinquiry.destroy', $contactinquiry->id) }}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-icon btn-danger delete_contactinquiry">
                                                <i class="tf-icons bx bx-trash text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                    {{ $contactinquiries->links() }}
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
        $('.delete_contactinquiry').click(function(e) {
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
