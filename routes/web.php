<?php

use App\Http\Controllers\frontend\SiteController;
use Illuminate\Support\Facades\Route;

/*
| Web Routes
*/


Route::get('/',[SiteController::class,'index'])->name('index');
