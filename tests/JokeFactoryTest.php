<?php

namespace A2sc\ChuckNorrisJokes\Tests;

use PHPUnit\Framework\TestCase;
use A2sc\ChuckNorrisJokes\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $jokes = new JokeFactory([
            'This is a joke',
        ]);
        $joke = $jokes->getRandomJoke();

        $this->assertSame('This is a joke', $joke);
    }

    /** @test */
    public function it_returns_a_predefined_joke()
    {
        $predefinedJokes = [
            'Chuck Norris counted to infinity... Twice.',
            'When Chuck Norris falls in water, Chuck Norris doesn\'t get wet. Water gets Chuck Norris.',
            'Chuck Norris ordered a Big Mac at Burger King, and got one.',
        ];
        $jokes = new JokeFactory();
        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $predefinedJokes);
    }
}
