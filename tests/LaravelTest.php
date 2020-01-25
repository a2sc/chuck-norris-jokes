<?php

namespace A2sc\ChuckNorrisJokes\Tests;

use A2sc\ChuckNorrisJokes\Joke;
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

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__.'/../database/migrations/create_jokes_table.php.stub';
        (new \CreateJokesTable)->up();
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

    /** @test */
    public function it_provides_a_chuck_norris_route()
    {
        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('Some joke.');

        $this->get('/chuck-norris')
            ->assertStatus(200);
    }

    /** @test */
    public function it_provides_a_chuck_norris_view()
    {
        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('Some joke.');

        $this->get('/chuck-norris')
            ->assertViewIs('chuck-norris::joke')
            ->assertViewHas('joke', 'Some joke.');
    }

    /** @test */
    public function it_can_access_the_database()
    {
        $joke = new Joke();
        $joke->joke = 'Some joke.';
        $joke->save();

        $this->assertDatabaseHas('jokes', ['joke' => 'Some joke.']);
    }
}
