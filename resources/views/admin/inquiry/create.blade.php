@extends('layouts.admin.master')
@section('title', 'Inquiry')

@section('content')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create Inquiry</h5>
            <small class="text-muted float-end">
                <a href="{{ route('inquiry.index') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2">
                    <i class='ri-arrow-left-line ri-lg'></i>
                    Back
                </a>
            </small>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('inquiry.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name"
                        value="{{ old('name') }}" />
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="email"
                        value="{{ old('email') }}" />
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="form-label">phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone"
                        value="{{ old('phone') }}" />
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="query" class="form-label">query</label>
                    <textarea class="form-control" id="query" name="query" rows="4">{{ old('query') }}</textarea>
                    @error('query')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary">
                    Create
                </button>
            </form>
        </div>
    </div>

@endsection
