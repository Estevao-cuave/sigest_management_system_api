<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Enums\UserProfile;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
   
    public function boot(): void
    {

    Gate::define('is-admin', function ($user) 
    {
        return $user->role->profile === UserProfile::ADMIN->value;
    });

    Gate::define('is-supervisor', function ($user) 
    {
        return $user->role->profile === UserProfile::SUPERVISOR->value;
    });

    Gate::define('is-default', function ($user) 
    {
        return $user->role->profile === UserProfile::DEFAULT->value;
    });

    }
}
