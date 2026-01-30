@extends('layouts.admin.master')
@section('title', 'Inquiry')

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Inquiry ({{ $count }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route('inquiry.create') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2"><i
                        class="ri-add-line ri-lg"></i>
                    Create</a>
            </small>
        </div>
    </div>

    <div class="card">
        @if (!$inquries->isEmpty())
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table" id="dtable">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @foreach ($inquries as $key => $inquiry)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $inquiry->name }}</td>
                                    <td>{{ $inquiry->email }}</td>
                                    <td>{{ $inquiry->phone }}</td>

                                    <td class="gap-2">
                                        {{-- <a href="{{ route('inquiry.edit', $inquiry->id) }}" type="button"
                                        class="btn btn-sm btn-icon btn-primary">
                                        <i class="tf-icons bx bx-edit text-white"></i>
                                    </a> --}}

                                        <a href="{{ route('inquiry.show', $inquiry->id) }}" type="button"
                                            class="btn btn-sm btn-icon btn-info">
                                            <i class="tf-icons bx bx-show-alt text-white"></i>
                                        </a>
                                        <form action="{{ route('inquiry.destroy', $inquiry->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-icon btn-danger delete_inquiry">
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
        $('.delete_inquiry').click(function(e) {
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
