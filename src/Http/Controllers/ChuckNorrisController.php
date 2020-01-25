<?php

namespace A2sc\ChuckNorrisJokes\Http\Controllers;

use A2sc\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisController
{
    public function __invoke()
    {
        return view('chuck-norris::joke', [
            'joke' => ChuckNorris::getRandomJoke()
        ]);
    }
}
