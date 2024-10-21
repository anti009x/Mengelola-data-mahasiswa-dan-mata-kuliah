<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\DataMataKuliah;
use App\Observers\DataMataKuliahObserver;

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
        //
    }
}
