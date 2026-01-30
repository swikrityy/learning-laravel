@extends('layouts.admin.master')
@php
    $title = 'Enquiries';
    $name = 'enquiry';
    $app = 'application';
    $result = 'result';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show Student Enquiry</h5>
            <small class="text-muted float-end">
                <a href="{{ route($app . '.index') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2">
                    <i class='ri-arrow-left-line ri-lg'></i>
                    Back
                </a>
            </small>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">General Information</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Information</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">

                                <!-- Basic Info -->
                                <tr>
                                    <td>Full Name</td>
                                    <td>{{ ${$name}->full_name ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Branch</td>
                                    <td>{{ ${$name}->branch ?? '-' }}</td>
                                </tr>

                                <!-- Additional Info -->
                                <tr>
                                    <td>Marital Status</td>
                                    <td>{{ ${$name}->marital_status ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Address</td>
                                    <td>{{ ${$name}->address ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Mobile</td>
                                    <td>
                                        @if (${$name}->mobile)
                                            <a href="tel:{{ ${$name}->mobile }}">{{ ${$name}->mobile }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td>
                                        @if (${$name}->email)
                                            <a href="mailto:{{ ${$name}->email }}">{{ ${$name}->email }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Phone 2</td>
                                    <td>
                                        @if (${$name}->phone2)
                                            <a href="tel:{{ ${$name}->phone2 }}">{{ ${$name}->phone2 }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>


                                {{--
                                <tr>
                                    <td>Note</td>
                                    <td>{{ ${$name}->note ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Consultant</td>
                                    <td>{{ ${$name}->consultant ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Priority</td>
                                    <td>{{ ${$name}->priority ?? '-' }}</td>
                                </tr> --}}


                                <!-- Academic Qualification -->
                                <tr>
                                    <td>Qualification</td>
                                    <td>{{ ${$name}->qualification ?? '-' }}</td>
                                </tr>



                                <!-- Other Details -->
                                <tr>
                                    <td>Preferred Country</td>
                                    <td>{{ ${$name}->preferred_country ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Language Test</td>
                                    <td>{{ ${$name}->language_test ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Test Type</td>
                                    <td>{{ ${$name}->test_type ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Test Score</td>
                                    <td>{{ ${$name}->test_score ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Preferred Education</td>
                                    <td>{{ ${$name}->preferred_education ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Preferred Institution Name</td>
                                    <td>{{ ${$name}->preferred_institution_name ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Source</td>
                                    <td>
                                        @if (!empty(${$name}->source) || ${$name}->source == '{}' || ${$name}->source == '')
                                            <ul>
                                                @foreach (${$name}->source as $src)
                                                    <li class="text-capitalize">{{ $src }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Message</td>
                                    <td>{{ ${$name}->message ?? '-' }}</td>
                                </tr>


                                <!-- Status -->
                                {{-- <tr>
                                    <td>Status</td>
                                    <td>{{ ${$name}->status ?? '-' }}</td>
                                </tr> --}}


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <label for="name" class="form-label">Choose Status</label>
                    {{-- Main Status Form --}}
                    {{-- CSRF token for AJAX --}}
                    <meta name="csrf-token" content="{{ csrf_token() }}">

                    {{-- STATUS DROPDOWN FORM --}}
                    <form action="{{ route('application.update', ${$app}->id) }}" method="POST" id="statusForm">
                        @csrf
                        @method('PUT')

                        <select name="status" class="form-select form-select-sm" id="statusSelect">
                            <option value="" disabled selected>Choose Status</option>
                            <option value="forward" {{ ${$app}->status == 'forward' ? 'selected' : '' }}>
                                Forward
                            </option>
                            <option value="wait" {{ ${$app}->status == 'wait' ? 'selected' : '' }}>Wait</option>
                            <option value="cancel" {{ ${$app}->status == 'cancel' ? 'selected' : '' }}>Cancel</option>

                        </select>

                        <button type="submit" class="btn btn-primary mt-2" id="statusSubmitBtn">Submit Status</button>
                    </form>

                    {{-- CLASS ENROLLMENT FORM --}}
                    <div id="classEnrollForm" style="display: none;" class="mt-3">
                        <form id="classEnrollRealForm" action="{{ route('application.classupdate', ${$app}->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="classenroll">

                            <div class="mb-3">
                                <label for="class_name" class="form-label">Class Name</label>
                                <input type="text" class="form-control" id="class_name" name="name"
                                    value="{{ old('name', ${$app}->classEnrolls->name ?? '') }}" required>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="class_date" class="form-label">Class Date</label>
                                <input type="date" class="form-control" id="class_date" name="date"
                                    value="{{ old('date', ${$app}->classEnrolls->date ?? '') }}">
                                @error('date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="class_shift" class="form-label">Select Shift</label>
                                <select name="shift" id="class_shift" class="form-select" required>
                                    <option value="">Choose</option>
                                    <option value="Morning" {{ old('shift', ${$app}->classEnrolls->shift ?? '') == 'Morning' ? 'selected' : '' }}>
                                        Morning</option>
                                    <option value="Day" {{ old('shift', ${$app}->classEnrolls->shift ?? '') == 'Day' ? 'selected' : '' }}>
                                        Day
                                    </option>
                                </select>
                                @error('shift')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="document" class="form-label">Document Link</label>
                                <input type="text" class="form-control" id="document" name="link"
                                    value="{{ old('link', ${$app}->documentLink->link ?? '') }}" required>
                                @error('link')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                @if (!empty(${$app}->documentLink->link))

                                    <a class="mb-4" target="_blank" href="{{ ${$app}->documentLink->link }}">View Document
                                        Link</a><br>
                                @endif
                            </div>

                            <button type="button" class="btn btn-success" onclick="submitWithStatus('classenroll')">
                                <i class="ri-check-line"></i> Update Class
                            </button>
                            @if (!empty(${$app}->documentLink->link))
                                <a href="#visadetail" class="btn btn-primary">Visa Details</a><br>

                            @endif
                            {{-- <button type="button" class="btn">Visa Details</button> --}}
                        </form>
                    </div>


                </div>
            </div>

            <div class="card mt-4">
                <h5 class="card-header">Guardian Information</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Information</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <!-- Guardian Info -->
                                <tr>
                                    <td>Name</td>
                                    <td>{{ ${$name}->parents_name ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Address</td>
                                    <td>{{ ${$name}->g_address ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Mobile</td>
                                    <td>
                                        @if (${$name}->g_mobile)
                                            <a href="tel:{{ ${$name}->g_mobile }}">{{ ${$name}->g_mobile }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td>
                                        @if (${$name}->g_email)
                                            <a href="mailto:{{ ${$name}->g_email }}">{{ ${$name}->g_email }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <h5 class="card-header">Academic Qualification</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Degree</th>
                                <th>School / Collage Name</th>
                                <th>GPA Obtained</th>
                                <th>Passed Year</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <!-- Academic Qualification -->
                            {{-- <tr>
                                <td>Qualification</td>
                                <td>{{ ${$name}->qualification ?? '-' }}</td>
                            </tr> --}}

                            @if (!empty(${$name}->see_school_name) || !empty(${$name}->see_gpa) || !empty(${$name}->see_passed_year))
                                <tr>
                                    <td>SEE</td>
                                    <td>{{ ${$name}->see_school_name ?? '-' }}</td>
                                    <td>{{ ${$name}->see_gpa ?? '-' }}</td>
                                    <td>{{ ${$name}->see_passed_year ?? '-' }}</td>
                                </tr>
                            @endif

                            @if (!empty(${$name}->plus_two_college_name) || !empty(${$name}->plus_two_gpa) || !empty(${$name}->plus_two_passed_year))
                                <tr>
                                    <td>+2</td>
                                    <td>{{ ${$name}->plus_two_college_name ?? '-' }}</td>
                                    <td>{{ ${$name}->plus_two_gpa ?? '-' }}</td>
                                    <td>{{ ${$name}->plus_two_passed_year ?? '-' }}</td>
                                </tr>
                            @endif

                            @if (!empty(${$name}->bachelor_college_name) || !empty(${$name}->bachelor_gpa) || !empty(${$name}->bachelor_passed_year))
                                <tr>
                                    <td>Bachelor's Degree</td>
                                    <td>{{ ${$name}->bachelor_college_name ?? '-' }}</td>
                                    <td>{{ ${$name}->bachelor_gpa ?? '-' }}</td>
                                    <td>{{ ${$name}->bachelor_passed_year ?? '-' }}</td>
                                </tr>
                            @endif

                            @if (!empty(${$name}->master_college_name) || !empty(${$name}->master_gpa) || !empty(${$name}->master_passed_year))
                                <tr>
                                    <td>Master's Degree</td>
                                    <td>{{ ${$name}->master_college_name ?? '-' }}</td>
                                    <td>{{ ${$name}->master_gpa ?? '-' }}</td>
                                    <td>{{ ${$name}->master_passed_year ?? '-' }}</td>
                                </tr>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if (!empty(${$app}->documentLink->link))
                <div class="card mt-4">
                    <h5 class="card-header" id="visadetail">Visa Details</h5>
                    <div class="card-body">
                        <label for="name" class="form-label">Select Status</label>

                        <form action="{{ route('result.update', ${$app}->result->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-form w-100">
                                <select name="status" class="form-select"
                                    onchange="toggleRemarks(this, {{ ${$app}->result->id }});">
                                    <option value="" disabled selected>Choose Status</option>
                                    <option value="refused" {{ ${$app}->result->status == 'refused' ? 'selected' : '' }}>
                                        Refused
                                    </option>
                                    <option value="withdraw" {{ ${$app}->result->status == 'withdraw' ? 'selected' : '' }}>
                                        Withdraw
                                    </option>
                                    <option value="grant" {{ ${$app}->result->status == 'grant' ? 'selected' : '' }}>
                                        Visa Granted
                                    </option>
                                </select>
                            </div>
                            <div id="remarks-{{ ${$app}->result->id }}"
                                style="{{ ${$app}->result->status == 'refused' ? '' : 'display:none;' }}">
                                <input type="text" name="remarks" class="form-control mt-2" placeholder="Enter remarks"
                                    value="{{ ${$app}->result->remarks ?? '' }}">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </div>
                    </form>

                </div>
            </div>
        @endif


    </div>


@endsection

@section('js')
    <script>
        $('.delete_contactinquiry').click(function (e) {
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

        function toggleRemarks(select, id) {
            var remarksDiv = document.getElementById('remarks-' + id);
            if (select.value === 'refused') {
                remarksDiv.style.display = '';
            } else {
                remarksDiv.style.display = 'none';
            }
        }

        function removeExistingImage(imagePath, button) {
            // Remove preview
            button.closest('div').remove();

            // Append the removed image path to a hidden input
            const removedImagesInput = document.getElementById('removed-images');
            let removed = JSON.parse(removedImagesInput.value || "[]");
            removed.push(imagePath);
            removedImagesInput.value = JSON.stringify(removed);
        }

        function displayImages() {
            const input = document.getElementById('property-images');
            const container = document.getElementById('image-preview-container');

            if (input.files) {
                // Clear previous previews if needed
                // container.innerHTML = '';

                // Process each selected file
                for (let i = 0; i < input.files.length; i++) {
                    const file = input.files[i];

                    // Only process image files
                    if (!file.type.match('image.*')) {
                        continue;
                    }

                    // Create a new preview element
                    const preview = document.createElement('div');
                    preview.className = 'relative border rounded-md p-1';

                    // Create image element
                    const img = document.createElement('img');
                    img.className = 'w-full h-24 object-cover rounded';
                    preview.appendChild(img);

                    // Create file name element
                    const name = document.createElement('p');
                    name.className = 'text-xs text-gray-500 truncate mt-1';
                    name.textContent = file.name;
                    preview.appendChild(name);

                    // Create remove button
                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className =
                        'absolute top-1 right-1 bg-red-500 rounded-full w-5 h-5 flex items-center justify-center btn btn-sm btn-danger mt-4';
                    removeBtn.style.zIndex = 10;
                    removeBtn.innerHTML = '×';
                    removeBtn.onclick = function () {
                        preview.remove();
                    };
                    preview.appendChild(removeBtn);

                    // Add to container
                    container.appendChild(preview);

                    // Read and display the image
                    const reader = new FileReader();
                    reader.onload = (function (aImg) {
                        return function (e) {
                            aImg.src = e.target.result;
                        };
                    })(img);
                    reader.readAsDataURL(file);
                }
            }
        }

        const statusSelect = document.getElementById('statusSelect');
        const classForm = document.getElementById('classEnrollForm');
        const prepForm = document.getElementById('preparationForm');
        const documentImage = document.getElementById('documentImage');

        const submitBtn = document.getElementById('statusSubmitBtn');


        function toggleForms() {
            const value = statusSelect.value;
            if (classForm) classForm.style.display = value === 'forward' ? 'block' : 'none';
            if (prepForm) prepForm.style.display = value === 'forward' ? 'block' : 'none';
            if (documentImage) documentImage.style.display = value === 'forward' ? 'block' : 'none';
            if (submitBtn) submitBtn.style.display = (value !== 'forward') ?
                'inline-block' : 'none';
        }

        document.addEventListener('DOMContentLoaded', toggleForms);
        statusSelect.addEventListener('change', toggleForms);

        function submitWithStatus(type) {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const id = "{{ ${$app}->id }}";

            fetch(`{{ route('application.update', '__id__') }}`.replace('__id__', id), {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    _method: 'PUT',
                    status: 'forward'
                })
            })
                .then(response => {
                    if (!response.ok) {
                        alert("Failed to update status.");
                        return;
                    }
                    // After successful status update, submit the class/preparation form
                    if (type === 'classenroll') {
                        document.getElementById('classEnrollRealForm').submit();
                    } else if (type === 'preparation') {
                        document.getElementById('prepRealForm').submit();
                    } else if (type === 'documentation') {
                        document.getElementById('documentImageForm').submit();
                    }
                })
                .catch(error => {
                    console.error("Error updating status:", error);
                });
        }



        function removeExistingImage(imagePath, button) {
            // Remove preview
            button.closest('div').remove();

            // Append the removed image path to a hidden input
            const removedImagesInput = document.getElementById('removed-images');
            let removed = JSON.parse(removedImagesInput.value || "[]");
            removed.push(imagePath);
            removedImagesInput.value = JSON.stringify(removed);
        }

        function displayImages() {
            const input = document.getElementById('property-images');
            const container = document.getElementById('image-preview-container');

            if (input.files) {
                // Clear previous previews if needed
                // container.innerHTML = '';

                // Process each selected file
                for (let i = 0; i < input.files.length; i++) {
                    const file = input.files[i];

                    // Only process image files
                    if (!file.type.match('image.*')) {
                        continue;
                    }

                    // Create a new preview element
                    const preview = document.createElement('div');
                    preview.className = 'relative border rounded-md p-1';

                    // Create image element
                    const img = document.createElement('img');
                    img.className = 'w-full h-24 object-cover rounded';
                    preview.appendChild(img);

                    // Create file name element
                    const name = document.createElement('p');
                    name.className = 'text-xs text-gray-500 truncate mt-1';
                    name.textContent = file.name;
                    preview.appendChild(name);

                    // Create remove button
                    const removeBtn = document.createElement('button');
                    removeBtn.className =
                        'absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center';
                    removeBtn.innerHTML = '×';
                    removeBtn.onclick = function () {
                        preview.remove();
                    };
                    preview.appendChild(removeBtn);

                    // Add to container
                    container.appendChild(preview);

                    // Read and display the image
                    const reader = new FileReader();
                    reader.onload = (function (aImg) {
                        return function (e) {
                            aImg.src = e.target.result;
                        };
                    })(img);
                    reader.readAsDataURL(file);
                }
            }
        }
    </script>
@endsection