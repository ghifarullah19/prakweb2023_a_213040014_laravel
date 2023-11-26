<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Mengatur default pagination menjadi bootstrap
        Paginator::useBootstrap();

        // Mengatur Gate untuk admin
        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });
    }
}
