<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Faction;

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
        $factions = Faction::with('tendency')->get();

        foreach($factions as $faction) {
            print($faction);
        }
        return 0;
    }
}
