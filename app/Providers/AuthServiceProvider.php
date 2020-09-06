<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Policies\UserPolicy;
use App\Activity;
use App\Category;
use App\Team;
use App\Transparency;
use App\Policies\ActivityPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Activity::class => 'App\Policies\ActivityPolicy',
        Category::class => 'App\Policies\CategoryPolicy',
        Team::class =>'App\Policies\TeamPolicy',
        Transparency::class => 'App\Policies\TransparencyPolicy',
        User::class => 'App\Policies\UserPolicy'
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
