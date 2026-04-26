<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
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

            // 🔒 Paksa HTTPS
            URL::forceScheme('https');

            // 🔥 Clear cache biar env & session kebaca
            try {
                Artisan::call('optimize:clear');
            } catch (\Exception $e) {
                // biar ga crash
            }
        }
    }
}