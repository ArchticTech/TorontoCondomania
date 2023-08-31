<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);

Route::prefix('secure-zone')->group(function () {
    // Routes within the 'secure-zone' group
    Route::get('', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::prefix('property')->group(function () {
        // Routes within the 'secure-zone/property' group
        Route::get('add', [AdminController::class, 'addProperty'])->name('admin.property.add');
        Route::post('store', [AdminController::class, 'storeProperty'])->name('admin.property.store');
    });
});