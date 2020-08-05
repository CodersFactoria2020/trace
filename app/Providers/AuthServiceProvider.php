<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Activity' => 'App\Policies\ActivityPolicy',
        'App\User' => 'App\Policies\UserPolicy'
    ];
    
    public function boot()
    {
        $this->registerPolicies();

        
    }
}