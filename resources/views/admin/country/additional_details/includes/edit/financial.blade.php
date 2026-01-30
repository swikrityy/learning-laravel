<div class="tab-pane fade" id="financial" role="tabpanel">

    <div class="row">
        <div class="mb-4">
            <label for="financial_subtitle" class="form-label">Financial Subtitle</label>
            <input type="text" class="form-control" id="financial_subtitle" name="financial_subtitle"
                placeholder="Financial Subtitle"
                value="{{ old('financial_subtitle', ${$name}->financial_subtitle) }}" />
            @error('financial_subtitle')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <label for="financial_description" class="form-label">Financial Description</label>
            <textarea class="form-control ckeditor5" id="financial_description" name="financial_description"
                placeholder="Financial Description" rows="10">{{ old('financial_description', ${$name}->financial_description) }}</textarea>

            @error('financial_description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="financial_image" class="form-label">Financial Image</label>
            <input class="form-control dropify" type="file" id="financial_image" name="financial_image"
                value="{{ old('financial_image', ${$name}->financial_image) }}"
                data-default-file="{{ asset(${$name}->financial_image) }}" />

            @error('financial_image')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="form-check form-switch form-switch-danger">
                <input class="form-check-input custom-switch-red" type="checkbox" id="delete-financial_image" name="deletefinancial_image" />
                <label class="form-check-label" for="delete-financial_image">Delete</label>
            </div>
        </div>
    </div>
</div>
