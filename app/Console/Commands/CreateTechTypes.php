<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TechnologyType;

class CreateTechTypes extends Command
{

    private $types = [
        [
            'name' => 'Biotic',
            'color' => 'green'
        ],
        [
            'name' => 'Propulsion',
            'color' => 'blue'
        ],
        [
            'name' => 'Cybernetic',
            'color' => 'yellow'
        ],
        [
            'name' => 'Warfare',
            'color' => 'red'
        ],
    ];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'types:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all 4 technology types';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        TechnologyType::truncate();
        foreach($this->types as $type) {
            TechnologyType::create($type);
        }
        return json_encode(TechnologyType::get());
    }
}
