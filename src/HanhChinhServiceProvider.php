<?php

namespace HanhChinh\HanhChinh;

use Illuminate\Support\ServiceProvider;

class HanhChinhServiceProvider extends ServiceProvider
{
    protected $commands = [
        'HanhChinh\HanhChinh\Commands\HcCommand',
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
       /* $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views','hanhchinh');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->publishes([
            __DIR__.'/database/seeds/' => database_path('seeds')
        ], 'seeds');*/
        $package_name = "hanhchinh";
        // include routes
        //$this->loadRoutesFrom(__DIR__.'/routes/web.php');
        //migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/');
        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations')
        ], 'migrations');
        // database seeder
        $this->publishes([
            __DIR__.'/database/seeds/' => database_path('seeds')
        ], 'seeds');
        //commands
        // if ($this->app->runningInConsole()) {
        //     $this->commands([
        //         VietNamDatabaseInstall::class,
        //     ]);
        // }

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
