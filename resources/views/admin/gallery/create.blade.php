@extends('layouts.admin.master')

@php
    $title = 'Galleries';
    $name = 'gallery';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create Gallery</h5>
            <small class="text-muted float-end">
                <a href="{{ route('gallery.index') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2">
                    <i class='ri-arrow-left-line ri-lg'></i>
                    Back
                </a>
            </small>
        </div>

        <div class="card">

            <div class="card-body">
                <label>Drag and Drop Multiple Images (JPG, JPEG, PNG, .webp)</label>

                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="dropzone"
                    id="DZone">
                    @csrf
                </form>


            </div>
        </div>
@endsection

    @push('js')
        <script type="text/javascript">
            var maxFilesizeVal = 12;
            var maxFilesVal = 10;

            // Note that the name "DZone" is the camelized id of the form.
            Dropzone.options.DZone = {

                paramName: "file",
                maxFilesize: maxFilesizeVal, // MB
                maxFiles: maxFilesVal,
                resizeQuality: 1.0,
                acceptedFiles: ".jpeg,.jpg,.png,.webp",
                addRemoveLinks: false,
                timeout: 60000,
                dictDefaultMessage: "Drop your files here or click to upload",
                dictFallbackMessage: "Your browser doesn't support drag and drop file uploads.",
                dictFileTooBig: "File is too big. Max filesize: " + maxFilesizeVal + "MB.",
                dictInvalidFileType: "Invalid file type. Only JPG, JPEG, PNG and GIF files are allowed.",
                dictMaxFilesExceeded: "You can only upload up to " + maxFilesVal + " files.",
                maxfilesexceeded: function (file) {
                    this.removeFile(file);
                    // this.removeAllFiles(); 
                },
                sending: function (file, xhr, formData) {
                    $('#message').text('Image Uploading...');
                },
                success: function (file, response) {
                    $('#message').text(response.success);
                    console.log(response.success);
                    console.log(response);
                },
                error: function (file, response) {
                    $('#message').text('Something Went Wrong! ' + response);
                    console.log(response);
                    return false;
                }
            };
        </script>
    @endpush