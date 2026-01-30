<div class="tab-pane fade" id="blogs" role="tabpanel">
    {{-- Blogs Section --}}
    <fieldset class="border p-3">
        <legend class="float-none w-auto legend-title">Blog Section</legend>
        <div class="row">
            <div class="mb-4 col-md-6">
                <label for="blogs_title" class="form-label">Blog Title</label>
                <input type="text" class="form-control" id="blogs_title" name="blogs_title" placeholder="Blog Title"
                    value="{{ $settings['blogs_title'] }}" />
                @error('blogs_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="blogs_subtitle" class="form-label">Blog Subtitle</label>
                <input type="text" class="form-control" id="blogs_subtitle" name="blogs_subtitle"
                    placeholder="Blog Subtitle" value="{{ $settings['blogs_subtitle'] }}" />
                @error('blogs_subtitle')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="blogs_button" class="form-label">Blog Button Text</label>
                <input type="text" class="form-control" id="blogs_button" name="blogs_button"
                    placeholder="Blog Button Text" value="{{ $settings['blogs_button'] }}" />
                @error('blogs_button')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-4 col-md-6">
                <label for="blogs_link" class="form-label">Blog Link</label>
                <input type="text" class="form-control" id="blogs_link" name="blogs_link" placeholder="Blog Link"
                    value="{{ $settings['blogs_link'] }}" />
                @error('blogs_link')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-4">
                <label for="blogs_description" class="form-label">Blog Description</label>
                <textarea class="form-control" id="blogs_description" name="blogs_description" placeholder="Blog Description"
                    rows="4">{{ $settings['blogs_description'] }}</textarea>

                @error('blogs_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="home_blogs" class="form-label">Home Blogs</label>

                @php
                    $selectedBlogsIds = explode(',', $settings['home_blogs']);
                @endphp

                <!--  choice js -->
                <select name="home_blogs[]" id="home_blogs" multiple>
                    @foreach ($blogs as $blog)
                        <option value="{{ $blog->id }}" @if (in_array($blog->id, $selectedBlogsIds)) selected @endif>

                            {{ $blog->id }}-{{ $blog->title }}</option>
                    @endforeach
                </select>
                <!-- choices js -->

                @error('home_blogs')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

        </div>
    </fieldset>
</div>
