<?php

namespace App\Providers;

use Carbon\Carbon;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Schema::defaultStringLength(191);

        Gate::define('see-dashboard', function ($user) {
            if ($user->chiesa != null)
                return true;
            else
                return false;
        });
        //
        Gate::define('see-chiesa', function ($user, $chiesa) {
            if ($user->chiesa->id == $chiesa->id)
                return true;
            else
                return false;
        });

        Passport::routes(function ($router) {
            $router->forAccessTokens();
            $router->forPersonalAccessTokens();
            $router->forTransientTokens();
        });
        
        
        Passport::tokensExpireIn(Carbon::now()->addDays(1));
        
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(10));
        
        
    }
}
