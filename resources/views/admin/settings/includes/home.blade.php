<div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="row">

        <ul class="nav nav-pills mb-3" role="tablist">

            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                    data-bs-target="#home_hero" aria-controls="home_hero" aria-selected="true">
                    Home Hero
                </button>
            </li>

            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#counter"
                    aria-controls="counter" aria-selected="false">
                    Counter
                </button>
            </li>

            {{-- <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#aboutus"
                    aria-controls="aboutus" aria-selected="false">
                    About Us
                </button>
            </li> --}}

            {{-- <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                    data-bs-target="#universities" aria-controls="universities" aria-selected="false">
                    Universities
                </button>
            </li> --}}

            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#countries"
                    aria-controls="countries" aria-selected="false">
                    Countries
                </button>
            </li>

            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#services"
                    aria-controls="services" aria-selected="false">
                    Services
                </button>
            </li>

            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#teams"
                    aria-controls="countries" aria-selected="false">
                    Teams
                </button>
            </li>

            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#courses"
                    aria-controls="countries" aria-selected="false">
                    Courses
                </button>
            </li>

            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#blogs"
                    aria-controls="blogs" aria-selected="false">
                    Blogs
                </button>
            </li>

            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                    data-bs-target="#testimonials" aria-controls="testimonials" aria-selected="false">
                    Testimonials
                </button>
            </li>

        </ul>

        <div class="tab-content">



            {{-- Home Her0 --}}
            @include('admin.settings.includes.home.homehero')

            {{-- Counter --}}
            @include('admin.settings.includes.home.counter')

            {{-- About Us --}}
            {{-- @include('admin.settings.includes.home.aboutus') --}}

            {{-- Universities --}}
            {{-- @include('admin.settings.includes.home.universities') --}}

            {{-- Countries --}}
            @include('admin.settings.includes.home.countries')


            {{-- Services --}}
            @include('admin.settings.includes.home.services')

            {{-- Teams --}}
            @include('admin.settings.includes.home.teams')

            {{-- Course --}}
            @include('admin.settings.includes.home.courses')


            {{-- Blogs --}}
            @include('admin.settings.includes.home.blog')

            {{-- Testimonials --}}
            @include('admin.settings.includes.home.testimonials')

        </div>

    </div>
</div>

@push('js')
    <script>
        const selectElements = document.querySelectorAll('select[multiple]');

        selectElements.forEach((select) => {
            new Choices(select, {
                removeItemButton: true,
                maxItemCount: 10,
                searchResultLimit: 5,
                renderChoiceLimit: 5,
                allowHTML: true,

            });
        });
    </script>
@endpush
