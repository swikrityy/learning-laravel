<div class="tab-pane fade" id="departure" role="tabpanel">

    <div class="row">
        <div class="mb-4">
            <label for="departure_subtitle" class="form-label">Departure Subtitle</label>
            <input type="text" class="form-control" id="departure_subtitle" name="departure_subtitle"
                placeholder="Departure Subtitle" value="{{ old('departure_subtitle') }}" />
            @error('departure_subtitle')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <label for="departure_description" class="form-label">Departure Description</label>
            <textarea class="form-control ckeditor6" id="departure_description" name="departure_description"
                placeholder="Departure Description" rows="10">{{ old('departure_description') }}</textarea>

            @error('departure_description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="departure_image" class="form-label">Departure Image</label>
            <input class="form-control dropify" type="file" id="departure_image" name="departure_image"
                value="{{ old('departure_image') }}" data-default-file />

            @error('departure_image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
