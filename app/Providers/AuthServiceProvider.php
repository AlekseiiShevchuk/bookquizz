<?php

namespace App\Providers;

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

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
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

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Books
        Gate::define('book_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('book_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('book_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('book_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('book_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Quizzes
        Gate::define('quiz_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('quiz_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('quiz_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('quiz_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('quiz_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Possible answers
        Gate::define('possible_answer_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('possible_answer_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('possible_answer_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('possible_answer_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('possible_answer_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: User answers
        Gate::define('user_answer_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_answer_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_answer_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_answer_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_answer_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
