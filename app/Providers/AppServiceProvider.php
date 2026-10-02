<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        // Force Scheme HTTPS untuk Vercel / Production
        if (config('app.env') !== 'local' || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) {
            URL::forceScheme('https');
        }

        // Rate Limiter untuk Pengajuan Cuti Public
        RateLimiter::for('cuti-submit', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });

        // Rate Limiter untuk Admin Login
        RateLimiter::for('admin-login', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });

        // Rate Limiter untuk Cek Status Cuti
        RateLimiter::for('status-check', function (Request $request) {
            return Limit::perMinute(10)->by($request->ip());
        });
    }
}