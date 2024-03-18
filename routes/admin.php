<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BrandMediaController;
use App\Http\Controllers\Admin\BrandPartnerController;
use App\Http\Controllers\Admin\BrandProductController;
use App\Http\Controllers\Admin\BrandRequestController;
use App\Http\Controllers\Admin\BrandSliderController;
use App\Http\Controllers\Admin\BrandSocialController;
use App\Http\Controllers\Admin\BrandStoryController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\CareerContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialLinkController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
| Admin Routes
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
*/
Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {

    //dashboard route
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    /**
     * profile routes
     */
    Route::prefix('profile')->name('profile.')->group(function ()
    {
        Route::get('/' , [ProfileController::class , 'index'])->name('index');
        Route::put('/update' , [ProfileController::class , 'update'])->name('update');
    });

    /**
     * settings routes
     */
    Route::prefix('settings')->name('settings.')->group(function ()
    {
        Route::get('/' , [SettingController::class , 'index'])->name('index');
        Route::put('/update' , [SettingController::class , 'update'])->name('update');
    });

    /**
     * our story routes
     */
    Route::prefix('our-story')->name('about.')->group(function ()
    {
        Route::get('/' , [AboutController::class , 'index'])->name('index');
        Route::put('/update' , [AboutController::class , 'update'])->name('update');
    });

    /**
     * careers routes
     */
    Route::prefix('careers')->name('careers.')->group(function ()
    {
        Route::get('/' , [CandidateController::class , 'index'])->name('index');
        Route::delete('/destroy/{id}' , [CandidateController::class , 'destroy'])->name('delete');

        /**
         * content routes
         */
        Route::prefix('content')->name('content.')->group(function ()
        {
            Route::get('/' , [CareerContentController::class , 'index'])->name('index');
            Route::put('/update' , [CareerContentController::class , 'update'])->name('update');
        });
    });

    /**
     * brands routes
     */
    Route::prefix('brands')->name('brands.')->group(function ()
    {
        Route::get('/' , [BrandController::class , 'index'])->name('index');
        Route::post('/store' , [BrandController::class , 'store'])->name('store');
        Route::get('/edit/{id}' , [BrandController::class , 'edit'])->name('edit');
        Route::put('/update/{id}' , [BrandController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [BrandController::class , 'destroy'])->name('delete');

        /**
         * slider routes
         */
        Route::prefix('slider')->name('slider.')->group(function ()
        {
            Route::get('/{id}' , [BrandSliderController::class , 'index'])->name('index');
            Route::post('/store/{id}' , [BrandSliderController::class , 'store'])->name('store');
            Route::get('/edit/{id}' , [BrandSliderController::class , 'edit'])->name('edit');
            Route::put('/update/{id}' , [BrandSliderController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [BrandSliderController::class , 'destroy'])->name('delete');
        });

        /**
         * story routes
         */
        Route::prefix('our-story')->name('story.')->group(function ()
        {
            Route::get('/{id}' , [BrandStoryController::class , 'index'])->name('index');
            Route::put('/update/{id}' , [BrandStoryController::class , 'update'])->name('update');
        });

        /**
         * partners routes
         */
        Route::prefix('partners')->name('partners.')->group(function ()
        {
            Route::get('/{id}' , [BrandPartnerController::class , 'index'])->name('index');
            Route::post('/store/{id}' , [BrandPartnerController::class , 'store'])->name('store');
            Route::get('/edit/{id}' , [BrandPartnerController::class , 'edit'])->name('edit');
            Route::put('/update/{id}' , [BrandPartnerController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [BrandPartnerController::class , 'destroy'])->name('delete');
        });

        /**
         * products routes
         */
        Route::prefix('products')->name('products.')->group(function ()
        {
            Route::get('/{id}' , [BrandProductController::class , 'index'])->name('index');
            Route::post('/store/{id}' , [BrandProductController::class , 'store'])->name('store');
            Route::get('/edit/{id}' , [BrandProductController::class , 'edit'])->name('edit');
            Route::put('/update/{id}' , [BrandProductController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [BrandProductController::class , 'destroy'])->name('delete');
        });

        /**
         * media routes
         */
        Route::prefix('media')->name('media.')->group(function ()
        {
            Route::get('/{id}' , [BrandMediaController::class , 'index'])->name('index');
            Route::post('/store/{id}' , [BrandMediaController::class , 'store'])->name('store');
            Route::get('/edit/{id}' , [BrandMediaController::class , 'edit'])->name('edit');
            Route::put('/update/{id}' , [BrandMediaController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [BrandMediaController::class , 'destroy'])->name('delete');
        });

        /**
         * messages routes
         */
        Route::prefix('messages')->name('messages.')->group(function ()
        {
            Route::get('/{id}' , [BrandRequestController::class , 'index'])->name('index');
        });

        /**
         * brand links routes
         */
        Route::prefix('social-links')->name('links.')->group(function ()
        {
            Route::get('/{id}' , [BrandSocialController::class , 'index'])->name('index');
            Route::post('/store/{id}' , [BrandSocialController::class , 'store'])->name('store');
            Route::get('/edit/{id}' , [BrandSocialController::class , 'edit'])->name('edit');
            Route::put('/update/{id}' , [BrandSocialController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [BrandSocialController::class , 'destroy'])->name('delete');
        });
    });
    
    /**
     * media routes
     */
    Route::prefix('media')->name('media.')->group(function ()
    {
        Route::get('/' , [MediaController::class , 'index'])->name('index');
        Route::post('/store' , [MediaController::class , 'store'])->name('store');
        Route::get('/edit/{id}' , [MediaController::class , 'edit'])->name('edit');
        Route::put('/update/{id}' , [MediaController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [MediaController::class , 'destroy'])->name('delete');
    });

    /**
     * partners routes
     */
    Route::prefix('partners')->name('partners.')->group(function ()
    {
        Route::get('/' , [PartnerController::class , 'index'])->name('index');
        Route::post('/store' , [PartnerController::class , 'store'])->name('store');
        Route::get('/edit/{id}' , [PartnerController::class , 'edit'])->name('edit');
        Route::put('/update/{id}' , [PartnerController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [PartnerController::class , 'destroy'])->name('delete');
    });

    /**
     * member links routes
     */
    Route::prefix('links')->name('links.')->group(function ()
    {
        Route::get('/' , [SocialLinkController::class , 'index'])->name('index');
        Route::post('/store' , [SocialLinkController::class , 'store'])->name('store');
        Route::get('/edit/{id}' , [SocialLinkController::class , 'edit'])->name('edit');
        Route::put('/update/{id}' , [SocialLinkController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [SocialLinkController::class , 'destroy'])->name('delete');
    });

    /**
     * messages routes
     */
    Route::prefix('messages')->name('messages.')->group(function ()
    {
        Route::get('/' , [MessageController::class , 'index'])->name('index');
        Route::get('/show/{id}' , [MessageController::class , 'show'])->name('show');
        Route::delete('/destroy/{id}' , [MessageController::class , 'destroy'])->name('delete');
    });
});
