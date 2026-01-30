<div class="tab-pane fade" id="courses" role="tabpanel">
    {{-- Courses Section --}}
    <fieldset class="border p-3">
        <legend class="float-none w-auto legend-title">Course Section</legend>
        <div class="row">
            <div class="mb-4 col-md-6">
                <label for="courses_title" class="form-label">Course Title</label>
                <input type="text" class="form-control" id="courses_title" name="courses_title" placeholder="Course Title"
                    value="{{ $settings['courses_title'] }}" />
                @error('courses_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="courses_subtitle" class="form-label">Course Subtitle</label>
                <input type="text" class="form-control" id="courses_subtitle" name="courses_subtitle"
                    placeholder="Course Subtitle" value="{{ $settings['courses_subtitle'] }}" />
                @error('courses_subtitle')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="courses_button" class="form-label">Course Button Text</label>
                <input type="text" class="form-control" id="courses_button" name="courses_button"
                    placeholder="Course Button Text" value="{{ $settings['courses_button'] }}" />
                @error('courses_button')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-4 col-md-6">
                <label for="courses_link" class="form-label">Course Link</label>
                <input type="text" class="form-control" id="courses_link" name="courses_link" placeholder="Course Link"
                    value="{{ $settings['courses_link'] }}" />
                @error('courses_link')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-4">
                <label for="courses_description" class="form-label">Course Description</label>
                <textarea class="form-control" id="courses_description" name="courses_description" placeholder="Course Description"
                    rows="4">{{ $settings['courses_description'] }}</textarea>

                @error('courses_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="home_courses" class="form-label">Home courses</label>

                @php
                    $selectedcoursesIds = explode(',', $settings['home_courses']);
                @endphp

                <!--  choice js -->
                <select name="home_courses[]" id="home_courses" multiple>
                    @foreach ($courses as $Course)
                        <option value="{{ $Course->id }}" @if (in_array($Course->id, $selectedcoursesIds)) selected @endif>

                            {{ $Course->id }}-{{ $Course->title }}</option>
                    @endforeach
                </select>
                <!-- choices js -->

                @error('home_courses')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

        </div>
    </fieldset>
</div>
