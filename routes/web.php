<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('customer.index'));

Route::prefix('customer')->name('customer.')->group(static function () {
    Route::get('/', [CustomerController::class, 'index'])->name('index');
    Route::post('/', [CustomerController::class, 'placeOrder'])->name('placeOrder');
});

Route::prefix('store/{store}')->name('store.')->group(static function () {
    Route::get('/', [StoreController::class, 'index'])->name('index');
    Route::patch('/{orderId}', [StoreController::class, 'updateOrder'])->name('updateOrder');
});
