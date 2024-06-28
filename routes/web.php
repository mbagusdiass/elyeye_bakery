<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index']);


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [adminController::class, 'index'])->name('dashboard');

    Route::resource('posts', adminController::class);
    Route::resource('category', CategoryController::class);

});

require __DIR__.'/auth.php';
