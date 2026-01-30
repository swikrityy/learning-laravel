@extends('layouts.admin.master')
@php
    $title = 'Settings';
    $name = 'setting';
@endphp

@section('content')
    <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="card card-primary shadow br-8">
            <div class="card-body">
                <div class="row">
                    @include('admin.settings.includes.sidenav')
                    
                    <div class="col-9 col-sm-10 tab-content" id="v-pills-tabContent">

                        {{-- Global --}}
                        @include('admin.settings.includes.global')

                        {{-- Home  --}}
                        @include('admin.settings.includes.home')

                        {{-- Contact Us --}}
                        @include('admin.settings.includes.contact')

                    </div>
                </div>

                <div class="card-footers">
                    <button type="submit" class="btn btn-sm btn-primary flex justify-items-center">
                        <i class='bx bx-refresh'></i> Update
                        Settings</button>
                </div>

            </div>
        </div>

    </form>
@endsection
