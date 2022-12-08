<?php

namespace App\Providers;

use App\Repositories\Interfaces\IRoleRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IRoleRepository::class, RoleRepository::class);
    }
}
