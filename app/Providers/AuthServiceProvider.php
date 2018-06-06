<?php

namespace App\Providers;

use App\Role;
use App\User;
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

        $user = \Auth::user();

        
        // Auth gates for: Cadastro
        Gate::define('cadastro_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Guias
        Gate::define('guia_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4, 7]);
        });
        Gate::define('guia_create', function ($user) {
            return in_array($user->role_id, [1, 4, 2, 3, 7]);
        });
        Gate::define('guia_edit', function ($user) {
            return in_array($user->role_id, [1, 4, 2, 3, 7]);
        });
        Gate::define('guia_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4, 7]);
        });
        Gate::define('guia_delete', function ($user) {
            return in_array($user->role_id, [1, 4, 2, 3, 7]);
        });

        // Auth gates for: Clientes
        Gate::define('cliente_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('cliente_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('cliente_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('cliente_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });
        Gate::define('cliente_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4]);
        });

        // Auth gates for: Relatorios
        Gate::define('relatorio_access', function ($user) {
            return in_array($user->role_id, [1, 4, 2, 3, 7]);
        });
        Gate::define('relatorio_create', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('relatorio_edit', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('relatorio_view', function ($user) {
            return in_array($user->role_id, [1, 4, 2, 3, 7]);
        });
        Gate::define('relatorio_delete', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });

        // Auth gates for: Medico
        Gate::define('medico_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4, 7]);
        });
        Gate::define('medico_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4, 7]);
        });
        Gate::define('medico_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4, 7]);
        });
        Gate::define('medico_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4, 7]);
        });
        Gate::define('medico_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Convenios
        Gate::define('convenio_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4, 7]);
        });
        Gate::define('convenio_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4, 7]);
        });
        Gate::define('convenio_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4, 7]);
        });
        Gate::define('convenio_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3, 4, 7]);
        });
        Gate::define('convenio_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Internal notifications
        Gate::define('internal_notification_access', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('internal_notification_create', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('internal_notification_edit', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('internal_notification_view', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('internal_notification_delete', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });

        // Auth gates for: Teams
        Gate::define('team_access', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('team_create', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('team_edit', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('team_view', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('team_delete', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

    }
}
