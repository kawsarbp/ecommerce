<?php

use App\Http\Controllers\backend\BrandController;
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

    Route::prefix('/brand')->name('brand.')->group(function () {
        Route::get('/create', [BrandController::class, 'addBrand'])->name('addBrand');
        Route::get('/manage', [BrandController::class, 'manageBrand'])->name('manageBrand');
        Route::post('/store', [BrandController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [BrandController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('delete');
        Route::get('/update-status/{id}/{status}', [BrandController::class, 'updateStatus'])->name('updateStatus');
    });
});
