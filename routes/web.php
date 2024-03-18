<?php

use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\BrandController;
use App\Http\Controllers\Site\CareerController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PartnerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('setlocale/{locale}',function($lang){
    \Illuminate\Support\Facades\Session::put('locale',$lang);
    return redirect()->back();
})->name('locale');

Route::get('/' , [HomeController::class , 'index'])->name('index');

Route::get('/our-story' , [AboutController::class , 'index'])->name('about');

Route::get('/our-partners' , [PartnerController::class , 'index'])->name('partners');

Route::get('/careers', [CareerController::class , 'index'])->name('career');
Route::post('/careers' , [CareerController::class , 'store']);

Route::get('/contact-us', [ContactController::class , 'index'])->name('contact');
Route::post('/contact-us' , [ContactController::class , 'store']);

Route::get('/brands' , [BrandController::class , 'index'])->name('brands');
Route::get('/brands/{slug}' , [BrandController::class , 'brand'])->name('brand');
Route::get('/brands/{slug}/our-story' ,[BrandController::class, 'story'])->name('brand.story');
Route::get('/brands/{slug}/products' ,[BrandController::class, 'products'])->name('brand.products');
Route::get('/brands/{slug}/partners' ,[BrandController::class, 'partners'])->name('brand.partners');
Route::get('/brands/{slug}/media' ,[BrandController::class, 'media'])->name('brand.media');
Route::get('/brands/{slug}/contact-us' ,[BrandController::class, 'contact'])->name('brand.contact');
Route::post('/brands/{slug}/contact-us' ,[BrandController::class, 'store']);