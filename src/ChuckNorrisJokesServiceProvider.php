<?php

namespace A2sc\ChuckNorrisJokes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use A2sc\ChuckNorrisJokes\Console\ChuckNorrisJoke;
use A2sc\ChuckNorrisJokes\Http\Controllers\ChuckNorrisController;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChuckNorrisJoke::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chuck-norris');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/chuck-norris')
        ], 'views');

        $this->publishes([
            __DIR__.'/../config/chuck-norris.php' => config_path('chuck-norris.php')
        ], 'config');

        if (! class_exists('CreateJokesTable')) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_jokes_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_jokes_table.php')
            ], 'migrations');
        }

        Route::get(config('chuck-norris.route'), ChuckNorrisController::class);
    }

    /**
     * Register the service.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('chuck-norris', function ($app) {
            return new JokeFactory();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/chuck-norris.php', 'chuck-norris');
    }
}
