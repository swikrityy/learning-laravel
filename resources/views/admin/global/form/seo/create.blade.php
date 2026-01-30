<div class="card mt-4">
    <div class="card-body">

        <div class="mb-4">
            <label for="seo_title" class="form-label">SEO Title</label>
            <input type="text" class="form-control" id="seo_title" name="seo_title" placeholder="SEO Title"
                value="{{ old('seo_title') }}" />
            @error('seo_title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="meta_keywords" class="form-label">Meta Keywords</label>
            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                placeholder="Meta Keywords" value="{{ old('seo_title') }}" />
            @error('meta_keywords')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description"
                rows="4">{{ old('meta_description') }}</textarea>
            @error('meta_description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="seo_schema" class="form-label">SEO Schema</label>
            <textarea class="form-control" id="seo_schema" name="seo_schema" placeholder="SEO Schema" rows="4">{{ old('seo_schema') }}</textarea>
            @error('seo_schema')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

    </div>
</div>
