<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-todoLis', function ($user, $todoList) {
            return $todoList->createdUser && $user->id === $todoList->createdUser->id;
        });

        Gate::define('destroy-todoLis', function ($user, $todoList) {
            return $todoList->createdUser && $user->id === $todoList->createdUser->id;
        });

        Gate::define('show-todoLis-attachment', function ($user, $todoListAttachment) {
            return $todoListAttachment->createdUser && $user->id === $todoListAttachment->createdUser->id;
        });

        Gate::define('destroy-todoLis-attachment', function ($user, $todoListAttachment) {
            return $todoListAttachment->createdUser && $user->id === $todoListAttachment->createdUser->id;
        });
    }
}
