@extends('layouts.admin.master')
@php
    $title = 'Dashboard';
    $name = 'dashboard';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0 text-capitalize">{{ $name }}</h5>
        </div>
        <div class="card-body">
            
            <div class="row">
                @foreach ($vars as $card_title => [$icon, $link, $value])
                    @php
                        $route = route($link);
                    @endphp
                    <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="card">
                            <a href="{{ $route }}" class="text-decoration-none link-dark">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <span>
                                                <i class="menu-icon tf-icons bx {{ $icon }} icon-style"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="fw-semibold d-block mb-1 text-capitalize">{{ $card_title }}</span>
                                    <h3 class="card-title mb-2 link-primary">{{ $value }}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

@push('css')
    <style>
        .icon-style {
            font-size: 40px;
        }
    </style>
@endpush
