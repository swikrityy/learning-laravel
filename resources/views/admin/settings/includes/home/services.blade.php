<div class="tab-pane fade" id="services" role="tabpanel">
    {{-- Our Services Section --}}
    <fieldset class="border p-3">
        <legend class="float-none w-auto legend-title">Our Services Section</legend>
        <div class="row">
            <div class="mb-4 col-md-6">
                <label for="services_title" class="form-label">Our Services Title</label>
                <input type="text" class="form-control" id="services_title" name="services_title"
                    placeholder="Our Services Title" value="{{ $settings['services_title'] }}" />
                @error('services_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="services_subtitle" class="form-label">Our Services Subtitle</label>
                <input type="text" class="form-control" id="services_subtitle" name="services_subtitle"
                    placeholder="Our Services Subtitle" value="{{ $settings['services_subtitle'] }}" />
                @error('services_subtitle')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="services_button" class="form-label">Our Services Button Text</label>
                <input type="text" class="form-control" id="services_button" name="services_button"
                    placeholder="Our Services Button Text" value="{{ $settings['services_button'] }}" />
                @error('services_button')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-4 col-md-6">
                <label for="services_link" class="form-label">Our Services Link</label>
                <input type="text" class="form-control" id="services_link" name="services_link"
                    placeholder="Our Services Link" value="{{ $settings['services_link'] }}" />
                @error('services_link')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-4">
                <label for="services_description" class="form-label">Our Services Description</label>
                <textarea class="form-control" id="services_description" name="services_description"
                    placeholder="Our Services Description" rows="4">{{ $settings['services_description'] }}</textarea>

                @error('services_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="home_services" class="form-label">Home services</label>

                @php
                    $selectedServicesIds = explode(',', $settings['home_services']);
                @endphp

                <!-- choicejs -->
                <select name="home_services[]" id="home_services" multiple>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" @if (in_array($service->id, $selectedServicesIds)) selected @endif>

                            {{ $service->id }}-{{ $service->title }}</option>
                    @endforeach
                </select>
                <!-- choicejs --> 

                @error('home_services')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

        </div>
    </fieldset>
</div>
