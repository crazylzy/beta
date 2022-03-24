<?php

namespace App\Providers;

use App\Models\UserPost;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        UserPost::class => PostPolicy::class,
    ];


    public function boot()
    {
        $this->registerPolicies();
    }
}
