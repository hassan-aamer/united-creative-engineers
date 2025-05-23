<?php

use Illuminate\Support\Facades\Route;


Route::get('/',                     [App\Http\Controllers\Web\HomeController::class, 'index'])->name('home');
Route::get('/services',             [App\Http\Controllers\Web\ServiceController::class, 'index'])->name('services');
Route::get('/services/details/{id}',[App\Http\Controllers\Web\ServiceController::class, 'show'])->name('services.details');
Route::get('/products',             [App\Http\Controllers\Web\ProductController::class, 'index'])->name('products');
Route::get('/product/details/{id}', [App\Http\Controllers\Web\ProductController::class, 'show'])->name('product.details');
Route::get('/contact',              [App\Http\Controllers\Web\ContactController::class, 'index'])->name('contact');
Route::post('/contact/store',       [App\Http\Controllers\Web\ContactController::class, 'store'])->name('contact.store');
