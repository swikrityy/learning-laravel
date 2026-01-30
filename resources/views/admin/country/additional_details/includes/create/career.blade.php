<div class="tab-pane fade show active" id="career" role="tabpanel">

    <div class="row">
        <div class="mb-4">
            <label for="career_subtitle" class="form-label">Career Counseling Subtitle</label>
            <input type="text" class="form-control" id="career_subtitle" name="career_subtitle"
                placeholder="Career Counseling Subtitle" value="{{ old('career_subtitle') }}" />
            @error('career_subtitle')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <label for="career_description" class="form-label">Career Counseling Description</label>
            <textarea class="form-control ckeditor1" id="career_description" name="career_description"
                placeholder="Career Counseling Description" rows="10">{{ old('career_description') }}</textarea>

            @error('career_description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="career_image" class="form-label">Career Image</label>
            <input class="form-control dropify" type="file" id="career_image" name="career_image"
                value="{{ old('career_image') }}" data-default-file />

            @error('career_image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
