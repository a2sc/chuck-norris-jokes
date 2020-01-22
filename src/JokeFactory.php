<?php

namespace A2sc\ChuckNorrisJokes;

class JokeFactory
{
    protected $jokes = [
        'Chuck Norris counted to infinity... Twice.',
        'When Chuck Norris falls in water, Chuck Norris doesn\'t get wet. Water gets Chuck Norris.',
        'Chuck Norris ordered a Big Mac at Burger King, and got one.',
    ];

    public function __construct(array $jokes = null)
    {
        if ($jokes) {
            $this->jokes = $jokes;
        }
    }

    public function getRandomJoke(): string
    {
        return $this->jokes[array_rand($this->jokes)];
    }
}
