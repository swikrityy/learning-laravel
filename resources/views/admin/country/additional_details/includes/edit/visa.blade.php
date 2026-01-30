<div class="tab-pane fade" id="visa" role="tabpanel">

    <div class="row">
        <div class="mb-4">
            <label for="visa_subtitle" class="form-label"> Visa Application Subtitle</label>
            <input type="text" class="form-control" id="visa_subtitle" name="visa_subtitle"
                placeholder="Visa Application Subtitle" value="{{ old('visa_subtitle', ${$name}->visa_subtitle) }}" />
            @error('visa_subtitle')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="visa_description" class="form-label"> Visa Application Description</label>
            <textarea class="form-control ckeditor3" id="visa_description" name="visa_description"
                placeholder="Visa Application Description" rows="10">{{ old('visa_description', ${$name}->visa_description) }}</textarea>

            @error('visa_description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="visa_image" class="form-label">Visa Image</label>
            <input class="form-control dropify" type="file" id="visa_image" name="visa_image"
                value="{{ old('visa_image', ${$name}->visa_image) }}"
                data-default-file="{{ asset(${$name}->visa_image) }}" />

            @error('visa_image')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="form-check form-switch form-switch-danger">
                <input class="form-check-input custom-switch-red" type="checkbox" id="delete-visa_image"
                    name="deletevisa_image" />
                <label class="form-check-label" for="delete-visa_image">Delete</label>
            </div>
        </div>
    </div>
</div>
