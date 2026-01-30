<div class="tab-pane fade" id="counter" role="tabpanel">
    {{-- About Us Section --}}
    <fieldset class="border p-3">
        <legend class="float-none w-auto legend-title">Counter Section</legend>
        <div class="row">

            <div class="col-md-6 col-lg-4">
                <div class="mb-2">
                    <label for="home_counter_students_title" class="form-label">Students Assisted Title </label>
                    <input type="text" class="form-control" id="home_counter_students_title"
                        name="home_counter_students_title"
                        value="{{ $settings['home_counter_students_title'] ?? '' }}" />
                </div>

                <div class="mb-2">
                    <label for="home_counter_students" class="form-label">No. of Students Assisted</label>
                    <input type="text" id="home_counter_students" name="home_counter_students" class="form-control"
                        value="{{ $settings['home_counter_students'] ?? '' }}" />
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="mb-2">
                    <label for="home_counter_scholarship_title" class="form-label">Scholarship Approved Title </label>
                    <input type="text" class="form-control" id="home_counter_scholarship_title"
                        name="home_counter_scholarship_title"
                        value="{{ $settings['home_counter_scholarship_title'] ?? '' }}" />
                </div>

                <div class="mb-2">
                    <label for="home_counter_scholarship" class="form-label">No. of Scholarship Approved</label>
                    <input type="text" id="home_counter_scholarship" name="home_counter_scholarship"
                        class="form-control" value="{{ $settings['home_counter_scholarship'] ?? '' }}" />
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="mb-2">
                    <label for="home_counter_enrolled_title" class="form-label">Enrolled Students Title </label>
                    <input type="text" class="form-control" id="home_counter_enrolled_title"
                        name="home_counter_enrolled_title"
                        value="{{ $settings['home_counter_enrolled_title'] ?? '' }}" />
                </div>

                <div class="mb-2">
                    <label for="home_counter_enrolled" class="form-label">No. of Enrolled Students</label>
                    <input type="text" id="home_counter_enrolled" name="home_counter_enrolled"
                        class="form-control" value="{{ $settings['home_counter_enrolled'] ?? '' }}" />
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="mb-2">
                    <label for="home_counter_affilated_title" class="form-label">Affilated College Title </label>
                    <input type="text" class="form-control" id="home_counter_affilated_title"
                        name="home_counter_affilated_title"
                        value="{{ $settings['home_counter_affilated_title'] ?? '' }}" />
                </div>

                <div class="mb-2">
                    <label for="home_counter_affilated" class="form-label">No. of Affilated College</label>
                    <input type="text" id="home_counter_affilated" name="home_counter_affilated"
                        class="form-control" value="{{ $settings['home_counter_affilated'] ?? '' }}" />
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group mb-3">
                    <label for="home_counter_scholarship_img">home_counter_scholarship_img</label>
                    <div class="custom-file">
                        <input type="file" name="home_counter_scholarship_img" class="home_counter_scholarship_img dropify" id="home_counter_scholarship_img"
                            data-show-remove="false" data-default-file="{{ $settings['home_counter_scholarship_img'] }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="home_counter_enrolled_img">home_counter_enrolled_img</label>
                    <div class="custom-file">
                        <input type="file" name="home_counter_enrolled_img" class="home_counter_enrolled_img dropify" id="home_counter_enrolled_img"
                            data-show-remove="false" data-default-file="{{ $settings['home_counter_enrolled_img'] }}">
                    </div>
                </div>
            </div>  <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="home_counter_students_img">home_counter_students_img</label>
                    <div class="custom-file">
                        <input type="file" name="home_counter_students_img" class="home_counter_students_img dropify" id="home_counter_students_img"
                            data-show-remove="false" data-default-file="{{ $settings['home_counter_students_img'] }}">
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</div>
