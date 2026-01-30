<div class="tab-pane fade" id="university" role="tabpanel">

    <div class="row">
        <div class="mb-4">
            <label for="university_subtitle" class="form-label">University Selection Subtitle</label>
            <input type="text" class="form-control" id="university_subtitle" name="university_subtitle"
                placeholder="University Selection Subtitle" value="{{ old('university_subtitle') }}" />
            @error('university_subtitle')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <label for="university_description" class="form-label">University Selection Description</label>
            <textarea class="form-control ckeditor2" id="university_description" name="university_description"
                placeholder="University Selection Description" rows="10">{{ old('university_description') }}</textarea>

            @error('university_description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="university_image" class="form-label">University Image</label>
            <input class="form-control dropify" type="file" id="university_image" name="university_image"
                value="{{ old('university_image') }}" data-default-file />

            @error('university_image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
