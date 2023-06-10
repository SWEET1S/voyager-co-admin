<?php

namespace Sweet1s\VoyagerCoAdmin\Providers;

use Illuminate\Support\ServiceProvider;
use Sweet1s\VoyagerCoAdmin\Console\Commands\InstallCommand;
use Sweet1s\VoyagerCoAdmin\Console\Commands\RolePermissionCommand;

class VoyagerCoAdminServiceProvider extends ServiceProvider
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
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/co-admin.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'voyager-co-admin');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/voyager'),
        ]);

        $this->publishes([
            __DIR__.'/../config/voyager-co-admin.php' => config_path('voyager-co-admin.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                RolePermissionCommand::class,
                InstallCommand::class
            ]);
        }
    }
}
