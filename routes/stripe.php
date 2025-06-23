<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StripeController;

Route::controller(StripeController::class)->group(function () {
    Route::get('stripe/success', 'success')->name("checkout.success");
    Route::post('checkout/{course}', 'store')->name('checkout');
});
