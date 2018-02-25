<?php

namespace App\Providers;

use App\Http\Controllers\Admin\AdminArticleController;
use App\User;
use Auth;
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
        Gate::define('create-article', function (User $user)
        {
            if($user->role == 2)
            {
                return false;
            }
            return true;
        });

        //
    }
}
