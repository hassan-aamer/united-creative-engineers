<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::delete('/media/{id}', [\App\Http\Controllers\Admin\Media\MediaController::class, 'destroy'])->name('media.destroy');
Route::get('login', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'showLoginForm'])->name('login.page');
Route::post('store/login', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'login'])->name('login');
Route::middleware('checkAuth')->group(function () {
    Route::get('store/logout', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('settings')->controller(\App\Http\Controllers\Admin\Settings\SettingsController::class)->group(function () {
        Route::get('/', 'edit')->name('settings.edit');
        Route::put('/update/{id}', 'update')->name('settings.update');
    });
    Route::prefix('profile')->controller(\App\Http\Controllers\Admin\Profile\ProfileController::class)->group(function () {
        Route::get('/', 'edit')->name('profile.edit');
        Route::put('/update/{id}', 'update')->name('profile.update');
    });
    Route::prefix('services')->controller(\App\Http\Controllers\Admin\Services\ServicesController::class)->group(function () {
        Route::get('/', 'index')->name('services.index');
        Route::get('/create', 'create')->name('services.create');
        Route::post('/store', 'store')->name('services.store');
        Route::get('/{id}/edit', 'edit')->name('services.edit');
        Route::put('/update/{id}', 'update')->name('services.update');
        Route::delete('/delete/{id}', 'destroy')->name('services.delete');
        Route::post('/change-status', 'changeStatus')->name('services.status');
    });
    Route::prefix('products')->controller(\App\Http\Controllers\Admin\Products\ProductsController::class)->group(function () {
        Route::get('/', 'index')->name('products.index');
        Route::get('/create', 'create')->name('products.create');
        Route::post('/store', 'store')->name('products.store');
        Route::get('/{id}/edit', 'edit')->name('products.edit');
        Route::put('/update/{id}', 'update')->name('products.update');
        Route::delete('/delete/{id}', 'destroy')->name('products.delete');
        Route::post('/change-status', 'changeStatus')->name('products.status');
    });
    Route::prefix('contacts')->controller(\App\Http\Controllers\Admin\Contact\ContactController::class)->group(function () {
        Route::get('/', 'index')->name('contacts.index');
        Route::get('/create', 'create')->name('contacts.create');
        Route::post('/store', 'store')->name('contacts.store');
        Route::get('/{id}/edit', 'edit')->name('contacts.edit');
        Route::put('/update/{id}', 'update')->name('contacts.update');
        Route::delete('/delete/{id}', 'destroy')->name('contacts.delete');
        Route::post('/change-status', 'changeStatus')->name('contacts.status');
    });
    Route::prefix('users')->controller(\App\Http\Controllers\Admin\Users\UserController::class)->group(function () {
        Route::get('/', 'index')->name('users.index');
        Route::get('/create', 'create')->name('users.create');
        Route::post('/store', 'store')->name('users.store');
        Route::get('/{id}/edit', 'edit')->name('users.edit');
        Route::put('/update/{id}', 'update')->name('users.update');
        Route::delete('/delete/{id}', 'destroy')->name('users.delete');
        Route::post('/change-status', 'changeStatus')->name('users.status');
    });
});
