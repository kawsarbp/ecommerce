<?php

use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
| Web Routes
*/

Route::get('/', [SiteController::class, 'index'])->name('index');
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    /*brand route*/
    Route::prefix('/brand')->name('brand.')->group(function () {
        Route::get('/create', [BrandController::class, 'addBrand'])->name('addBrand');
        Route::get('/manage', [BrandController::class, 'manageBrand'])->name('manageBrand');
        Route::post('/store', [BrandController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [BrandController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('delete');
        Route::get('/update-status/{id}/{status}', [BrandController::class, 'updateStatus'])->name('updateStatus');
    });
    /*categories route*/
    Route::prefix('/category')->name('category.')->group(function () {
        Route::get('/create', [CategoryController::class, 'addCategory'])->name('addCategory');
        Route::get('/manage', [CategoryController::class, 'manageCategory'])->name('manageCategory');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        Route::get('/update-status/{id}/{status}', [CategoryController::class, 'updateStatus'])->name('updateStatus');
    });
    /*subcategories route*/
    Route::prefix('/sub-category')->name('subcategory.')->group(function () {
        Route::get('/create', [SubcategoryController::class, 'addSubcategory'])->name('addSubcategory');
        Route::get('/manage', [SubcategoryController::class, 'manageSubcategory'])->name('manageSubcategory');
        Route::post('/store', [SubcategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SubcategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [SubcategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [SubcategoryController::class, 'delete'])->name('delete');
        Route::get('/update-status/{id}/{status}', [SubcategoryController::class, 'updateStatus'])->name('updateStatus');
    });
    /*slider route*/
    Route::prefix('/slider')->name('slider.')->group(function () {
        Route::get('/create', [SliderController::class, 'addSlider'])->name('addSlider');
        Route::get('/manage', [SliderController::class, 'manageSlider'])->name('manageSlider');
        Route::post('/store', [SliderController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [SliderController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('delete');
        Route::get('/update-status/{id}/{status}', [SliderController::class, 'updateStatus'])->name('updateStatus');
    });

});
