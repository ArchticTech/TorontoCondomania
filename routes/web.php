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

    Route::prefix('assignment')->group(function () {
        // Routes within the 'secure-zone/property' group
        //Assigments CRUD routes
        Route::get('', [AdminController::class, 'viewAssignments'])->name('admin.assignment.view');
        Route::get('add', [AdminController::class, 'addAssignment'])->name('admin.assignment.add');
        Route::post('store', [AdminController::class, 'storeAssignment'])->name('admin.assignment.store');
        Route::get('edit/{id}', [AdminController::class, 'editAssignment'])->name('admin.assignment.edit');
        Route::PUT('update/{id}', [AdminController::class, 'updateAssignment'])->name('admin.assignment.update');
    });
    Route::prefix('rentals')->group(function () {
        // Routes within the 'secure-zone/property' group
        //Assigments CRUD routes
        Route::get('', [AdminController::class, 'viewRentals'])->name('admin.rentals.view');
        Route::get('add', [AdminController::class, 'addRentals'])->name('admin.rentals.add');
        Route::post('store', [AdminController::class, 'storeRentals'])->name('admin.rentals.store');
        Route::get('edit/{id}', [AdminController::class, 'editRentals'])->name('admin.rentals.edit');
        Route::PUT('update/{id}', [AdminController::class, 'updateRentals'])->name('admin.rentals.update');
    });
});


