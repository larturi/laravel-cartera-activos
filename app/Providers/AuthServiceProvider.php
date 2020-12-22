<?php

namespace App\Providers;

use App\Models\User;

use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-sistema', function (User $authUser) {
            return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA';
        });

        Gate::define('admin-maestro', function (User $authUser) {
            return $authUser->perfil === 'ADMIN';
        });

        Gate::define('admin-user', function (User $authUser) {
            return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'AUDITORIA';
        });
    }
}
