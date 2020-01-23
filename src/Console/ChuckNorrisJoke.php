<?php

namespace A2sc\ChuckNorrisJokes\Console;

use A2sc\ChuckNorrisJokes\Facades\ChuckNorris;
use Illuminate\Console\Command;

class ChuckNorrisJoke extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chuck-norris';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Output a Chuck Norris joke';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param  \App\DripEmailer  $drip
     * @return mixed
     */
    public function handle()
    {
        $this->info(htmlspecialchars_decode(ChuckNorris::getRandomJoke()));
    }
}
