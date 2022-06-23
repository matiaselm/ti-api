<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Race;

class TestRelation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:relation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $races = Race::with('tendency')->get();

        foreach($races as $race) {
            print($race);
        }
        return 0;
    }
}
