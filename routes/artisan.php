<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::prefix('artisan')->group(function () {
    Route::get('/migrate', function () {
        Artisan::call('migrate');
        return response()->json(['message' => 'Migration completed']);
    });

    Route::get('/migrate-fresh', function () {
        Artisan::call('migrate:fresh');
        return response()->json(['message' => 'Fresh migration completed']);
    });

    Route::get('/migrate-fresh-seed', function () {
        Artisan::call('migrate:fresh', [
            '--seed' => true
        ]);
        return response()->json(['message' => 'Fresh migration with seeding completed']);
    });

    Route::get('/seed', function () {
        Artisan::call('db:seed');
        return response()->json(['message' => 'Seeding completed']);
    });

    Route::get('/seed/{class}', function ($class) {
        Artisan::call('db:seed', [
            '--class' => $class
        ]);
        return response()->json(['message' => "Seeding of {$class} completed"]);
    });

    Route::get('/optimize-clear', function () {
        Artisan::call('optimize:clear');
        return response()->json(['message' => 'Optimization cleared']);
    });

    Route::get('/route-clear', function () {
        Artisan::call('route:clear');
        return response()->json(['message' => 'Route cache cleared']);
    });

    Route::get('/config-clear', function () {
        Artisan::call('config:clear');
        return response()->json(['message' => 'Config cache cleared']);
    });

    Route::get('/cache-clear', function () {
        Artisan::call('cache:clear');
        return response()->json(['message' => 'Application cache cleared']);
    });

    Route::get('/view-clear', function () {
        Artisan::call('view:clear');
        return response()->json(['message' => 'View cache cleared']);
    });

    Route::get('/rollback', function () {
        Artisan::call('migrate:rollback');
        return response()->json(['message' => 'Rollback completed']);
    });

    Route::get('/rollback/{steps}', function ($steps) {
        Artisan::call('migrate:rollback', [
            '--step' => $steps
        ]);
        return response()->json(['message' => "Rollback of {$steps} steps completed"]);
    });

    Route::get('/composer-update', function () {
        exec('composer update');
        return response()->json(['message' => 'Composer update completed']);
    });

    Route::get('/composer-install', function () {
        exec('composer install');
        return response()->json(['message' => 'Composer install completed']);
    });

    Route::get('/clear-compiled', function () {
        Artisan::call('clear-compiled');
        return response()->json(['message' => 'Compiled classes cleared']);
    });

    Route::get('/config-cache', function () {
        Artisan::call('config:cache');
        return response()->json(['message' => 'Config cache created']);
    });

    Route::get('/route-cache', function () {
        Artisan::call('route:cache');
        return response()->json(['message' => 'Route cache created']);
    });

    Route::get('/view-cache', function () {
        Artisan::call('view:cache');
        return response()->json(['message' => 'View cache created']);
    });

    Route::get('/event-cache', function () {
        Artisan::call('event:cache');
        return response()->json(['message' => 'Event cache created']);
    });

    Route::get('/event-clear', function () {
        Artisan::call('event:clear');
        return response()->json(['message' => 'Event cache cleared']);
    });
});
