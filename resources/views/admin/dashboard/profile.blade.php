@extends('layouts.admin.master')
@php
    $title = 'Profile';
    $name = 'profile';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $title }}</h5>
            <small class="text-muted float-end">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-primary"><i class='bx bx-left-arrow-alt'></i>
                    Back</a>
            </small>
        </div>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Change Password</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label" for="current_password">Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                name="current_password" id="current_password" value="{{ old('current_password') }}"
                                placeholder="">
                            @error('current_password')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="new_password">New Password</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                name="password" id="new_password" value="{{ old('password') }}" placeholder=""
                                autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="new_password_confirmation">Confirm New Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" id="new_password_confirmation"
                                value="{{ old('password_confirmation') }}" placeholder="" autocomplete="new-password">
                            @error('password_confirmation')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary d-flex align-items-center">
                            <i class='bx bx-refresh'></i>
                            Change Password
                        </button>

                        @if (session('status') === 'password-updated')
                            <p class="text-sm text-success mt-2">Passord Updated.</p>
                        @endif
                    </form>


                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Delete Account</h5>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('profile.destroy') }}" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="" value="{{ old('password') }}" placeholder="">
                            @error('password')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button type="submit"
                            class="btn btn-sm btn-danger d-flex justify-space-between align-items-center delete_profile">
                            {{-- <i class='text-sm bx bx-trash'></i> --}}
                            Delete Account
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('.delete_profile').click(function(e) {
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
