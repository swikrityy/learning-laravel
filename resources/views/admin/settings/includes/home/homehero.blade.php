<div class="tab-pane fade show active" id="home_hero" role="tabpanel">
    {{-- About Us Section --}}
    <fieldset class="border p-3">
        <legend class="float-none w-auto legend-title">Home Hero Section</legend>
        <div class="row">

            <div class="mb-4">
                <label for="homepage_title" class="form-label">Home Hero Title</label>
                <textarea class="form-control" id="homepage_title" name="homepage_title" placeholder="Activities Description"
                    rows="4">{{ $settings['homepage_title'] }}</textarea>

                @error('homepage_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="homepage_description" class="form-label">Home Hero Description</label>
                <textarea class="form-control" id="homepage_description" name="homepage_description"
                    placeholder="Activities Description" rows="4">{{ $settings['homepage_description'] }}</textarea>

                @error('homepage_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="mb-2">
                    <label for="home_cta_1_text" class="form-label">CTA 1 Text</label>
                    <input type="text" class="form-control" id="home_cta_1_text" name="home_cta_1_text"
                        value="{{ $settings['home_cta_1_text'] ?? '' }}" />
                </div>

                <div class="mb-2">
                    <label for="home_cta_1_link" class="form-label">CTA 1 Link</label>
                    <input type="text" id="home_cta_1_link" name="home_cta_1_link" class="form-control"
                        value="{{ $settings['home_cta_1_link'] ?? '' }}" />
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="mb-2">
                    <label for="home_cta_2_text" class="form-label">CTA 2 Text</label>
                    <input type="text" class="form-control" id="home_cta_2_text" name="home_cta_2_text"
                        value="{{ $settings['home_cta_2_text'] ?? '' }}" />
                </div>

                <div class="mb-2">
                    <label for="home_cta_2_link" class="form-label">CTA 2 Link</label>
                    <input type="text" id="home_cta_2_link" name="home_cta_2_link" class="form-control"
                        value="{{ $settings['home_cta_2_link'] ?? '' }}" />
                </div>
            </div>

        </div>

        <fieldset class="border p-3">
            <legend class="float-none w-auto legend-title">Home SEO Section</legend>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="mb-2">
                        <label for="homepage_seo_title" class="form-label">SEO Title</label>
                        <input type="text" class="form-control" id="homepage_seo_title" name="homepage_seo_title"
                            value="{{ $settings['homepage_seo_title'] ?? '' }}" />
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="mb-2">
                        <label for="homepage_seo_keywords" class="form-label">SEO Keywords</label>
                        <input type="text" class="form-control" id="homepage_seo_keywords"
                            name="homepage_seo_keywords" value="{{ $settings['homepage_seo_keywords'] ?? '' }}" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="homepage_meta_description">SEO Description</label>
                        <textarea name="homepage_meta_description" rows="4" class="form-control br-8"
                            placeholder="SEO Description">{{ $settings['homepage_meta_description'] }}</textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="homepage_seo_schema">SEO Schema</label>
                        <textarea name="homepage_seo_schema" rows="4" class="form-control br-8" placeholder="SEO Schema">{{ $settings['homepage_seo_schema'] }}</textarea>
                    </div>
                </div>
            </div>
        </fieldset>
    </fieldset>
</div>
