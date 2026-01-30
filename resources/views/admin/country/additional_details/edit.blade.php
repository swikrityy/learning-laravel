<div class="nav-align-top mb-4">
    <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#career"
                aria-controls="career" aria-selected="true">
                Career Counseling
            </button>
        </li>

        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#university"
                aria-controls="university" aria-selected="false">
                University Selection
            </button>
        </li>

        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#visa"
                aria-controls="visa" aria-selected="false">
                Visa Application
            </button>
        </li>

        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#documentation"
                aria-controls="documentation" aria-selected="false">
                Documentation
            </button>
        </li>

        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#financial"
                aria-controls="financial" aria-selected="false">
                Financial Assistance
            </button>
        </li>

        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#departure"
                aria-controls="departure" aria-selected="false">
                Departure Guidance
            </button>
        </li>


    </ul>
    <div class="tab-content">

        @include('admin.country.additional_details.includes.edit.career')

        @include('admin.country.additional_details.includes.edit.university')

        @include('admin.country.additional_details.includes.edit.visa')

        @include('admin.country.additional_details.includes.edit.documentation')

        @include('admin.country.additional_details.includes.edit.financial')

        @include('admin.country.additional_details.includes.edit.departure')

    </div>
</div>
