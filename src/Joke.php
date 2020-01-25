<?php

namespace A2sc\ChuckNorrisJokes;

use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    protected $table = 'jokes';

    protected $guarded = [];
}
