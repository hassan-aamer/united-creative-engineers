<?php

namespace App\Providers;

use App\Repositories\CRUDRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\CRUDRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CRUDRepositoryInterface::class, CRUDRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
