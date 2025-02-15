<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
        Response::macro('success', function($success, $data = null, $message = null, $response_code){
            return response()->json([
                'success' => $success,
                'data' => $data,
                'message' => $message
            ], $response_code);
        });

        Response::macro('error', function($success, $message = null, $response_code){
            return response()->json([
                'success' => $success,
                'message' => $message
            ], $response_code);
        });

        RateLimiter::for('langServSecurity', function(Request $req){
            return Limit::perMinute(3)
            ->by($req->user()?->id ?: $req->ip());
        });
    }
}
