<?php

namespace Armcanada\LaravelHoneypot;

use Illuminate\Support\ServiceProvider;
use Armcanada\LaravelHoneypot\Http\Middleware\VerifyHoneypot;

class LaravelHoneypotServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-honeypot.php'),
            ], 'config');
        }
        $this->app['router']->aliasMiddleware('verify-honeypot', VerifyHoneypot::class);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-honeypot');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-honeypot', function () {
            return new LaravelHoneypot;
        });
    }
}
