@extends('layouts.auth.master')

@php
    $title = 'Log in';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="/" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">

                        <img src="{{ $settings['site_main_logo'] ? asset($settings['site_main_logo']) : asset('admin/default/img/favicon.png') }}"
                            width="200px" alt="{{ $settings['site_title'] }}">


                    </span>
                    {{-- <span class="app-brand-text demo text-body fw-bolder">Paradise</span> --}}
                </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Welcome to {{ $settings['site_title_full'] }} !</h4>
            <p class="mb-4">Please Sign-in to your account</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" placeholder="Enter your email" required
                        autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                <small>Forgot Password?</small>
                            </a>
                        @endif
                    </div>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" required autocomplete="current-password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>


                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>


                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
            </form>

        </div>
    </div>
@endsection
