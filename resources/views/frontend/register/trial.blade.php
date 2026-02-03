@extends('frontend.layout.master')
<style>
    label {
        padding-bottom: .5rem;
    }
</style>
@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-20 sm:mt-10 font-openSans mb-10">
        <h2 class="text-2xl font-bold mb-6 text-heading text-center ">
            Registration Form
        </h2>
        <form id="enquiryForm" method="POST" action="{{ route('studentenquiry') }}" enctype="multipart/form-data">
            @csrf
            <!-- Basic Info -->
            <div class="mb-6">
                <h3 class="text-xl  font-semibold mb-4 text-heading">
                    Basic Info
                </h3>
                <small class="text-primary">Note: All fields marked with * are required</small>
                <hr class=" border-secondary pb-2">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-textcolor">Full Name <span class="text-primary"> * </span></label>
                        <input
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="full_name" type="text" name="full_name" value="{{ old('full_name') }}" />
                        @error('full_name')
                            <small class="text-primary">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-textcolor">Date of Birth <span class="text-primary"> * </span></label>
                        <input
                            class="w-full flatpicker px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="dob" type="text" name="dob" placeholder="dd-mm-yyyy"
                            value="{{ old('dob') }}" />
                        @error('dob')
                            <small class="text-primary">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <!-- Academic Qualification -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-4 text-heading">
                    Academic Qualification
                </h3>
                <hr class=" border-secondary pb-2">
                <div>
                    <label class="block text-textcolor">Latest Qualification <span class="text-primary"> * </span></label>
                    <select class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                        id="qualification" id="qualification" name="qualification" onchange="updateAcademicFields()">
                        <option value="" disabled selected>Select qualification</option>
                        <option value="see">SEE</option>
                        <option value="+2">+2</option>
                        <option value="bachelor">Bachelor</option>
                        <option value="master">Master</option>
                    </select>
                    @error('qualification')
                        <small class="text-primary">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mt-4" id="see-info" style="display: none">
                    <h4 class="text-lg font-semibold text-gray-600">SEE Information</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-textcolor">College Name</label>
                            <input
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                id="see_college_name" type="text" name="see_college_name" />
                        </div>
                        <div>
                            <label class="block text-textcolor">GPA</label>
                            <input
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                id="see_gpa" type="text" name="see_gpa" placeholder="eg : 3.0" />
                        </div>
                        <div>
                            <label class="block text-textcolor">Passed Year</label>
                            <input
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                id="see_passed_year" type="text" name="see_passed_year" />
                        </div>
                    </div>
                </div>

                <div class="mt-4" id="+2-info" style="display: none">
                    <h4 class="text-lg font-semibold text-gray-600">+2 Information</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-textcolor">College Name</label>
                            <input
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                id="+2_college_name" type="text" name="+2_college_name" />
                        </div>
                        <div>
                            <label class="block text-textcolor">GPA</label>
                            <input
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                id="+2_gpa" type="text" name="+2_gpa" placeholder="eg : 3.0" />
                        </div>
                        <div>
                            <label class="block text-textcolor">Passed Year</label>
                            <input
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                id="+2_passed_year" type="text" name="+2_passed_year" />
                        </div>
                    </div>
                </div>

                <div class="mt-4" id="bachelor-info" style="display: none">
                    <h4 class="text-lg font-semibold text-gray-600">Bachelor Information</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-textcolor">College Name</label>
                            <input
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                id="bachelor_college_name" type="text" name="bachelor_college_name" />
                        </div>
                        <div>
                            <label class="block text-textcolor">GPA</label>
                            <input
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                id="bachelor_gpa" type="text" name="bachelor_gpa" placeholder="eg : 3.0" />
                        </div>
                        <div>
                            <label class="block text-textcolor">Passed Year</label>
                            <input
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                id="bachelor_passed_year" type="text" name="bachelor_passed_year" />
                        </div>
                    </div>
                </div>

                <div class="mt-4" id="master-info" style="display: none">
                    <h4 class="text-lg font-semibold text-gray-600">Master Information</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-textcolor">College Name</label>
                            <input
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                id="master_college_name" type="text" name="master_college_name" />
                        </div>
                        <div>
                            <label class="block text-textcolor">GPA</label>
                            <input
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                id="master_gpa" type="text" name="master_gpa" placeholder="eg : 3.0" />
                        </div>
                        <div>
                            <label class="block text-textcolor">Passed Year</label>
                            <input
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                id="master_passed_year" type="text" name="master_passed_year" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-4 text-heading">
                    Additional Info
                </h3>
                <hr class="border-secondary pb-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-textcolor">Marital Status <span class="text-primary"> * </span></label>
                        <select
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="marital_status" name="marital_status">
                            <option value="unmarried">Unmarried</option>
                            <option value="married">Married</option>
                        </select>
                        @error('marital_status')
                            <small class="text-primary">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-textcolor">Address <span class="text-primary"> * </span></label>
                        <input
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="address" type="text" name="address" value="{{ old('address') }}" />
                        @error('address')
                            <small class="text-primary">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-5">
                    <div>
                        <label class="block text-textcolor">Mobile <span class="text-primary"> * </span></label>
                        <input
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="mobile" type="text" name="mobile" value="{{ old('mobile') }}" />
                        @error('mobile')
                            <small class="text-primary">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-textcolor">Email <span class="text-primary"> * </span></label>
                        <input
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="email" type="email" name="email" value="{{ old('email') }}" />
                        @error('email')
                            <small class="text-primary">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-textcolor" for="phone2">Secondary contact (optional)</label>
                        <input
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            type="text" name="phone2" />
                    </div>

                </div>

            </div>

            {{-- guardian details --}}
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-4 text-heading">
                    Guardian Info
                </h3>
                <hr class="border-secondary pb-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-textcolor">Parents/Gaurdian name <span class="text-primary"> *
                            </span></label>
                        <input
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="parents_name" type="text" name="parents_name" value="{{ old('parents_name') }}" />
                        @error('parents_name')
                            <small class="text-primary">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-textcolor" for="g_address">Address <span class="text-primary"> *
                            </span></label>
                        <input
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="g_address" type="text" name="g_address" value="{{ old('g_address') }}" />
                        @error('g_address')
                            <small class="text-primary">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-5">
                    <div>
                        <label class="block text-textcolor" for="g_name">Mobile <span class="text-primary"> *
                            </span></label>
                        <input
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="g_mobile" type="text" name="g_mobile" value="{{ old('g_mobile') }}" />
                        @error('g_mobile')
                            <small class="text-primary">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-textcolor">Email</label>
                        <input
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="g_email" type="email" name="g_email" value="{{ old('g_email') }}" />
                        @error('g_email')
                            <small class="text-primary">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

            </div>
            <!-- Other Details -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-4 text-heading">
                    Other Details
                </h3>
                <hr class=" border-secondary pb-2">
                <div>
                    <label class="block text-textcolor">Which country you want to apply? <span class="text-primary"> *
                        </span></label>
                    <select
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                        id="preferred_country" name="preferred_country">
                        <option value="UK">UK</option>
                        <option value="USA">USA</option>
                        <option value="Australia">Australia</option>
                        <option value="Canada">Canada</option>
                        <option value="New Zealand">New Zealand</option>
                    </select>
                    @error('preferred_country')
                        <small class="text-primary">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="block text-textcolor">Have you taken any Language Proficiency Test? <span
                            class="text-primary"> * </span></label>
                    <select
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                        id="language_test" name="language_test" onchange="toggleLanguageTestFields()">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                    @error('language_test')
                        <small class="text-primary">{{ $message }}</small>
                    @enderror
                </div>

                <div class="grid grid-cols-2" id="language-test-details" style="display: none">
                    <div class="mt-4">
                        <label class="block text-textcolor">Test Type <span class="text-primary"> * </span></label>
                        <select
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="test_type" name="test_type" onchange="toggleTestScoreField()">
                            <option value="">Select test type</option>
                            <option value="IELTS">IELTS</option>
                            <option value="TOFEL">Duolingo</option>
                            <option value="TOFEL">UET</option>
                            <option value="TOFEL">SAT</option>
                            <option value="GRE">GRE</option>
                        </select>
                        @error('test_type')
                            <small class="text-primary">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-4" id="test_score_field" style="display: none">
                        <label class="block text-textcolor">Test Score <span class="text-primary"> * </span></label>
                        <input
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="test_score" type="text" name="test_score" />
                    </div>
                </div>
            </div>

            <div class="mb-6">

                <hr class=" border-secondary pb-2">
                <div>
                    <label class="block text-textcolor">Have you choosen any educational institution? <span
                            class="text-primary"> * </span></label>
                    <select
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                        id="previous_education" name="previous_education" onchange="togglePreviousEducationFields()">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                    @error('previous_education')
                        <small class="text-primary">{{ $message }}</small>
                    @enderror
                </div>

                <div id="previous_education_details" style="display: none">
                    <div class="mt-4">
                        <label class="block text-textcolor">Institution Name <span class="text-primary"> * </span></label>
                        <input
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            id="previous_institution_name" type="text" name="previous_institution_name" />
                    </div>
                </div>
            </div>
            <!-- How did you get to know about us -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-4 text-heading">
                    How did you get to know about us? <span class="text-primary"> * </span>
                </h3>
                <div>
                    <div class="flex flex-wrap items-center mt-2">
                        <input class="mr-2" id="social_media" type="checkbox" name="source[]" value="social_media" />
                        <label class="mr-4" for="social_media">Social Media</label>
                        <input class="mr-2" id="friends_family" type="checkbox" name="source[]"
                            value="friends_family" />
                        <label class="mr-4" for="friends_family">Friends/Family</label>
                        <input class="mr-2" id="advertisement" type="checkbox" name="source[]"
                            value="advertisement" />
                        <label class="mr-4" for="advertisement">Advertisement</label>
                        <input class="mr-2" id="others" type="checkbox" name="source[]" value="others" />
                        <label for="others">Others</label>
                    </div>
                    @error('source')
                        <small class="text-primary">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="block text-heading">Message</label>
                    <textarea class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                        name="message" placeholder="Message"></textarea>
                </div>
            </div>
            <div class="my-6">
                <button class="custom-btn btn-7" type="submit">
                    Register
                </button>
            </div>
        </form>
    </div>

    <script>
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
            const previousEducation = document.getElementById('previous_education').value;
            const previousEducationDetails = document.getElementById('previous_education_details');
            if (previousEducation === 'yes') {
                previousEducationDetails.style.display = 'block';
            } else {
                previousEducationDetails.style.display = 'none';
            }
        }
    </script>
@endsection
