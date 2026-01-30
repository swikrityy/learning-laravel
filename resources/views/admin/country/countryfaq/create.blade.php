@extends('layouts.admin.master')
@php
    $title = 'Faqs';
    $name = 'faq';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">Create {{ $name }}</h5>
            <small class="text-muted float-end">
                <a href="{{ route('countryfaq.index', $country->id) }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2">
                    <i class='ri-arrow-left-line ri-lg'></i>
                    Back
                </a>
            </small>
        </div>
    </div>

    <div>
        <form action="{{ route('countryfaq.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row justify-content-center g-4">

                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-body">

                            <input type="hidden" name="country_id" value="{{ $country->id }}">
                            <div class="mb-4">
                                <label for="question" class="form-label">Question</label>
                                <input type="text" class="form-control" id="question" name="question" placeholder="Question"
                                    value="{{ old('question') }}" />
                                @error('question')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>



                            <div class="mb-4">
                                <label for="answer" class="form-label">answer</label>
                                <textarea class="form-control ckeditor" id="answer" name="answer" placeholder="Answer"
                                    rows="10">{{ old('answer') }}</textarea>

                                @error('answer')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>




                        </div>
                    </div>
                </div>

                <div class="col-md-4">

                    <div class="card">
                        <div class="card-body">

                            <div class="mb-4">
                                <label for="status" class="form-label">status</label>
                                <select id="status" name="status" class="form-select">
                                    <option value="1" @if (old('status') == 1) selected @endif>Published
                                    </option>
                                    <option value="0" @if (old('status') == 0) selected @endif>Draft
                                    </option>
                                </select>

                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="order" class="form-label">Order</label>
                                <input type="number" class="form-control" id="order" name="order" placeholder="1"
                                    value="{{ old('order') }}" />
                                @error('order')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit text-center"
                                class="btn btn-sm btn-primary mt-4 d-flex align-items-center justify-content-between"><i
                                    class="bx bx-plus"></i>
                                Create
                            </button>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="mb-4 text-2xl">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control dropify" type="file" id="image" name="image"
                                    value="{{ old('image') }}" data-default-file />

                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </form>
    </div>
@endsection