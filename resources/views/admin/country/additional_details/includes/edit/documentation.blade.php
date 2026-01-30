<div class="tab-pane fade" id="documentation" role="tabpanel">
    <div class="row">
        <div class="mb-4">
            <label for="documentation_subtitle" class="form-label">Documentation Subtitle</label>
            <input type="text" class="form-control" id="documentation_subtitle" name="documentation_subtitle"
                placeholder="Documentation Subtitle"
                value="{{ old('documentation_subtitle', ${$name}->documentation_subtitle) }}" />
            @error('documentation_subtitle')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <label for="documentation_description" class="form-label">Documentation Description</label>
            <textarea class="form-control ckeditor4" id="documentation_description" name="documentation_description"
                placeholder="Documentation Description" rows="10">{{ old('documentation_description', ${$name}->documentation_description) }}</textarea>

            @error('documentation_description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="documentation_image" class="form-label">Documentation Image</label>
            <input class="form-control dropify" type="file" id="documentation_image" name="documentation_image"
                value="{{ old('documentation_image', ${$name}->documentation_image) }}"
                data-default-file="{{ asset(${$name}->documentation_image) }}" />

            @error('documentation_image')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="form-check form-switch form-switch-danger">
                <input class="form-check-input custom-switch-red" type="checkbox" id="delete-documentation_image" name="deletedocumentation_image" />
                <label class="form-check-label" for="delete-documentation_image">Delete</label>
            </div>
        </div>
    </div>
</div>
