<div class="tab-pane fade" id="aboutus" role="tabpanel">
    {{-- About Us Section --}}
    <fieldset class="border p-3">
        <legend class="float-none w-auto legend-title">About Us Section</legend>
        <div class="row">
            <div class="mb-4 col-md-6">
                <label for="aboutus_title" class="form-label">About Us Title</label>
                <input type="text" class="form-control" id="aboutus_title" name="aboutus_title"
                    placeholder="About Us Title" value="{{ $settings['aboutus_title'] }}" />
                @error('aboutus_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="aboutus_subtitle" class="form-label">About Us Subtitle</label>
                <input type="text" class="form-control" id="aboutus_subtitle" name="aboutus_subtitle"
                    placeholder="About Us Subtitle" value="{{ $settings['aboutus_subtitle'] }}" />
                @error('aboutus_subtitle')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="aboutus_button" class="form-label">About Us Button Text</label>
                <input type="text" class="form-control" id="aboutus_button" name="aboutus_button"
                    placeholder="About Us Button Text" value="{{ $settings['aboutus_button'] }}" />
                @error('aboutus_button')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-4 col-md-6">
                <label for="aboutus_link" class="form-label">About Us Link</label>
                <input type="text" class="form-control" id="aboutus_link" name="aboutus_link"
                    placeholder="About Us Link" value="{{ $settings['aboutus_link'] }}" />
                @error('aboutus_link')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-4">
                <label for="aboutus_description" class="form-label">About Us Description</label>
                <textarea class="form-control" id="aboutus_description" name="aboutus_description"
                    placeholder="About Us Description" rows="4">{{ $settings['aboutus_description'] }}</textarea>

                @error('aboutus_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

        </div>
    </fieldset>
</div>
