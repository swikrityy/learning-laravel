@extends('layouts.auth.master')
@php
    $title = 'Register';
@endphp


@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="/" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">

                        <img src="{{ $settings['site_main_logo'] ? asset($settings['site_main_logo']) : asset('admin/default/img/logo.png') }}"
                            width="200px" alt="{{ $settings['site_title'] }}">


                    </span>
                    {{-- <span class="app-brand-text demo text-body fw-bolder">Paradise</span> --}}
                </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Welcome to {{ $settings['site_title_full'] }} !</h4>

            <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                <div class="mb-3">
                    @csrf
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                        value="{{ old('name') }}" autofocus />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->get('name') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                        value="{{ old('email') }}" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->get('email') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control" name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->get('password') }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password_confirmation" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->get('password_confirmation') }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions">
                            I agree to
                            <a href="javascript:void(0);">privacy policy & terms</a>
                        </label>
                    </div>
                </div> --}}
                <button class="btn btn-sm btn-primary d-grid w-100">Sign up</button>
            </form>

            <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}">
                    <span>Login</span>
                </a>
            </p>

            @if (Auth::user())
                <p class="text-center">
                    <a href="{{ route('dashboard') }}">
                        <span>Go To Dashboard</span>
                    </a>
                </p>
            @endif
        </div>
    </div>
@endsection
