<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

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
        /**
         * Auth routes
         */
        Passport::routes();
        /**
         *
         * The date when access tokens expire.
         *   访问令牌过期的日期
         */
        Passport::tokensExpireIn(Carbon::now()->addHour(5));
        /**
         * The date when refresh tokens expire.
         * 刷新令牌过期的日期
         */
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
    }
}
