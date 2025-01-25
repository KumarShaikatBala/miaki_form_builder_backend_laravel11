<?php

namespace App\Providers;

use App\Interfaces\FormRepositoryInterface;
use App\Repositories\FormRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FormRepositoryInterface::class, FormRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
