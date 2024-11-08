<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home-page');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');

Route::get('/products/{id}',  [App\Http\Controllers\ProductController::class, 'show'])->name('products.detail');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);

    Route::resource('vouchers', App\Http\Controllers\Admin\VoucherController::class);
});
