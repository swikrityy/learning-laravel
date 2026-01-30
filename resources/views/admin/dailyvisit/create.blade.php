@extends('layouts.admin.master')
@php
    $title = 'Daily Visits';
    $name = 'dailyvisit';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-capitalize">Create {{ $title }}</h5>
            <small class="text-muted float-end">
                <a href="{{ route($name . '.index') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2">
                    <i class='ri-arrow-left-line ri-lg'></i>
                    Back
                </a>
            </small>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dailyvisit.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-4 col-lg-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name"
                            value="{{ old('name') }}" />
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <label for="phone" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="contact number" value="{{ old('phone') }}" />
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email"
                            value="{{ old('email') }}" />
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <label for="qualification" class="form-label">Highest Qualification</label>
                        <select class="form-control" id="qualification" name="qualification" required>
                            <option value="">-- Select Qualification --</option>
                            <option value="High School" {{ old('qualification') == 'High School' ? 'selected' : '' }}>High
                                School</option>
                            <option value="Bachelor's Degree"
                                {{ old('qualification') == "Bachelor's Degree" ? 'selected' : '' }}>Bachelor's Degree
                            </option>
                            <option value="Master's Degree"
                                {{ old('qualification') == "Master's Degree" ? 'selected' : '' }}>
                                Master's Degree</option>
                        </select>
                        @error('qualification')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <label for="country" class="form-label">Country of Interest</label>
                        <select class="form-control" id="country" name="country" required>
                            <option value="">-- Select country of interest --</option>
                            <option value="Australia" {{ old('country') == 'Australia' ? 'selected' : '' }}>Study in
                                Australia
                            </option>
                            <option value="Japan" {{ old('country') == 'Japan' ? 'selected' : '' }}>Study in Japan
                            </option>
                            <option value="Other" {{ old('country') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('country')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <label for="course" class="form-label">Intended Course</label>
                        <select class="form-control" id="course" name="course" required>
                            <option value="">-- Select intended course --</option>
                            <option value="IELTS" {{ old('course') == 'IELTS' ? 'selected' : '' }}>IELTS</option>
                            <option value="Japanese Language" {{ old('course') == 'Japanese Language' ? 'selected' : '' }}>
                                Japanese Language</option>
                            <option value="PTE" {{ old('course') == 'PTE' ? 'selected' : '' }}>PTE</option>
                            <option value="TOEFL" {{ old('course') == 'TOEFL' ? 'selected' : '' }}>TOEFL</option>
                            <option value="Other" {{ old('course') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('course')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <label for="visit_date" class="form-label">Date of Visit</label>
                        <input type="date" class="form-control" id="visit_date" name="visit_date"
                            value="{{ old('visit_date') }}" required>
                        @error('visit_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <label for="visit_time" class="form-label">Visit Time</label>
                        <input type="time" class="form-control" id="visit_time" name="visit_time"
                            value="{{ old('visit_time') }}" required>
                        @error('visit_time')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <label class="form-label">Purpose of Visit?</label><br>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="purpose" id="study"
                                value="Study Abroad Information"
                                {{ old('purpose') == 'Study Abroad Information' ? 'checked' : '' }}>
                            <label class="form-check-label" for="study">Study Abroad Information</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="purpose" id="language"
                                value="Language Class Inquiry"
                                {{ old('purpose') == 'Language Class Inquiry' ? 'checked' : '' }}>
                            <label class="form-check-label" for="language">Language Class Inquiry</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="purpose" id="documentation"
                                value="Documentation Support"
                                {{ old('purpose') == 'Documentation Support' ? 'checked' : '' }}>
                            <label class="form-check-label" for="documentation">Documentation Support</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="purpose" id="followup"
                                value="Follow-up Visit" {{ old('purpose') == 'Follow-up Visit' ? 'checked' : '' }}>
                            <label class="form-check-label" for="followup">Follow-up Visit</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="purpose" id="counseling"
                                value="Counseling Session" {{ old('purpose') == 'Counseling Session' ? 'checked' : '' }}>
                            <label class="form-check-label" for="counseling">Counseling Session</label>
                        </div>

                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="radio" name="purpose" id="otherPurpose"
                                value="Other" {{ old('purpose') == 'Other' ? 'checked' : '' }}>
                            <label class="form-check-label me-2" for="otherPurpose">Other:</label>
                            <input type="text" class="form-control" name="purpose_other"
                                placeholder="Specify if other" value="{{ old('purpose_other') }}">
                        </div>

                        @error('purpose')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 col-lg-6">
                        <label class="form-label">How did you get to know about us?</label><br>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="heard_about_us[]" id="social"
                                value="Social Media"
                                {{ is_array(old('heard_about_us')) && in_array('Social Media', old('heard_about_us')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="social">Social Media</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="heard_about_us[]" id="friends"
                                value="Friends/Family"
                                {{ is_array(old('heard_about_us')) && in_array('Friends/Family', old('heard_about_us')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="friends">Friends/Family</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="heard_about_us[]" id="ads"
                                value="Advertisement"
                                {{ is_array(old('heard_about_us')) && in_array('Advertisement', old('heard_about_us')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="ads">Advertisement</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="heard_about_us[]" id="others"
                                value="Others"
                                {{ is_array(old('heard_about_us')) && in_array('Others', old('heard_about_us')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="others">Others</label>
                        </div>

                        @error('heard_about_us')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>




                    <button type="submit" class="btn btn-sm btn-primary">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
