@extends('layouts.auth.master')
@php
    $title = 'Forget Password';
@endphp


@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="/" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">

                        <img src="{{ $settings['site_main_logo'] ? asset($settings['site_main_logo']) : 'All Nepal Excursion' }}"
                            width="200px" alt="All Nepal Excursion Logo">


                    </span>
                    {{-- <span class="app-brand-text demo text-body fw-bolder">Paradise</span> --}}
                </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Forgot Password?</h4>
            <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>

            <x-auth-session-status class="mb-4" :status="session('status')" />


            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email"
                        autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="mb-3">
                    <button class="btn btn-sm btn-primary d-grid w-100" type="submit">Email Password Reset Link</button>
                </div>
                <div class="text-center">
                    <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                        <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                        Back to login
                    </a>
                </div>
            </form>

        </div>
    </div>
@endsection
