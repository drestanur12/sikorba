<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (app()->environment('production')) {
            try {
                Artisan::call('optimize:clear'); // clear cache
                Artisan::call('migrate', ['--force' => true]); // migrate DB
            } catch (\Exception $e) {
                // biar tidak crash
            }
        }
    }
}