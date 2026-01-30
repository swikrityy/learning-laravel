<div class="tab-pane fade" id="countries" role="tabpanel">
    {{-- Countries Section --}}
    <fieldset class="border p-3">
        <legend class="float-none w-auto legend-title">Country Section</legend>
        <div class="row">
            <div class="mb-4 col-md-6">
                <label for="countries_title" class="form-label">Country Title</label>
                <input type="text" class="form-control" id="countries_title" name="countries_title" placeholder="Country Title"
                    value="{{ $settings['countries_title'] }}" />
                @error('countries_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="countries_subtitle" class="form-label">Country Subtitle</label>
                <input type="text" class="form-control" id="countries_subtitle" name="countries_subtitle"
                    placeholder="Country Subtitle" value="{{ $settings['countries_subtitle'] }}" />
                @error('countries_subtitle')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="countries_button" class="form-label">Country Button Text</label>
                <input type="text" class="form-control" id="countries_button" name="countries_button"
                    placeholder="Country Button Text" value="{{ $settings['countries_button'] }}" />
                @error('countries_button')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-4 col-md-6">
                <label for="countries_link" class="form-label">Country Link</label>
                <input type="text" class="form-control" id="countries_link" name="countries_link" placeholder="Country Link"
                    value="{{ $settings['countries_link'] }}" />
                @error('countries_link')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-4">
                <label for="countries_description" class="form-label">Country Description</label>
                <textarea class="form-control" id="countries_description" name="countries_description" placeholder="Country Description"
                    rows="4">{{ $settings['countries_description'] }}</textarea>

                @error('countries_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="home_countries" class="form-label">Home countries</label>

                @php
                    $selectedcountriesIds = explode(',', $settings['home_countries']);
                @endphp

                <!--  choice js -->
                <select name="home_countries[]" id="home_countries" multiple>
                    @foreach ($countries as $Country)
                        <option value="{{ $Country->id }}" @if (in_array($Country->id, $selectedcountriesIds)) selected @endif>

                            {{ $Country->id }}-{{ $Country->title }}</option>
                    @endforeach
                </select>
                <!-- choices js -->

                @error('home_countries')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

        </div>
    </fieldset>
</div>
