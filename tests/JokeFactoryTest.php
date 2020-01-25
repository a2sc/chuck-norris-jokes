<?php

namespace A2sc\ChuckNorrisJokes\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use A2sc\ChuckNorrisJokes\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        // Mock api http://api.icndb.com/jokes/random
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 480, "joke": "The class object inherits from Chuck Norris", "categories": ["nerdy"] } }'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jokes = new JokeFactory($client);
        $joke = $jokes->getRandomJoke();

        $this->assertSame('The class object inherits from Chuck Norris', $joke);
    }
}
