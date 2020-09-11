<?php

namespace ~uc:vendor\~uc:package;

use Illuminate\Support\ServiceProvider;

class ~uc:packageServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', '~package');
        $this->loadViewsFrom(__DIR__.'/resources/views', '~package');
        $this->loadRoutesFrom(__DIR__.'/routes/~package.php');

        app('boilerplate.menu.items')->registerMenuItem([
            Menu\~uc:packageMenu::class,
        ]);

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
        $this->mergeConfigFrom(__DIR__.'/config/~package.php', '~package');
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
            __DIR__.'/config/~package.php' => config_path('~package.php'),
        ], ['~package', 'config']);

        // Publishing public folder.
        if (is_dir(__DIR__.'/public')) {
            $this->publishes([
                __DIR__.'/public' => public_path('assets/vendor/~package')
            ], ['~package', 'public']);
        }

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang/vendor/~vendor/~package'),
        ], ['~package', 'lang', 'locale']);*/

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/vendor/~vendor'),
        ], ['~package', 'views']);*/

        // Registering package commands.
        // $this->commands([]);
    }
}
