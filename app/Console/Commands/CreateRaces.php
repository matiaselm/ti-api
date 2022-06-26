<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Faction;
use App\Models\Tendency;

class CreateFactions extends Command
{
    private $factions = [[
        'name' => 'The Arborec',
        'tendency' => 'Expansionist',
    ],[
        'name' => 'The Barony of Letnev',
        'tendency' => 'Military',
    ],[
        'name' => 'The Clan of Saar',
        'tendency' => 'Objective',
    ],[
        'name' => 'The Embers of Muaat',
        'tendency' => 'Military',
    ],[
        'name' => 'The Federation of Sol',
        'tendency' => 'Expansionist',
    ],[
        'name' => 'The Ghosts of Creuss',
        'tendency' => 'Expansionist',
    ],[
        'name' => 'The L1Z1X Mindnet',
        'tendency' => 'Scientific',
    ],[
        'name' => 'The Mentak Coalition',
        'tendency' => 'Economic',
    ],[
        'name' => 'The Naalu Collective',
        'tendency' => 'Military',
    ],[
        'name' => 'The Nekro Virus',
        'tendency' => 'Unknown',
    ],[
        'name' => 'Sardakk N`orr',
        'tendency' => 'Military',
    ],[
        'name' => 'The Universities of Jol-Nar',
        'tendency' => 'Scientific',
    ],[
        'name' => 'The Winnu',
        'tendency' => 'Objective',
    ],[
        'name' => 'The Xxcha Kingdom',
        'tendency' => 'Political',
    ],[
        'name' => 'The Yin Brotherhood',
        'tendency' => 'Military',
    ],[
        'name' => 'The Yssaril Tribes',
        'tendency' => 'Political',
    ],[
        'name' => 'The Argent Flight',
        'tendency' => 'Military',
    ],[
        'name' => 'The Empyrean',
        'tendency' => 'Political',
    ],[
        'name' => 'The Mahact Gene-Sorcerers',
        'tendency' => 'Objective',
    ],[
        'name' => 'The Naaz-Rokha Alliance',
        'tendency' => 'Scientific',
    ],[
        'name' => 'The Nomad',
        'tendency' => 'Economic',
    ],[
        'name' => 'The Titans of Ul',
        'tendency' => 'Expansionist',
    ],[
        'name' => 'The Vuil`Raith Cabal',
        'tendency' => 'Military',
    ],[
        'name' => 'The Council Keleres',
        'tendency' => 'Unknown',
    ],[
        'name' => 'The Emirates of Hacan',
        'tendency' => 'Economic',
    ]
];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'factions:create';

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
        Faction::truncate();
        Tendency::truncate();

        foreach($this->factions as $faction) {
            $r = new Faction();
            $r->fill([
                'name' => $faction['name'],
                'tendency' => $faction['tendency'],
                'tendency_id' => 0,
            ]);
            $r->save();

            $tendency = Tendency::where('name', $r->tendency)->first();
            if(!$tendency) {
                $tendency = new Tendency();
                $tendency->fill([ 'name' => $r->tendency ]);
                $tendency->save();
            }

            $r->tendency_id = $tendency->id;
            $r->save();
        }

        print('created factions');
        return 0;
    }
}
