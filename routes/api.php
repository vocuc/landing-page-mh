<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProductPaymentController;
use App\Http\Controllers\Webhooks\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'webhook',], function () {
    Route::post('pay-gmv/' . config('payment.app_payment_key'), PaymentController::class);
});

Route::group(['prefix' => 'product-payment'], function () {
    Route::post('create', [ProductPaymentController::class, 'store'])->name('product-payment.store')->middleware('throttle:5,1');

    Route::post('download', [ProductPaymentController::class, 'download'])->name('product-payment.download')->middleware('throttle:5,1');

});

Route::post('contact-form', [ContactFormController::class, 'store'])->name('contact-form.store')->middleware('throttle:5,1');

