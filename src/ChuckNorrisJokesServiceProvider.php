<?php

namespace A2sc\ChuckNorrisJokes;

use Illuminate\Support\ServiceProvider;
use A2sc\ChuckNorrisJokes\Console\ChuckNorrisJoke;

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
                ChuckNorrisJoke::class
            ]);
        }
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
