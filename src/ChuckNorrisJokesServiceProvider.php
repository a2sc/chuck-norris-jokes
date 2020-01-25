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
            __DIR__.'/../resources/views' => resource_path('views/vendor/chuck-norris'),
        ]);

        Route::get('/chuck-norris', ChuckNorrisController::class);
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
    }
}
