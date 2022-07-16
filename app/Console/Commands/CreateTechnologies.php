<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Technology;
use App\Models\TechnologyPrerequisite;
use App\Models\TechnologyType;

class CreateTechnologies extends Command
{
    private $types = [
        'biotic' => [
            'color' => 'green'
        ],
        'propulsion' => [
            'color' => 'blue'
        ],
        'cybernetic' => [
            'color' => 'yellow'
        ],
        'warfare' => [
            'color' => 'red'
        ]
    ];

    private $technologies = [
        'Hyper Metabolism' => [
            'faction_id' => null,
            'unit_id' => null,
            'technology_color' => 'green',
            'level' => 2,
            'prerequisites' => [
                'green',
                'green'
            ]
        ]
    ];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'technologies:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create technology data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        TechnologyType::truncate();
        TechnologyPrerequisite::truncate();
        Technology::truncate();

        foreach($this->types as $name => $data) {
            $type = TechnologyType::create([
                'name' => $name . ' technologies',
                'color' => $data['color']
            ]);
            $this->info("Created technology type: {$type->name}");
        }

        foreach($this->technologies as $name => $data) {
            $technology = Technology::create([
                'name' => $name,
                'faction_id' => $data['faction_id'],
                'unit_id' => $data['unit_id'],
                'technology_type_id' => TechnologyType::where('color', $data['technology_color'])->first()->id,
                'level' => $data['level']
            ]);
            foreach($data['prerequisites'] as $prerequisite) {
                TechnologyPrerequisite::create([
                    'technology_id' => $technology->id,
                    'technology_type_id' => TechnologyType::where('color', $prerequisite)->first()->id
                ]);
            }
            $this->info("Created technology: {$technology->name}");
        }

        return 0;
    }
}
