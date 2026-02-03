@extends('layouts.frontend.master')
@section('seo')
    @include('frontend.seo', [
    'name' => $register_banner->seo_title ?? '',
    'title' => $register_banner->seo_title ?? $register_banner->title,
    'description' => $register_banner->meta_description ?? '',
    'keyword' => $register_banner->meta_keywords ?? '',
    'schema' => $register_banner->seo_schema ?? '',
    'created_at' => $register_banner->created_at,
    'updated_at' => $register_banner->updated_at,
])
<style>
        #academic-section {
        display: none;
    }
</style>
@endsection
@section('content')
        @if ($register_banner)
            <div class="hero-banner2 position-relative ">
                <div class="row g-0 text-bannner-section">
                    <div class="col-md-6 d-flex justify-content-center align-items-center py-5">
                        <div class="text-center page-banner-lft px-4">
                            <h1 class="text-white font-weight-bold">{{ $register_banner->title ?? 'About Us' }}</h1>
                            <p class="breadcrumb-text text-white">
                                <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a> /
                                <a href="{{ route('frontend.service') }}"
                                    class="text-white text-decoration-none">{{ $register_banner->title ?? 'About Us' }}</a>
                            </p>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-container-banner">
                            <div class="img-wrapper-2">
                                <img src="{{ asset($register_banner->banner_image) }}" alt="Creative Design"
                                    class="background-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="container mt-5 mb-5 shadow rounded p-4">
            <div class="heading-css mb-4">
                <h3 class="text-center">Registration<span class="px-2">Form</span></h3>
            </div>
            <form id="enquiryForm" method="POST" action="{{ route('frontend.register.submit') }}" enctype="multipart/form-data"
                class="">
                @csrf
                <!-- Basic Info -->
                <div class="mb-4">
                    <hr class="border-secondary mb-2">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <label class="form-label text-textcolor">Purpose of visit <i class="ri-asterisk astrik"></i></label>
                            <select class="form-control" id="purpose" name="purpose_of_visit">
                                        <option value="" disabled selected>Select Purpose of Visit</option>
                                        <option value="visitor" >Visitor</option>
                                        <option value="student">Student</option>
                            </select>
                            @error('purpose_of_visit')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- <div class="col-md-4">
                            <label class="form-label text-textcolor">Date of Birth <i class="ri-asterisk astrik"></i></label>
                            <input class="form-control flatpicker" id="dob" type="date" name="dob"
                                placeholder="dd-mm-yyyy" value="{{ old('dob') }}" />
                            @error('dob')
                                <small class="text-primary">{{ $message }}</small>
                            @enderror
                        </div> --}}
                    </div>
                </div>
                <div class="mb-4">
                    <div class="row row-align">
                        <div class="form-group col-md-4">
                            <label class="form-label text-textcolor">Full Name<i class="ri-asterisk astrik"></i></label>
                            <input class="form-control" id="full_name" type="text" name="full_name"
                                value="{{ old('full_name') }}" />
                            @error('full_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    <div class="form-group col-md-4">
                            <label for="mobile" class="text-textcolor">Mobile <i class="ri-asterisk astrik"></i></label>
                            <input class="form-control" id="mobile" type="text" name="mobile"
                                value="{{ old('mobile') }}" />
                            @error('mobile')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                    </div>
                     <div class="form-group col-md-4">
                            <label for="address" class="text-textcolor">Address <i class="ri-asterisk astrik"></i></label>
                            <input class="form-control" id="address" type="text" name="address"
                                value="{{ old('address') }}" />
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                    </div>
                    </div>

                </div>

                <!-- Academic Qualification -->
                <div class="mb-4" id="academic-section">
                    <h3 class="h5 font-weight-bold mb-3 text-dark">
                        Academic Qualification
                    </h3>
                    <hr class="border-secondary mb-2">

                    <div class="form-group">
                        <label for="qualification" class="text-textcolor">Latest Qualification <i
                                class="ri-asterisk astrik"></i></label>
                        <select class="form-control" id="qualification" name="qualification" onchange="updateAcademicFields()">
                            <option value="" disabled selected>Select qualification</option>
                            <option value="see">SEE</option>
                            <option value="+2">+2</option>
                            <option value="bachelor">Bachelor</option>
                            <option value="master">Master</option>
                        </select>
                        @error('qualification')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mt-4 " id="see-info" style="display: none">
                        <h4 class="h6 font-weight-semibold text-secondary">SEE Information</h4>
                        <div class="form row">
                            <div class="form-group col-md-4">
                                <label for="see_college_name" class="text-textcolor">College Name</label>
                                <input class="form-control" id="see_college_name" type="text" name="see_college_name" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="see_gpa" class="text-textcolor">GPA</label>
                                <input class="form-control" id="see_gpa" type="text" name="see_gpa"
                                    placeholder="eg : 3.0" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="see_passed_year" class="text-textcolor">Passed Year</label>
                                <input class="form-control" id="see_passed_year" type="text" name="see_passed_year" />
                            </div>
                        </div>
                    </div>

                    <div class="mt-4" id="+2-info" style="display: none">
                        <h4 class="h6 font-weight-semibold text-secondary">+2 Information</h4>
                        <div class="form row">
                            <div class="form-group col-md-4">
                                <label for="plus_two_college_name" class="text-textcolor">College Name</label>
                                <input class="form-control" id="plus_two_college_name" type="text"
                                    name="plus_two_college_name" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="plus_two_gpa" class="text-textcolor">GPA</label>
                                <input class="form-control " id="plus_two_gpa" type="text" name="plus_two_gpa"
                                    placeholder="eg : 3.0" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="plus_two_passed_year" class="text-textcolor">Passed Year</label>
                                <input class="form-control" id="plus_two_passed_year" type="text"
                                    name="plus_two_passed_year" />
                            </div>
                        </div>
                    </div>

                    <div class="mt-4" id="bachelor-info" style="display: none">
                        <h4 class="h6 font-weight-semibold text-secondary">Bachelor Information</h4>
                        <div class="form row">
                            <div class="form-group col-md-4">
                                <label for="bachelor_college_name" class="text-textcolor">College Name</label>
                                <input class="form-control" id="bachelor_college_name" type="text"
                                    name="bachelor_college_name" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bachelor_gpa" class="text-textcolor">GPA</label>
                                <input class="form-control" id="bachelor_gpa" type="text" name="bachelor_gpa"
                                    placeholder="eg : 3.0" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bachelor_passed_year" class="text-textcolor">Passed Year</label>
                                <input class="form-control" id="bachelor_passed_year" type="text"
                                    name="bachelor_passed_year" />
                            </div>
                        </div>
                    </div>

                    <div class="mt-4" id="master-info" style="display: none">
                        <h4 class="h6 font-weight-semibold text-secondary">Master Information</h4>
                        <div class="form row">
                            <div class="form-group col-md-4">
                                <label for="master_college_name" class="text-textcolor">College Name</label>
                                <input class="form-control" id="master_college_name" type="text"
                                    name="master_college_name" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="master_gpa" class="text-textcolor">GPA</label>
                                <input class="form-control" id="master_gpa" type="text" name="master_gpa"
                                    placeholder="eg : 3.0" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="master_passed_year" class="text-textcolor">Passed Year</label>
                                <input class="form-control" id="master_passed_year" type="text"
                                    name="master_passed_year" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Additional Info -->
                <div class="mb-4" id="additionalinfo">
                    <h3 class="h5 font-weight-bold mb-3 text-dark">
                        Additional Info
                    </h3>
                    <hr class="border-secondary mb-2">
                    <div class="form row">
                        <div class="form-group col-md-6">
                            <label for="marital_status" class="text-textcolor">Marital Status <i
                                    class="ri-asterisk astrik"></i></label>
                            <select class="form-control" id="marital_status" name="marital_status">
                                <option value="unmarried">Unmarried</option>
                                <option value="married">Married</option>
                            </select>
                            @error('marital_status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-md-6">
                            <label for="address" class="text-textcolor">Address <i class="ri-asterisk astrik"></i></label>
                            <input class="form-control" id="address" type="text" name="address"
                                value="{{ old('address') }}" />
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                    </div>
                    <div class="form row mt-3">
                        {{-- <div class="form-group col-md-4">
                            <label for="mobile" class="text-textcolor">Mobile <i class="ri-asterisk astrik"></i></label>
                            <input class="form-control" id="mobile" type="text" name="mobile"
                                value="{{ old('mobile') }}" />
                            @error('mobile')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                        <div class="form-group col-md-6">
                            <label for="email" class="text-textcolor">Email <i class="ri-asterisk astrik"></i></label>
                            <input class="form-control" id="email" type="email" name="email"
                                value="{{ old('email') }}" />
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone2" class="text-textcolor">Secondary contact (optional)</label>
                            <input class="form-control" id="phone2" type="text" name="phone2" />
                        </div>
                    </div>
                </div>
                {{-- guardian details --}}
                <div class="mb-4" id="guardianinfo">
                    <h3 class="h5 font-weight-bold mb-3 text-dark">
                        Guardian Info
                    </h3>
                    <hr class="border-secondary mb-2">
                    <div class="form row">
                        <div class="form-group col-md-6">
                            <label for="parents_name" class="text-textcolor">Parents/Guardian Name <i
                                    class="ri-asterisk astrik"></i></label>
                            <input class="form-control" id="parents_name" type="text" name="parents_name"
                                value="{{ old('parents_name') }}" />
                            @error('parents_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="g_address" class="text-textcolor">Address <i class="ri-asterisk astrik"></i></label>
                            <input class="form-control" id="g_address" type="text" name="g_address"
                                value="{{ old('g_address') }}" />
                            @error('g_address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form row mt-3">
                        <div class="form-group col-md-4">
                            <label for="g_mobile" class="text-textcolor">Mobile <i class="ri-asterisk astrik"></i></label>
                            <input class="form-control" id="g_mobile" type="text" name="g_mobile"
                                value="{{ old('g_mobile') }}" />
                            @error('g_mobile')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="g_email" class="text-textcolor">Email</label>
                            <input class="form-control" id="g_email" type="email" name="g_email"
                                value="{{ old('g_email') }}" />
                            @error('g_email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- Other Details -->
                <div class="mb-4" id="otherdetails">
                    <h3 class="h5 font-weight-bold mb-3 text-dark">
                        Other Details
                    </h3>
                    <hr class="border-secondary mb-2">
                    <div class="form-group">
                        <label for="preferred_country" class="text-textcolor">Which country do you want to apply? <span
                                class="text-primary"> <i class="ri-asterisk astrik"></i> </span></label>
                        <select class="form-control" id="preferred_country" name="preferred_country">
                            <option value="UK">UK</option>
                            <option value="USA">USA</option>
                            <option value="Australia">Australia</option>
                            <option value="Canada">Canada</option>
                            <option value="New Zealand">New Zealand</option>
                        </select>
                        @error('preferred_country')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="language_test" class="text-textcolor">Have you taken any Language Proficiency Test? <span
                                class="text-primary"> <i class="ri-asterisk astrik"></i></span></label>
                        <select class="form-control" id="language_test" name="language_test"
                            onchange="toggleLanguageTestFields()">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                        @error('language_test')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-row" id="language-test-details" style="display: none">
                        <div class="form-group col-md-6">
                            <label for="test_type" class="text-textcolor">Test Type <span class="text-primary"> <i
                                        class="ri-asterisk astrik"></i> </span></label>
                            <select class="form-control" id="test_type" name="test_type" onchange="toggleTestScoreField()">
                                <option value="">Select test type</option>
                                <option value="IELTS">IELTS</option>
                                <option value="Duolingo">Duolingo</option>
                                <option value="UET">UET</option>
                                <option value="SAT">SAT</option>
                                <option value="GRE">GRE</option>
                            </select>
                            @error('test_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6" id="test_score_field" style="display: none">
                            <label for="test_score" class="text-textcolor">Test Score <i
                                    class="ri-asterisk astrik"></i></label>
                            <input class="form-control" id="test_score" type="text" name="test_score" />
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <hr class="border-secondary mb-2">
                    <div class="form-group" id="educationalinst">
                        <label for="preferred_education" class="text-textcolor">Have you chosen any educational institution?
                            <i class="ri-asterisk astrik"></i></label>
                        <select class="form-control" id="preferred_education" name="preferred_education"
                            onchange="togglePreviousEducationFields()">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                        @error('preferred_education')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div id="preferred_education_details" style="display: none">
                        <div class="form-group">
                            <label for="preferred_institution_name" class="text-textcolor">Institution Name <i
                                    class="ri-asterisk astrik"></i></label>
                            <input class="form-control" id="preferred_institution_name" type="text"
                                name="preferred_institution_name" />
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="h5 font-weight-bold mb-3 text-dark">
                        How did you get to know about us? <i class="ri-asterisk astrik"></i>
                    </h3>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" id="social_media" type="checkbox" name="source[]"
                                value="social_media" />
                            <label class="form-check-label" for="social_media">Social Media</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="friends_family" type="checkbox" name="source[]"
                                value="friends_family" />
                            <label class="form-check-label" for="friends_family">Friends/Family</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="advertisement" type="checkbox" name="source[]"
                                value="advertisement" />
                            <label class="form-check-label" for="advertisement">Advertisement</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="others" type="checkbox" name="source[]"
                                value="others" />
                            <label class="form-check-label" for="others">Others</label>
                        </div>
                        @error('source')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="message" class="text-heading">Message</label>
                        <textarea class="form-control" id="message" name="message" placeholder="Message"></textarea>
                        @error('message')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{-- <div class="mb-4">
                    <div class="mb-4">
                        <label for="images" class="form-label">Upload Document Images</label>
                        <input class="form-control" type="file" id="images" name="images[]" multiple
                            accept="image/*">
                    </div>
                </div> --}}
                <div class="my-6">
                    <a href="">
                        <button class="custom-btn btn-8"><span>Register <i
                                    class="ri-arrow-right-up-line"></i></span></button>
                    </a>
                </div>
            </form>
        </div>
        <script>
        const academicSec = document.getElementById('academic-section');
        const additionalinfo = document.getElementById('additionalinfo');
        const guardianinfo = document.getElementById('guardianinfo');
        const otherdetails = document.getElementById('otherdetails');
        const educationalinst = document.getElementById('educationalinst');
        additionalinfo.style.display = 'none';
        guardianinfo.style.display = 'none';
        otherdetails.style.display = 'none';
        educationalinst.style.display = 'none';
        document.getElementById('purpose').addEventListener('change', function () {
        if (this.value === 'student') {
            academicSec.style.display = 'block';   // show
            additionalinfo.style.display = 'block';
            guardianinfo.style.display = 'block';
            otherdetails.style.display = 'block';
            educationalinst.style.display = 'block';
        } else {
            academicSec.style.display = 'none';
            additionalinfo.style.display = 'none';
            guardianinfo.style.display = 'none';
            otherdetails.style.display = 'none';
            educationalinst.style.display = 'none';
                // hide
        }
    });
            function updateAcademicFields() {
                const qualification = document.getElementById('qualification').value;
                const seeInfo = document.getElementById('see-info');
                const plusTwoInfo = document.getElementById('+2-info');
                const bachelorInfo = document.getElementById('bachelor-info');
                const masterInfo = document.getElementById('master-info');
                // Hide all fields initially
                seeInfo.style.display = 'none';
                plusTwoInfo.style.display = 'none';
                bachelorInfo.style.display = 'none';
                masterInfo.style.display = 'none';

                // Show relevant fields based on selected qualification
                if (qualification === 'see') {
                    seeInfo.style.display = 'block';
                } else if (qualification === '+2') {
                    seeInfo.style.display = 'block';
                    plusTwoInfo.style.display = 'block';
                } else if (qualification === 'bachelor') {
                    seeInfo.style.display = 'block';
                    plusTwoInfo.style.display = 'block';
                    bachelorInfo.style.display = 'block';
                } else if (qualification === 'master') {
                    seeInfo.style.display = 'block';
                    plusTwoInfo.style.display = 'block';
                    bachelorInfo.style.display = 'block';
                    masterInfo.style.display = 'block';
                }
            }
            function toggleLanguageTestFields() {
                const languageTest = document.getElementById('language_test').value;
                const languageTestDetails = document.getElementById('language-test-details');
                if (languageTest === 'yes') {
                    languageTestDetails.style.display = 'block';
                } else {
                    languageTestDetails.style.display = 'none';
                    document.getElementById('test_type').value = '';
                    document.getElementById('test_score_field').style.display = 'none';
                }
            }

            function toggleTestScoreField() {
                const testType = document.getElementById('test_type').value;
                const testScoreField = document.getElementById('test_score_field');
                if (testType) {
                    testScoreField.style.display = 'block';
                } else {
                    testScoreField.style.display = 'none';
                }
            }
            function togglePreviousEducationFields() {
                const previousEducation = document.getElementById('preferred_education').value;
                const previousEducationDetails = document.getElementById('preferred_education_details');
                if (previousEducation === 'yes') {
                    previousEducationDetails.style.display = 'block';
                } else {
                    previousEducationDetails.style.display = 'none';
                }
            }
        </script>
     @if(session('success'))
     <script>
         document.addEventListener('DOMContentLoaded', function() {
             Toastify({
                 text: "{{ session('success') }}",
                 duration: 3000,
                 gravity: "top", // top or bottom
                 position: "right", // left, center or right
                 backgroundColor: "#4BB543",
                 stopOnFocus: true,
             }).showToast();
         });
     </script>
     @endif
@endsection
