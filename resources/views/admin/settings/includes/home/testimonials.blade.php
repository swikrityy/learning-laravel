<div class="tab-pane fade" id="testimonials" role="tabpanel">
    {{-- Testimonial Section --}}
    <fieldset class="border p-3">
        <legend class="float-none w-auto legend-title">Testimonial Section</legend>
        <div class="row">
            <div class="mb-4 col-md-6">
                <label for="testioninal_title" class="form-label">Testimonial Title</label>
                <input type="text" class="form-control" id="testioninal_title" name="testioninal_title"
                    placeholder="Testimonial Title" value="{{ $settings['testioninal_title'] }}" />
                @error('testioninal_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="testioninal_subtitle" class="form-label">Testimonial Subtitle</label>
                <input type="text" class="form-control" id="testioninal_subtitle" name="testioninal_subtitle"
                    placeholder="Testimonial Subtitle" value="{{ $settings['testioninal_subtitle'] }}" />
                @error('testioninal_subtitle')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="testioninal_average_rating" class="form-label">Testimonial Average Rating</label>
                <input type="text" class="form-control" id="testioninal_average_rating"
                    name="testioninal_average_rating" placeholder="Testimonial Subtitle"
                    value="{{ $settings['testioninal_average_rating'] ?? 5 }}" />
                @error('testioninal_average_rating')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="testioninal_button" class="form-label">Testimonial Button Text</label>
                <input type="text" class="form-control" id="testioninal_button" name="testioninal_button"
                    placeholder="Testimonial Button Text" value="{{ $settings['testioninal_button'] }}" />
                @error('testioninal_button')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-4 col-md-6">
                <label for="testioninal_link" class="form-label">Testimonial Link</label>
                <input type="text" class="form-control" id="testioninal_link" name="testioninal_link"
                    placeholder="Testimonial Link" value="{{ $settings['testioninal_link'] }}" />
                @error('testioninal_link')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-4">
                <label for="testioninal_description" class="form-label">Testimonial Description</label>
                <textarea class="form-control" id="testioninal_description" name="testioninal_description"
                    placeholder="Testimonial Description" rows="4">{{ $settings['testioninal_description'] }}</textarea>

                @error('testioninal_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="home_testioninals" class="form-label">Home Testimonials</label>

                @php
                    $selectedTestimonialsIds = explode(',', $settings['home_testioninals']);
                @endphp

                <!--choicejs -->
                <select name="home_testioninals[]" id="home_testioninals" multiple>
                    @foreach ($testimonials as $testimonial)
                        <option value="{{ $testimonial->id }}" @if (in_array($testimonial->id, $selectedTestimonialsIds)) selected @endif>

                            {{ $testimonial->id }}-{{ $testimonial->name }}</option>
                    @endforeach
                </select>
                <!--choices js  -->

                @error('home_testioninals')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

        </div>
    </fieldset>
</div>
