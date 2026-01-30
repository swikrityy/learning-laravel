<?php

use App\Http\Controllers\admin\AlbumController;
use App\Http\Controllers\admin\AlbumGalleryController;
use App\Http\Controllers\admin\CountryFaqController;
use App\Http\Controllers\admin\ResultController;
use App\Models\Application;
use App\Models\CountryLocation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\PopupController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\SocialController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SuccessController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DailyVisitController;
use App\Http\Controllers\admin\SEnquiriesController;
use App\Http\Controllers\admin\UniversityController;
use App\Http\Controllers\admin\ApplicationController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\WhyChooseUsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\admin\ContactInquiryController;
use App\Http\Controllers\admin\CountryLocationController;
use App\Http\Controllers\admin\CountryLocationController as AdminCountryLocationController;
use App\Http\Controllers\admin\EventController;
// use Illuminate\Support\Facades\Artisan;

// Route::get('/', function () {
//     return view('welcome');
// })->name('frontend.home');
Route::get('/test-dd', function () {
    dd('it works');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth']],
    function () {

        // register
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('register');

        // profile
        Route::get('profile', function () {
            return view('admin.dashboard.profile');
        })->name('profile');
        Route::get('profile', function () {
            return view('admin.dashboard.profile');
        })->name('password.change.index');
        Route::post('change-password', [PasswordController::class, 'update'])->name('password.change.store');

        // settings
        Route::get('setting', [SettingsController::class, 'edit'])->name('admin.setting.index');
        Route::post('setting', [SettingsController::class, 'update'])->name('admin.setting.update');
        Route::resource('popup', PopupController::class);
        Route::resource('social', SocialController::class);

        Route::resource('country', CountryController::class);
        Route::resource('branch', BranchController::class);
        Route::resource('course', CourseController::class);
        Route::resource('page', PageController::class);
        Route::resource('blog', BlogController::class);
        Route::resource('event', EventController::class);
        Route::resource('team', TeamController::class);
        Route::resource('service', ServiceController::class);
        Route::resource('testimonial', TestimonialController::class);
        Route::resource('faq', FaqController::class);
        Route::resource('whychooseus', WhyChooseUsController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('success', SuccessController::class);
        Route::resource('slider', SliderController::class);
        Route::resource('countrylocation', CountryLocationController::class);
        Route::resource('result', ResultController::class);
        Route::post('/result/search', [ResultController::class, 'search'])->name('result.search');
        Route::get('/visa-refused', [ResultController::class, 'visaRefused'])->name('result.visaRefused');
        Route::get('/visa-withdraw', [ResultController::class, 'visaWithdraw'])->name('result.visaWithdraw');
        Route::get('/visa-grant', [ResultController::class, 'visaGrant'])->name('result.visaGrant');
        // Route::resource("advertisement", ::class);
        Route::resource('application', ApplicationController::class);
        Route::post('application/search', [ApplicationController::class, 'applicationSearch'])->name('application.search');
        Route::get('application/{id}/classedit', [ApplicationController::class, 'classEdit'])->name('application.classedit');
        Route::put('application/{id}/classupdate', [ApplicationController::class, 'classUpdate'])->name('application.classupdate');
        Route::put('application/{id}/prepareupdate', [ApplicationController::class, 'preparationUpdate'])->name('application.prepareupdate');
        Route::post('application/filtervisa', [ApplicationController::class, 'filterByResult'])->name('application.filterByResult');
        Route::post('application/filterapplication', [ApplicationController::class, 'filterByApplication'])->name('application.filterByApplication');
        // The below route is used to show the visa detail of an application and edit it but uses the ResultController.
        Route::get('application/{id}/visadetail', [ResultController::class, 'edit'])->name('application.visadetail');
        Route::put('application/{id}/update', [ApplicationController::class, 'enquiryUpdate'])->name('application.enquiryupdate');

        Route::resource('album', AlbumController::class);
        Route::prefix('album/{album}/gallery')->name('album.gallery.')->group(function () {
            Route::get('/', [AlbumGalleryController::class, 'index'])->name('index');
            Route::get('/create', [AlbumGalleryController::class, 'create'])->name('create');
            Route::post('/', [AlbumGalleryController::class, 'store'])->name('store');
            Route::delete('/{gallery}/delete-file', [AlbumGalleryController::class, 'documentDelete'])->name('delete-file');
        });
        Route::get('country/{id}/countryfaq', [CountryFaqController::class, 'index'])->name('countryfaq.index');
        Route::get('country/{id}/countryfaq/create', [CountryFaqController::class, 'create'])->name('countryfaq.create');
        Route::post('country/countryfaq', [CountryFaqController::class, 'store'])->name('countryfaq.store');
        Route::get('country/{faq}/countryfaq/edit', [CountryFaqController::class, 'edit'])->name('countryfaq.edit');
        Route::put('country/{faq}/countryfaq/update', [CountryFaqController::class, 'update'])->name('countryfaq.update');
        Route::delete('country/{faq}/countryfaq', [CountryFaqController::class, 'destroy'])->name('countryfaq.destroy');


        Route::resource('dailyvisit', DailyVisitController::class);
        Route::put('dailyvisit/{id}/change-status', [DailyVisitController::class, 'changeStatus'])->name('dailyvisit.changeStatus');

        Route::resource(name: 'enquiry', controller: SEnquiriesController::class);
        Route::get('/enquiry/{id}/pdf', [SEnquiriesController::class, 'generatePdf'])->name('enquiry.pdf');
        Route::put('enquiry/{id}/image', [SEnquiriesController::class, 'updateImage'])->name('enquiry.imageupdate');

        // University
        Route::get('country/{country_id}/university', [UniversityController::class, 'index'])->name('university.index');
        Route::get('country/{country_id}/university/create', [UniversityController::class, 'create'])->name('university.create');
        Route::get('country/{country_id}/university/{university}/edit', [UniversityController::class, 'edit'])->name('university.edit');
        Route::post('country/{country_id}/university', [UniversityController::class, 'store'])->name('university.store');
        Route::put('country/{country_id}/university/{university}', [UniversityController::class, 'update'])->name('university.update');
        Route::delete('country/{country_id}/university/{university}', [UniversityController::class, 'destroy'])->name('university.destroy');

        Route::resource('contactinquiry', ContactInquiryController::class);
        // Route::resource("university", UniversityController::class);
    
        // inquries
        // Route::resource("inquiry", InquiryController::class);
    
        // Delete Image only
    
        // Route::delete("delete_image/{image_id}", [DeleteImage::class, 'delete'])->name('admin.setting.delete_image');
    
        // Route::post("blog/{image_id}", [BlogController::class, 'deleteimg'])->name('admin.setting.delete_image');
    
        // Route::resource("contact", ContactController::class);
    
        // Route::resource("popup", PopupsController::class);
        // Route::resource("advertisement", AdvertisementController::class);
    
        // Route::resource("payment", PaymentMethodsController::class);
    
        // //inquries
        // Route::resource("inquiry", InquiryController::class);
        // Route::resource("contactinquiry", ContactInquiryController::class);
    
        // Route::get("gallery", [GalleryController::class, 'index'])->name("gallery.index");
        // Route::get("gallery/create", [GalleryController::class, 'create'])->name("gallery.create");
        // Route::post("gallery/create", [GalleryController::class, 'store'])->name("gallery.store");
        // Route::post("gallery/delete/{gallery}", [GalleryController::class, 'destroy'])->name("gallery.destroy");
    
        // Bookings routes
    
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/', [DashboardController::class, 'index']);

    }
);

require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';


// Route::get('/migrate',function () {
//     Artisan::call('migrate','cache' ,['--force' => true]);
//     return 'Migration completed';
// });