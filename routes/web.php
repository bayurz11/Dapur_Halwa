<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AuthentiicationController;
use App\Http\Controllers\CategoriesSettingController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSettingController;
use App\Http\Controllers\ProfileSettingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->middleware('track.visitor', 'setlocale')->name('/');
Route::get('/lang/{lang}', [HomeController::class, 'changeLanguage'])->name('change.language');

Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

//Products
Route::get('products', [ProductController::class, 'index'])->middleware('setlocale')->name('products');
Route::get('products/search', [ProductController::class, 'search'])->middleware('setlocale')->name('products.search');
Route::get('products/searchheader', [ProductController::class, 'searchheader'])->middleware('setlocale')->name('products.searchheader');
Route::get('products/detail/{slug}', [ProductController::class, 'productDetail'])->middleware('setlocale')->name('products.detail');




// Route::get('product/{slug}', [HomeController::class, 'productDetail'])->name('product.detail');

Route::get('articles', [ArticlesController::class, 'index'])->middleware('setlocale')->name('articles');
// Route::get('article/{slug}', [ArticlesController::class, 'articleDetail'])->middleware('setlocale')->name('article.detail');

Route::get('about', [AboutController::class, 'index'])->middleware('setlocale')->name('about');

Route::get('gallery', [GalleryController::class, 'index'])->middleware('setlocale')->name('gallery');
// Route::get('contacts', [HomeController::class, 'contacts'])->name('contacts');
// Route::post('contacts', [HomeController::class, 'sendContact'])->name('contacts.send');

// ===== ERROR PAGES =====
Route::fallback(function () {
    return response()->view('errors.404', ['isErrorPage' => true], 404);
});

Route::middleware(['auth'])->group(function () {

    // Halaman dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Halaman profile
    Route::get('/profile_setting', [ProfileSettingController::class, 'index'])->name('profile_setting');
    Route::post('/profile_setting', [ProfileSettingController::class, 'update'])->name('profile_setting.update');
    Route::post('/profile_setting/change_password', [ProfileSettingController::class, 'changePassword'])->name('profile_setting.change_password');

    // Halaman setting perusahaan
    Route::get('/company_setting', [CompanyController::class, 'index'])->name('company_setting');
    Route::post('/company_setting', [CompanyController::class, 'updateCompany'])->name('company_setting.update');

    // Halaman setting perusahaan - lokasi
    Route::get('/get-cities', [CompanyController::class, 'getCities'])->name('get.cities');
    Route::get('/get-districts', [CompanyController::class, 'getDistricts'])->name('get.districts');
    Route::get('/get-villages', [CompanyController::class, 'getVillages'])->name('get.villages');

    //halaman categories setting
    Route::get('/product_categories', [CategoriesSettingController::class, 'index'])->name('product_categories');
    Route::post('/product_categories/store', [CategoriesSettingController::class, 'store'])->name('product_categories.store');
    Route::post('/product_categories/update/{slug}', [CategoriesSettingController::class, 'update'])->name('product_categories.update');
    Route::delete('/product_categories/delete/{slug}', [CategoriesSettingController::class, 'destroy'])->name('product_categories.delete');

    //Halaman Produk Setting
    Route::get('/product_setting', [ProductSettingController::class, 'index'])->name('product_setting');
    Route::post('/product_setting/store', [ProductSettingController::class, 'store'])->name('product_setting.store');
    Route::post('/product_setting/update/{slug}', [ProductSettingController::class, 'update'])->name('product_setting.update');
    Route::post('/product_setting/delete/{slug}', [ProductSettingController::class, 'destroy'])->name('product_setting.delete');
});
