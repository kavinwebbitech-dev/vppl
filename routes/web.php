<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SitemapRobotsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\JobController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('/core-products', function () {
    return view('frontend.core-products');
})->name('core-products');

Route::get('/demineralization-plant', function () {
    return view('frontend.demineralization-plant');
})->name('demineralization-plant');

Route::get('/effluent-treatment-plant', function () {
    return view('frontend.effluent-treatment-plant');
})->name('effluent-treatment-plant');

Route::get('/gallery', function () {
    return view('frontend.gallery');
})->name('gallery');

Route::get('/hero', function () {
    return view('frontend.hero');
})->name('hero');

Route::get('/hydro-pneumatic-system-pumps', function () {
    return view('frontend.hydro-pneumatic-system-pumps');
})->name('hydro-pneumatic-system-pumps');

Route::get('/iron-removal-plant', function () {
    return view('frontend.iron-removal-plant');
})->name('iron-removal-plant');

Route::get('/mineral-water-treatment-plant', function () {
    return view('frontend.mineral-water-treatment-plant');
})->name('mineral-water-treatment-plant');

Route::get('/news-event', function () {
    return view('frontend.news-event');
})->name('news-event');

Route::get('/reverse-osmosis-plant', function () {
    return view('frontend.reverse-osmosis-plant');
})->name('reverse-osmosis-plant');

Route::get('/service-single', function () {
    return view('frontend.service-single');
})->name('service-single');

Route::get('/sewage-treatment-plant', function () {
    return view('frontend.sewage-treatment-plant');
})->name('sewage-treatment-plant');

Route::get('/ultra-filtration-plant', function () {
    return view('frontend.ultra-filtration-plant');
})->name('ultra-filtration-plant');

Route::get('/water-softening-plant', function () {
    return view('frontend.water-softening-plant');
})->name('water-softening-plant');

Route::get('/careers', function () {
    return view('frontend.careers');
})->name('careers');



//landing//

Route::get('/landing', function () {
    return view('frontend.landing-pages.index');
})->name('landing');

// Route::get('/landing', function () {
//     return view('frontend.landing-pages.final-landingpage');
// })->name('finallanding');

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'Cache cleared';
});
Route::get('/math-captcha', function () {
    $num1 = rand(1, 20);
    $num2 = rand(1, 20);

    session(['math_captcha' => $num1 + $num2]);

    return response()->json([
        'question' => "$num1 + $num2 = ?"
    ]);
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/blog', 'blog')->name('blog');
    Route::post('/job-apply', 'jobApply')->name('job.apply');
    Route::get('/service-details/{slug}', 'serviceDetail')->name('service.detail');
    Route::get('/blog/detail/{slug}', 'blogDetail')->name('blog.detail');
    Route::post('/enquriy/store', 'enquiryStore')->name('enquiry.store');
        Route::post('/enquriy/storeland', 'enquiryStoreland')->name('enquiry2.store');
    // Route::get('/careers', 'careersPage')->name('careers');
    Route::get('/testimonial', 'testimonialPage')->name('testimonial');
});

// Admin routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

    // Pages    
    Route::prefix('pages')->name('pages.')->controller(LandingPageController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/datatable', 'datatable')->name('datatable');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::delete('/delete-all', 'deleteAll')->name('deleteAll');
        Route::post('/bulk-upload', 'bulkUpload')->name('bulk.upload');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('delete');
    });
    
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::post('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');

    Route::prefix('profile')->name('setting.')->controller(SettingController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/profile', 'updateProfile')->name('profile.update');
        Route::post('/common', 'updateCommon')->name('settings.update');
    });

    // Sitemap & Robots routes under settings prefix
    Route::prefix('sitemap')->name('sitemap.')->controller(SitemapRobotsController::class)->group(function () {
        Route::get('/sitemap-robots', 'index')->name('sitemap-robots.index');
        Route::post('/robots-upload',  'upload')->name('robots.upload');
        Route::get('/sitemap-download', 'downloadSitemap')->name('sitemap.download');
        Route::get('/robots-download', 'downloadRobots')->name('robots.download');
    });

    // Enquiry
    Route::prefix('enquiry')->name('enquiry.')->controller(EnquiryController::class)->group(function () {
        Route::get('/list', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('data.store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/enquiry-delete/{id}', 'destroy')->name('destory');
    });

    // Service
    Route::prefix('service')->name('service.')->controller(ServiceController::class)->group(function () {
        Route::get('/list', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/service-delete/{id}', 'destroy')->name('destory');
    });

    // Blogs
    

    // Notification
    Route::prefix('notification')->name('notification.')->controller(NotificationController::class)->group(function () {
        Route::get('/list', 'index')->name('index');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });
});

//Landing Page
// Route::get('/finallanding', [HomeController::class, 'landing'])->name('landing');
Route::get('/{slug}', [HomeController::class, 'landing'])->where('slug', '^(?!admin).*');
