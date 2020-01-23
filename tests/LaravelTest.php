<?php

namespace A2sc\ChuckNorrisJokes\Tests;

use A2sc\ChuckNorrisJokes\ChuckNorrisJokesServiceProvider;
use A2sc\ChuckNorrisJokes\Facades\ChuckNorris;
use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;

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
