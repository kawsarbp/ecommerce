<?php

use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
| Web Routes
*/

Route::get('/',[SiteController::class,'index'])->name('index');
Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::prefix('/admin')->name('admin.')->group(function (){
    Route::get('/brand/create',[BrandController::class,'addBrand'])->name('addBrand');
    Route::get('/brand/manage',[BrandController::class,'manageBrand'])->name('manageBrand');
});
