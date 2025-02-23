<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Support\Carbon;

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
        $this->registerPolicies();
    
        Passport::tokensExpireIn(Carbon::now()->addMinutes((int) env('PASSPORT_ACCESS_TOKEN_EXPIRES_IN', 1440)));
        Passport::refreshTokensExpireIn(Carbon::now()->addMinutes((int) env('PASSPORT_REFRESH_TOKEN_EXPIRES_IN', 43200)));
        Passport::personalAccessTokensExpireIn(Carbon::now()->addMinutes((int) env('PASSPORT_PERSONAL_ACCESS_TOKEN_EXPIRES_IN', 2628000)));
    }
}
