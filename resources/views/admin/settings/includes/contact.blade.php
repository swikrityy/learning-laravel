<div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
    <fieldset class="border p-3">
        <legend class="float-none w-auto legend-title">Contact Us </legend>
        <div class="row">

            <div class="mb-4 col-md-6">
                <label for="contact_title" class="form-label">Contact Title</label>
                <input type="text" class="form-control" id="contact_title" name="contact_title"
                    placeholder="Contact Title" value="{{ $settings['contact_title'] }}" />
                @error('contact_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-4 col-md-6">
                <label for="contact_section_title" class="form-label">Contact Section Title</label>
                <input type="text" class="form-control" id="contact_section_title" name="contact_section_title"
                    placeholder="Contact Section Title" value="{{ $settings['contact_section_title'] }}" />
                @error('contact_section_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-4 col-md-12">
                <label for="contact_description" class="form-label">Contact Description</label>
                <textarea name="contact_description" rows="2" class="form-control br-8" placeholder="Contact Description">{{ $settings['contact_description'] }}</textarea>

                @error('contact_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="contact_location" class="form-label">Contact location</label>
                <input type="text" class="form-control" id="contact_location" name="contact_location"
                    placeholder="Contact Location" value="{{ $settings['contact_location'] }}" />
                @error('contact_location')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="contact_email" class="form-label">Contact email</label>
                <input type="text" class="form-control" id="contact_email" name="contact_email"
                    placeholder="Contact Email" value="{{ $settings['contact_email'] }}" />
                @error('contact_email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="contact_phone" class="form-label">Contact phone</label>
                <input type="text" class="form-control" id="contact_phone" name="contact_phone"
                    placeholder="Contact Phone" value="{{ $settings['contact_phone'] }}" />
                @error('contact_phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-4 col-md-6">
                <label for="contactform_title" class="form-label">Contact Form Title</label>
                <input type="text" class="form-control" id="contactform_title" name="contactform_title"
                    placeholder="Contact Form Title" value="{{ $settings['contactform_title'] }}" />
                @error('contactform_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

            {{-- <div class="mb-4 col-md-12">
                <label for="contactform_description" class="form-label">Contact Form Description</label>
                <textarea name="contactform_description" rows="2" class="form-control br-8"
                    placeholder="Contact Form Description">{{ $settings['contactform_description'] }}</textarea>

                @error('contactform_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

        </div>
    </fieldset>

</div>
