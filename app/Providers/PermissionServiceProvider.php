<?php

namespace App\Providers;

use App\Repositories\Interfaces\IPermissionRepository;
use App\Repositories\PermissionRepository;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
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
        $this->app->bind(IPermissionRepository::class,PermissionRepository::class);
    }
}
