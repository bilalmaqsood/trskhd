<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create', function () {
            $user = Auth::user();
            return $user->hasRole('admin');
        });
        
        Gate::define('update', function () {
            $user = Auth::user();
            return $user->hasRole('admin');
        });
        
        Gate::define('delete', function () {
            $user = Auth::user();
            return $user->hasRole('admin');
        });

        Gate::define('all', function () {
            $user = Auth::user();
            return $user->hasRole('admin');
        });

        Gate::define('view', function () {
            $user = Auth::user();
            return $user->hasAnyRole(['admin', 'teacher', 'student']);
        });

        Gate::define('admin', function () {
            $user = Auth::user();
            return $user->hasRole('admin');
        });

        Gate::define('student', function () {
            $user = Auth::user();
            return $user->hasRole('student');
        });

        Gate::define('teacher', function () {
            $user = Auth::user();
            return $user->hasRole('teacher');
        });
    }
}
