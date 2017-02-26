<?php

namespace Mr\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Mr\Auth\NoAuthGuard;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Mr\Machine' => 'Mr\Policies\MachinePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::extend('noauth', function ($app, $name, array $config) {
            return new NoAuthGuard(Auth::createUserProvider($config['provider']));
        });
    }
}
