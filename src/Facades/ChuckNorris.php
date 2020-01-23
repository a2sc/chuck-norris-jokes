<?php

namespace A2sc\ChuckNorrisJokes\Facades;

use Illuminate\Support\Facades\Facade;

class ChuckNorris extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'chuck-norris';
    }
}
