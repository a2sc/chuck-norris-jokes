<?php

namespace A2sc\ChuckNorrisJokes;

use GuzzleHttp\Client;

class JokeFactory
{
    const API_CLIENT_ENDPOINT = 'http://api.icndb.com/jokes/random';

    protected $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client;
    }

    public function getRandomJoke(): string
    {
        $response = $this->client->get(self::API_CLIENT_ENDPOINT);
        $json = json_decode($response->getBody()->getContents());

        return $json->value->joke;
    }
}
