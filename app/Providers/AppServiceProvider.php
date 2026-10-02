<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Ratelimiter;

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

        // Rate Limiter untuk Admin Login
        RateLimiter::for('admin-login', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });

        // Rate Limiter untuk Cek Status Cuti (Menghilangkan Error MissingRateLimiterException)
        RateLimiter::for('status-check', function (Request $request) {
            return Limit::perMinute(10)->by($request->ip());
        });
    }

    public function boot(): void
    {
        RateLimiter::for('cuti-submit', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });
    }
}