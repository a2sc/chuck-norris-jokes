<?php

namespace A2sc\ChuckNorrisJokes\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Artisan;
use A2sc\ChuckNorrisJokes\Facades\ChuckNorris;
use A2sc\ChuckNorrisJokes\ChuckNorrisJokesServiceProvider;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ChuckNorrisJokesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ChuckNorris' => ChuckNorrisJoke::class,
        ];
    }

    /** @test */
    public function console_command_returns_a_joke()
    {
        $this->withoutMockingConsoleOutput();

        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('Some joke.');

        $this->artisan('chuck-norris');
        $output = Artisan::output();

        $this->assertSame('Some joke.'.PHP_EOL, $output);
    }
}
