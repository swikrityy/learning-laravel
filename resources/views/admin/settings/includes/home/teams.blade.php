<div class="tab-pane fade" id="teams" role="tabpanel">
    {{-- Teams Section --}}
    <fieldset class="border p-3">
        <legend class="float-none w-auto legend-title">Team Section</legend>
        <div class="row">
            <div class="mb-4 col-md-6">
                <label for="teams_title" class="form-label">Team Title</label>
                <input type="text" class="form-control" id="teams_title" name="teams_title" placeholder="Team Title"
                    value="{{ $settings['teams_title'] }}" />
                @error('teams_title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="teams_subtitle" class="form-label">Team Subtitle</label>
                <input type="text" class="form-control" id="teams_subtitle" name="teams_subtitle"
                    placeholder="Team Subtitle" value="{{ $settings['teams_subtitle'] }}" />
                @error('teams_subtitle')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 col-md-6">
                <label for="teams_button" class="form-label">Team Button Text</label>
                <input type="text" class="form-control" id="teams_button" name="teams_button"
                    placeholder="Team Button Text" value="{{ $settings['teams_button'] }}" />
                @error('teams_button')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-4 col-md-6">
                <label for="teams_link" class="form-label">Team Link</label>
                <input type="text" class="form-control" id="teams_link" name="teams_link" placeholder="Team Link"
                    value="{{ $settings['teams_link'] }}" />
                @error('teams_link')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-4">
                <label for="teams_description" class="form-label">Team Description</label>
                <textarea class="form-control" id="teams_description" name="teams_description" placeholder="Team Description"
                    rows="4">{{ $settings['teams_description'] }}</textarea>

                @error('teams_description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="home_teams" class="form-label">Home teams</label>

                @php
                    $selectedteamsIds = explode(',', $settings['home_teams']);
                @endphp

                <!--  choice js -->
                <select name="home_teams[]" id="home_teams" multiple>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}" @if (in_array($team->id, $selectedteamsIds)) selected @endif>

                            {{ $team->id }}-{{ $team->name }}</option>
                    @endforeach
                </select>
                <!-- choices js -->

                @error('home_teams')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

        </div>
    </fieldset>
</div>
