<?php

use App\Models\Product;
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
    $products = Product::where("is_hot", 1)->get();
    return view('index', ['products' => $products]);
})->name('home-page');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');

Route::get('/products/{id}',  [App\Http\Controllers\ProductController::class, 'show'])->name('products.detail');

Route::get('/ebooks/{code}',  [App\Http\Controllers\ProductPaymentController::class, 'readBook'])->name('products.read-book');

Route::get('/products/{code}/get-book',  [App\Http\Controllers\ProductPaymentController::class, 'getBook'])->name('products.get-book');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);

    Route::resource('vouchers', App\Http\Controllers\Admin\VoucherController::class);

    Route::get('product-payments/export', [App\Http\Controllers\Admin\ProductPaymentController::class, 'exportExcel'])->name("export");

    Route::resource('product-payments', App\Http\Controllers\Admin\ProductPaymentController::class)->only(['index', 'show']);

    Route::resource('contact-forms', App\Http\Controllers\Admin\ContactFormController::class)->only(['index', 'show']);

    Route::resource('blogs', App\Http\Controllers\BlogController::class);
});

Route::get('/privacy-policy', function () {
    return view('privacy');
});

Route::get('/suports', function () {
    return view('suport');
})->name('suport');

