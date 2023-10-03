<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('api')->group(function () {

    Route::get('getAllProperties', [ApiController::class, 'getAllProperties'])->name('api.allProperties');
    Route::get('getProperty/{slug}', [ApiController::class, 'getProperty'])->name('api.getProperty');

    Route::get('getAllAssignments', [ApiController::class, 'getAllAssignments'])->name('api.allAssignments');
    Route::get('getAssignment/{id}', [ApiController::class, 'getAssignment'])->name('api.getAssignments');

});

// Admin Registration
Route::get('/register', [AdminController::class, 'register'])->name('admin.signup');
Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
// Route::post('/clear-session-message', [AdminController::class, 'clearSessionMessage']);

Route::prefix('secure-zone')->group(function () {

    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('admin')->group(function () {

        // Routes within the 'secure-zone' group
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Consulting forms
        Route::get('/consulting-form', [AdminController::class, 'consultingForm'])->name('admin.consultingForm');
        // Subscription form
        Route::get('/subscription-form', [AdminController::class, 'subscriptionForm'])->name('admin.subscriptionForm');
        // Property Information
        Route::get('/property-information', [AdminController::class, 'propertyInfo'])->name('admin.propertyInfo');

        Route::prefix('property')->group(function () {
            // Routes within the 'secure-zone/property' group
            //Property CRUD routes
            Route::get('', [AdminController::class, 'viewProperty'])->name('admin.property.view');
            Route::get('add', [AdminController::class, 'addProperty'])->name('admin.property.add');
            Route::post('store', [AdminController::class, 'storeProperty'])->name('admin.property.store');
            Route::get('edit/{slug}', [AdminController::class, 'editProperty'])->name('admin.property.edit');
            Route::PUT('update/{id}', [AdminController::class, 'updateProperty'])->name('admin.property.update');
        });

        Route::prefix('assignment')->group(function () {
            // Routes within the 'secure-zone/property' group
            //Assigments CRUD routes
            Route::get('', [AdminController::class, 'viewAssignments'])->name('admin.assignment.view');
            Route::get('add', [AdminController::class, 'addAssignment'])->name('admin.assignment.add');
            Route::post('store', [AdminController::class, 'storeAssignment'])->name('admin.assignment.store');
            Route::get('edit/{slug}', [AdminController::class, 'editAssignment'])->name('admin.assignment.edit');
            Route::PUT('update/{id}', [AdminController::class, 'updateAssignment'])->name('admin.assignment.update');
        });
        Route::prefix('rentals')->group(function () {
            // Routes within the 'secure-zone/property' group
            //Assigments CRUD routes
            Route::get('', [AdminController::class, 'viewRentals'])->name('admin.rentals.view');
            Route::get('add', [AdminController::class, 'addRental'])->name('admin.rentals.add');
            Route::post('store', [AdminController::class, 'storeRental'])->name('admin.rentals.store');
            Route::get('edit/{slug}', [AdminController::class, 'editRental'])->name('admin.rentals.edit');
            Route::PUT('update/{id}', [AdminController::class, 'updateRental'])->name('admin.rentals.update');
        });

        Route::prefix('city')->group(function () {
            // Routes within the 'secure-zone/city' group
            // City CRUD routes
            Route::post('store', [AdminController::class, 'storeCity'])->name('admin.city.store');
            Route::put('update/{id}', [AdminController::class, 'updateCity'])->name('admin.city.update');
        });

        Route::prefix('development')->group(function () {
            // Routes within the 'secure-zone/city' group
            // City CRUD routes
            Route::post('store', [AdminController::class, 'storedevelopment'])->name('admin.development.store');
            Route::PUT('update/{id}', [AdminController::class, 'updatedevelopment'])->name('admin.development.update');
        });

        Route::prefix('developers')->group(function () {
            // Routes within the 'secure-zone/city' group
            // City CRUD routes
            Route::post('store', [AdminController::class, 'storedevelopers'])->name('admin.developers.store');
            Route::PUT('update/{id}', [AdminController::class, 'updatedevelopers'])->name('admin.developers.update');
        });

        Route::prefix('architect')->group(function () {
            // Routes within the 'secure-zone/city' group
            // City CRUD routes
            Route::post('store', [AdminController::class, 'storearchitect'])->name('admin.architect.store');
            Route::PUT('update/{id}', [AdminController::class, 'updatearchitect'])->name('admin.architect.update');
        });

        Route::prefix('interiorDesigner')->group(function () {
            // Routes within the 'secure-zone/city' group
            // City CRUD routes
            Route::post('store', [AdminController::class, 'storeinteriorDesigner'])->name('admin.interiorDesigner.store');
            Route::PUT('update/{id}', [AdminController::class, 'updateinteriorDesigner'])->name('admin.interiorDesigner.update');
        });
    });
});
