<div class="tab-pane fade" id="universities" role="tabpanel">
    {{-- Our universities Section --}}
    <fieldset class="border p-3">
        <legend class="float-none w-auto legend-title">Our Universities Section</legend>
        <div class="row">
            <div class="mb-4 col-md-6">
                <label for="universities_title" class="form-label">Our Universities Title</label>
                <input type="text" class="form-control" id="universities_title" name="universities_title"
                    placeholder="Our Universities Title" value="{{ $settings['universities_title'] }}" />
                @error('universities_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4 col-md-6">
                <label for="universities_subtitle" class="form-label">Our Universities Subtitle</label>
                <input type="text" class="form-control" id="universities_subtitle" name="universities_subtitle"
                    placeholder="Our Universities Subtitle" value="{{ $settings['universities_subtitle'] }}" />
                @error('universities_subtitle')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="universities_button" class="form-label">Our Universities Button Text</label>
                <input type="text" class="form-control" id="universities_button" name="universities_button"
                    placeholder="Our Universities Button Text" value="{{ $settings['universities_button'] }}" />
                @error('universities_button')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-4 col-md-6">
                <label for="universities_link" class="form-label">Our Universities Link</label>
                <input type="text" class="form-control" id="universities_link" name="universities_link"
                    placeholder="Our Universities Link" value="{{ $settings['universities_link'] }}" />
                @error('universities_link')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-4">
                <label for="universities_description" class="form-label">Our Universities Description</label>
                <textarea class="form-control" id="universities_description" name="universities_description"
                    placeholder="Our Universities Description" rows="4">{{ $settings['universities_description'] }}</textarea>

                @error('universities_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="home_universities" class="form-label">Home Universities</label>

                @php
                    $selectedUniversitiesIds = explode(',', $settings['home_universities']);
                @endphp

                <!-- choicejs -->
                <select name="home_universities[]" id="home_universities" multiple>
                    @foreach ($universities as $university)
                        <option value="{{ $university->id }}" @if (in_array($university->id, $selectedUniversitiesIds)) selected @endif>

                            {{ $university->id }}-{{ $university->title }}</option>
                    @endforeach
                </select>
                <!-- choicejs --> 

                @error('home_universities')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

        </div>
    </fieldset>
</div>
