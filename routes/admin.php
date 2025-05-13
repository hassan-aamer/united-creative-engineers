<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::prefix('sliders')->controller(\App\Http\Controllers\Admin\Sliders\SlidersController::class)->group(function () {
        Route::get('/', 'index')->name('sliders.index');
        Route::get('/create', 'create')->name('sliders.create');
        Route::post('/store', 'store')->name('sliders.store');
        Route::get('/{id}/edit', 'edit')->name('sliders.edit');
        Route::put('/update/{id}', 'update')->name('sliders.update');
        Route::delete('/delete/{id}', 'destroy')->name('sliders.delete');
        Route::post('/change-status', 'changeStatus')->name('sliders.status');
    });
    Route::prefix('why/us')->controller(\App\Http\Controllers\Admin\WhyUs\WhyUsController::class)->group(function () {
        Route::get('/', 'index')->name('WhyUs.index');
        Route::get('/create', 'create')->name('WhyUs.create');
        Route::post('/store', 'store')->name('WhyUs.store');
        Route::get('/{id}/edit', 'edit')->name('WhyUs.edit');
        Route::put('/update/{id}', 'update')->name('WhyUs.update');
        Route::delete('/delete/{id}', 'destroy')->name('WhyUs.delete');
        Route::post('/change-status', 'changeStatus')->name('WhyUs.status');
    });
    Route::prefix('about')->controller(\App\Http\Controllers\Admin\About\AboutController::class)->group(function () {
        Route::get('/', 'index')->name('about.index');
        Route::get('/create', 'create')->name('about.create');
        Route::post('/store', 'store')->name('about.store');
        Route::get('/{id}/edit', 'edit')->name('about.edit');
        Route::put('/update/{id}', 'update')->name('about.update');
        Route::delete('/delete/{id}', 'destroy')->name('about.delete');
        Route::post('/change-status', 'changeStatus')->name('about.status');
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
    Route::prefix('subscription')->controller(\App\Http\Controllers\Admin\Subscription\SubscriptionController::class)->group(function () {
        Route::get('/', 'index')->name('subscription.index');
        Route::get('/create', 'create')->name('subscription.create');
        Route::post('/store', 'store')->name('subscription.store');
        Route::get('/{id}/edit', 'edit')->name('subscription.edit');
        Route::put('/update/{id}', 'update')->name('subscription.update');
        Route::delete('/delete/{id}', 'destroy')->name('subscription.delete');
        Route::post('/change-status', 'changeStatus')->name('subscription.status');
    });
    Route::prefix('developments')->controller(\App\Http\Controllers\Admin\Developments\DevelopmentController::class)->group(function () {
        Route::get('/', 'index')->name('developments.index');
        Route::get('/create', 'create')->name('developments.create');
        Route::post('/store', 'store')->name('developments.store');
        Route::get('/{id}/edit', 'edit')->name('developments.edit');
        Route::put('/update/{id}', 'update')->name('developments.update');
        Route::delete('/delete/{id}', 'destroy')->name('developments.delete');
        Route::post('/change-status', 'changeStatus')->name('developments.status');
    });
    Route::prefix('packages')->controller(\App\Http\Controllers\Admin\Packages\PackageController::class)->group(function () {
        Route::get('/', 'index')->name('packages.index');
        Route::get('/create', 'create')->name('packages.create');
        Route::post('/store', 'store')->name('packages.store');
        Route::get('/{id}/edit', 'edit')->name('packages.edit');
        Route::put('/update/{id}', 'update')->name('packages.update');
        Route::delete('/delete/{id}', 'destroy')->name('packages.delete');
        Route::post('/change-status', 'changeStatus')->name('packages.status');
    });
    Route::prefix('package/details')->controller(\App\Http\Controllers\Admin\PackageDetails\PackageDetailController::class)->group(function () {
        Route::get('/', 'index')->name('PackageDetails.index');
        Route::get('/create', 'create')->name('PackageDetails.create');
        Route::post('/store', 'store')->name('PackageDetails.store');
        Route::get('/{id}/edit', 'edit')->name('PackageDetails.edit');
        Route::put('/update/{id}', 'update')->name('PackageDetails.update');
        Route::delete('/delete/{id}', 'destroy')->name('PackageDetails.delete');
        Route::post('/change-status', 'changeStatus')->name('PackageDetails.status');
    });
    Route::prefix('features')->controller(\App\Http\Controllers\Admin\Features\FeatureController::class)->group(function () {
        Route::get('/', 'index')->name('features.index');
        Route::get('/create', 'create')->name('features.create');
        Route::post('/store', 'store')->name('features.store');
        Route::get('/{id}/edit', 'edit')->name('features.edit');
        Route::put('/update/{id}', 'update')->name('features.update');
        Route::delete('/delete/{id}', 'destroy')->name('features.delete');
        Route::post('/change-status', 'changeStatus')->name('features.status');
    });
    Route::prefix('info/sections')->controller(\App\Http\Controllers\Admin\InfoSections\InfoSectionController::class)->group(function () {
        Route::get('/', 'index')->name('infoSections.index');
        Route::get('/create', 'create')->name('infoSections.create');
        Route::post('/store', 'store')->name('infoSections.store');
        Route::get('/{id}/edit', 'edit')->name('infoSections.edit');
        Route::put('/update/{id}', 'update')->name('infoSections.update');
        Route::delete('/delete/{id}', 'destroy')->name('infoSections.delete');
        Route::post('/change-status', 'changeStatus')->name('infoSections.status');
    });
    Route::prefix('info/sections/details')->controller(\App\Http\Controllers\Admin\InfoSectionDetails\InfoSectionDetailController::class)->group(function () {
        Route::get('/', 'index')->name('infoSectionDetails.index');
        Route::get('/create', 'create')->name('infoSectionDetails.create');
        Route::post('/store', 'store')->name('infoSectionDetails.store');
        Route::get('/{id}/edit', 'edit')->name('infoSectionDetails.edit');
        Route::put('/update/{id}', 'update')->name('infoSectionDetails.update');
        Route::delete('/delete/{id}', 'destroy')->name('infoSectionDetails.delete');
        Route::post('/change-status', 'changeStatus')->name('infoSectionDetails.status');
    });
    Route::prefix('info/options')->controller(\App\Http\Controllers\Admin\InfoOptions\InfoOptionController::class)->group(function () {
        Route::get('/', 'index')->name('infoOption.index');
        Route::get('/create', 'create')->name('infoOption.create');
        Route::post('/store', 'store')->name('infoOption.store');
        Route::get('/{id}/edit', 'edit')->name('infoOption.edit');
        Route::put('/update/{id}', 'update')->name('infoOption.update');
        Route::delete('/delete/{id}', 'destroy')->name('infoOption.delete');
        Route::post('/change-status', 'changeStatus')->name('infoOption.status');
    });
    Route::prefix('product/features')->controller(\App\Http\Controllers\Admin\ProductFeatures\ProductFeatureController::class)->group(function () {
        Route::get('/', 'index')->name('productFeatures.index');
        Route::get('/create', 'create')->name('productFeatures.create');
        Route::post('/store', 'store')->name('productFeatures.store');
        Route::get('/{id}/edit', 'edit')->name('productFeatures.edit');
        Route::put('/update/{id}', 'update')->name('productFeatures.update');
        Route::delete('/delete/{id}', 'destroy')->name('productFeatures.delete');
        Route::post('/change-status', 'changeStatus')->name('productFeatures.status');
    });
    Route::prefix('product/services')->controller(\App\Http\Controllers\Admin\ProductServices\ProductServiceController::class)->group(function () {
        Route::get('/', 'index')->name('productServices.index');
        Route::get('/create', 'create')->name('productServices.create');
        Route::post('/store', 'store')->name('productServices.store');
        Route::get('/{id}/edit', 'edit')->name('productServices.edit');
        Route::put('/update/{id}', 'update')->name('productServices.update');
        Route::delete('/delete/{id}', 'destroy')->name('productServices.delete');
        Route::post('/change-status', 'changeStatus')->name('productServices.status');
    });
    Route::prefix('faqs')->controller(\App\Http\Controllers\Admin\Faq\FaqController::class)->group(function () {
        Route::get('/', 'index')->name('faqs.index');
        Route::get('/create', 'create')->name('faqs.create');
        Route::post('/store', 'store')->name('faqs.store');
        Route::get('/{id}/edit', 'edit')->name('faqs.edit');
        Route::put('/update/{id}', 'update')->name('faqs.update');
        Route::delete('/delete/{id}', 'destroy')->name('faqs.delete');
        Route::post('/change-status', 'changeStatus')->name('faqs.status');
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
