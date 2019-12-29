<?php

namespace AlexSchmidhuber\FavoriteList;

use Illuminate\Support\ServiceProvider;

class FavoriteListServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'alexschmidhuber');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'alexschmidhuber');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/favoritelist.php', 'favoritelist');

        // Register the service the package provides.
        $this->app->singleton('favoritelist', function ($app) {
            return new FavoriteList;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['favoritelist'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/favoritelist.php' => config_path('favoritelist.php'),
        ], 'favoritelist.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/alexschmidhuber'),
        ], 'favoritelist.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/alexschmidhuber'),
        ], 'favoritelist.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/alexschmidhuber'),
        ], 'favoritelist.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
