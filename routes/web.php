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
        //Property CRUD routes
        Route::get('', [AdminController::class, 'viewProperty'])->name('admin.property.view');
        Route::get('add', [AdminController::class, 'addProperty'])->name('admin.property.add');
        Route::post('store', [AdminController::class, 'storeProperty'])->name('admin.property.store');
        Route::get('edit/{id}', [AdminController::class, 'editProperty'])->name('admin.property.edit');
        Route::PUT('update/{id}', [AdminController::class, 'updateProperty'])->name('admin.property.update');
    });

    Route::prefix('assigment')->group(function () {
        // Routes within the 'secure-zone/assignment' group
        //Assigments CRUD routes
        Route::get('', [AdminController::class, 'viewAssigments'])->name('admin.assigment.view');
        Route::get('add', [AdminController::class, 'addAssigment'])->name('admin.assigment.add');
        Route::post('store', [AdminController::class, 'storeAssigment'])->name('admin.assigment.store');
        Route::get('edit/{id}', [AdminController::class, 'editAssigment'])->name('admin.assigment.edit');
        Route::PUT('update/{id}', [AdminController::class, 'updateAssigment'])->name('admin.assigment.update');
    });
});


